<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller{

    public function index()
    {
        $owners = Owner::all();
        return view('owners.index', compact('owners'));
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'email'   => 'required|email|unique:owners,email',
            'address' => 'required|string',
        ]);

        Owner::create($validated);
        return redirect()->route('owners.index')
            ->with('success', 'Owner added successfully.');
    }

    public function edit(Owner $owner)
    {
        return view('owners.edit', compact('owner'));
    }

    public function update(Request $request, Owner $owner)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'email'   => "required|email|unique:owners,email,{$owner->id}",
            'address' => 'required|string',
        ]);

        $owner->update($validated);
        return redirect()->route('owners.index')
            ->with('success', 'Owner updated successfully.');
    }

    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('owners.index')
            ->with('success', 'Owner deleted successfully.');
    }
}
