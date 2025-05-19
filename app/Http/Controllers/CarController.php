<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CarController extends Controller
{
    public function create()
    {
        $owners = Owner::all(); // For dropdown, optional
        return view('cars.create', compact('owners'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reg_number' => 'required|string',
            'brand' => 'required|string',
            'model' => 'required|string',
            'owner_id' => 'required|exists:owners,id',
        ]);

        $car = Car::create($validated);

        return redirect()->route('cars.index')->with('success', 'Car added successfully.');
    }

    public function index(Request $request)
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'reg_number' => 'required|string',
            'brand' => 'required|string',
            'model' => 'required|string',
            'owner_id' => 'required|exists:owners,id',
        ]);

        $car = Car::findOrFail($id);
        $car->update($validated);

        return redirect()->route('cars.index');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('cars.index');
    }
}
