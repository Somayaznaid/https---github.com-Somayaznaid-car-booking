<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car; 


class CarController extends Controller
{
    
    // public function filterCars(Request $request)
    // {
    //     $query = Car::query();

    //     if ($request->has('type_id')) {
    //         $query->Where('type_id', 2); //sale
             
    //     }
    
    //     if ($request->has('type_id')) {
    //         $query->Where('type_id', 1); //booking
    //     }
    
    //     if ($request->has('transmission')) {
    //         $query->Where('transmission', 'manual');
    //     }
    
    //     if ($request->has('transmission')) {
    //         $query->Where('transmission', 'automatic');
    //     }
    
    //     if ($request->has('name')) {
    //         $query->where('name', 'like', '%' . $request->name . '%');
    //     }

    //     if ($request->has('fuel')) {
    //         $query->where('fuel', $request->fuel);
    //     }

    //     if ($request->has('luggage')) {
    //         $query->where('luggage', $request->luggage);
    //     }
    
    //     if ($request->has('seats')) {
    //         $query->where('seats', $request->seats);
    //     }

    //     if ($request->has('mileage')) {
    //         $query->where('mileage', $request->mileage);
    //     }
    
    
    //     if ($request->has('year_of_manufacture')) {
    //         $query->where('year_of_manufacture', $request->year_of_manufacture);
    //     }
        
    
    //     $filterCars = $query->get();

    
    //     $cars= Car::all();

    //     return view('/car', compact('filterCars','cars'));
    // }

    public function filterCars(Request $request)
{
    $query = Car::query();

    // Check if any filter parameters are provided
    $hasFilters = $request->filled('type_id') ||
                  $request->filled('transmission') ||
                  $request->filled('name') ||
                  $request->filled('fuel') ||
                  $request->filled('luggage') ||
                  $request->filled('seats') ||
                  $request->filled('mileage') ||
                  $request->filled('year_of_manufacture');

    if ($hasFilters) {
        if ($request->has('type_id') && $request->type_id == 2) {
            $query->where('type_id', 2); // Sale
        }

        if ($request->has('type_id') && $request->type_id == 1) {
            $query->where('type_id', 1); // Booking
        }

        if ($request->has('transmission') && $request->transmission == 'manual') {
            $query->where('transmission', 'manual');
        }

        if ($request->has('transmission') && $request->transmission == 'automatic') {
            $query->where('transmission', 'automatic');
        }

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('fuel')) {
            $query->where('fuel', $request->fuel);
        }

        if ($request->has('luggage')) {
            $query->where('luggage', $request->luggage);
        }

        if ($request->has('seats')) {
            $query->where('seats', $request->seats);
        }

        if ($request->has('mileage')) {
            $query->where('mileage', $request->mileage);
        }

        if ($request->has('year_of_manufacture')) {
            $query->where('year_of_manufacture', $request->year_of_manufacture);
        }

    
    }

    $filterCars = $query->get();

    $cars = Car::all();

    return view('/car', compact('filterCars', 'cars'));
}

}


// public function showAllCars( ){
        
//     // $cars= Car::limit(5)->get();
   
//     return view('car' , compact('cars'));
// } // limit sql 

