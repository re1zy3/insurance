<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'reg_number' => 'required|string',
            'brand' => 'required|string',
            'model' => 'required|string',
            'owner_id' => 'required|exists:owners,id',
        ]);

        $car = Car::create($validated);

        return redirect()->route('owners.show', $car->owner_id);
    }

    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }
}
