<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use App\Models\ShortCode;

class ProcessShortCodes
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure                  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): SymfonyResponse
    {
        // let the request run through to a response (view, redirect, etc)
        $response = $next($request);

        // if it’s not an HTML response (e.g. file download), skip it
        $contentType = $response->headers->get('Content-Type', '');
        if (! str_contains($contentType, 'html')) {
            return $response;
        }

        // pull raw HTML
        $html = $response->getContent();

        // grab all replacement values keyed by shortcode
        // e.g. ['phone' => '+37067021270', 'email' => 'foo@bar']
        $replacements = ShortCode::pluck('replace', 'shortcode')->all();

        // swap out [shortcode] for each DB value
        foreach ($replacements as $code => $text) {
            $html = str_replace("[$code]", $text, $html);
        }

        // write the modified HTML back into the response
        $response->setContent($html);

        return $response;
    }
}
