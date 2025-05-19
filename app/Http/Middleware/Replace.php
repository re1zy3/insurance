<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ShortCode;

class Replace
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Debug: Log when middleware runs
        \Log::info('Replace middleware executed.');

        // Only process HTML responses
        if (strpos($response->headers->get('Content-Type'), 'text/html') !== false) {
            $html = $response->getContent();

            // Replace all [[ShortCode]] with values from DB
            $shortcodes = ShortCode::all();
            foreach ($shortcodes as $shortcode) {
                $pattern = '/\[\[' . preg_quote($shortcode->shortcode, '/') . '\]\]/';
                $html = preg_replace($pattern, $shortcode->replace, $html);
            }

            $response->setContent($html);
        }

        return $response;
    }
}