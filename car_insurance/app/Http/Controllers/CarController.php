<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        // eager-load owner so you can display Owner name on the table
        $cars = Car::with('owner')->get();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        // needed for your <select> of owners
        $owners = Owner::all();
        return view('cars.create', compact('owners'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'reg_number' => 'required|unique:cars,reg_number',
            'brand'      => 'required|string',
            'model'      => 'required|string',
            'owner_id'   => 'required|exists:owners,id',
        ]);

        Car::create($data);
        return redirect()->route('cars.index')
            ->with('success', 'Car added successfully.');
    }

    public function edit(Car $car)
    {
        $owners = Owner::all();
        return view('cars.edit', compact('car', 'owners'));
    }

    public function update(Request $request, Car $car)
    {
        $data = $request->validate([
            'reg_number' => "required|unique:cars,reg_number,{$car->id}",
            'brand'      => 'required|string',
            'model'      => 'required|string',
            'owner_id'   => 'required|exists:owners,id',
        ]);

        $car->update($data);
        return redirect()->route('cars.index')
            ->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')
            ->with('success', 'Car deleted successfully.');
    }
}
