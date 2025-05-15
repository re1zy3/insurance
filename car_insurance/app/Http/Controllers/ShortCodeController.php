<?php

namespace App\Http\Controllers;

use App\Models\ShortCode;
use Illuminate\Http\Request;

class ShortCodeController extends Controller
{
    public function index()
    {
        $codes = ShortCode::all();
        return view('short_codes.index', compact('codes'));
    }

    public function create()
    {
        return view('short_codes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'shortcode' => 'required|unique:short_codes,shortcode',
            'replace'   => 'required|string',
        ]);

        ShortCode::create($data);
        return redirect()->route('shortcodes.index')
            ->with('success', 'ShortCode created.');
    }

    public function edit(ShortCode $shortcode)
    {
        return view('short_codes.edit', compact('shortcode'));
    }

    public function update(Request $request, ShortCode $shortcode)
    {
        $data = $request->validate([
            'shortcode' => 'required|unique:short_codes,shortcode,'.$shortcode->id,
            'replace'   => 'required|string',
        ]);

        $shortcode->update($data);
        return redirect()->route('shortcodes.index')
            ->with('success', 'ShortCode updated.');
    }

    public function destroy(ShortCode $shortcode)
    {
        $shortcode->delete();
        return redirect()->route('shortcodes.index')
            ->with('success', 'ShortCode deleted.');
    }

    public function show(ShortCode $shortcode)
    {
        return view('short_codes.show', compact('shortcode'));
    }
}
