<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::all();
        return view('owners.index', compact('owners'));  // Pass $owners to the view
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
        ]);

        Owner::create($request->all());

        return redirect()->route('owners.index');
    }

    public function show($id)
    {
        $owner = Owner::findOrFail($id);
        return view('owners.show', compact('owner'));
    }

    public function edit($id)
    {
        $owner = Owner::findOrFail($id);
        return view('owners.edit', compact('owner'));
    }

    public function update(Request $request, $id)
    {
        $owner = Owner::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
        ]);

        $owner->update($request->all());

        return redirect()->route('owners.index');
    }

    public function destroy($id)
    {
        $owner = Owner::findOrFail($id);
        $owner->delete();

        return redirect()->route('owners.index');
    }
}
