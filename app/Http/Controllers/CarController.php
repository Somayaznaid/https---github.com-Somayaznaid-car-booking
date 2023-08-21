<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car; 


class CarController extends Controller
{

public function index(Request $request)
{
    $query = Car::query();

    if ($request->has('transmission')) {
        $query->where('transmission', $request->transmission);
    }

    if ($request->has('year')) {
        $query->where('year', $request->year);
    }

    if ($request->has('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

    if ($request->has('mileage')) {
        $query->where('mileage', '<=', $request->mileage);
    }

    if ($request->has('fuel')) {
        $query->where('fuel', $request->fuel);
    }

    if ($request->has('luggage')) {
        $query->where('luggage', '>=', $request->luggage);
    }

    if ($request->has('seats')) {
        $query->where('seats', '>=', $request->seats);
    }

    $filterCars = $query->get();

    return view('/car', compact('filterCars'));


}

}