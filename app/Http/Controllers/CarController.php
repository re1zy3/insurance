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
            'reg_number' => [
                'required',
                'string',
                'max:10',
                'regex:/^[A-Z]{3}\d{3}$/', // Example: ABC123
                'unique:cars,reg_number',
            ],
            'brand' => 'required|string|max:30',
            'model' => 'required|string|max:128',
            'owner_id' => 'required|exists:owners,id',
        ], [
            'reg_number.required' => __('The registration number is required.'),
            'reg_number.string' => __('The registration number must be a string.'),
            'reg_number.max' => __('The registration number must not be greater than 10 characters.'),
            'reg_number.regex' => __('The registration number must be in the correct format (e.g. ABC123).'),
            'reg_number.unique' => __('The registration number has already been taken.'),
            'brand.required' => __('The brand is required.'),
            'brand.string' => __('The brand must be a string.'),
            'brand.max' => __('The brand must not be greater than 30 characters.'),
            'model.required' => __('The model is required.'),
            'model.string' => __('The model must be a string.'),
            'model.max' => __('The model must not be greater than 128 characters.'),
            'owner_id.required' => __('The owner is required.'),
            'owner_id.exists' => __('The selected owner does not exist.'),
        ]);

        Car::create($validated);

        return redirect()->route('cars.index')->with('success', __('Car added successfully.'));
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
