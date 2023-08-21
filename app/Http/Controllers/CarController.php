<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car; 


class CarController extends Controller
{
    
    public function filterCars(Request $request)
    {
        $query = Car::query();

        if ($request->has(2)) {
            $query->orWhere('type_id',2); //sale
        }
    
        elseif ($request->has(1)) {
            $query->orWhere('type_id', 1); //booking
        }
    
        elseif ($request->has('manual')) {
            $query->orWhere('transmission', 'manual');
        }
    
        elseif ($request->has('automatic')) {
            $query->orWhere('transmission', 'automatic');
        }
    
        elseif ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        elseif ($request->has('fuel')) {
            $query->where('fuel', $request->fuel);
        }

        elseif ($request->has('luggage')) {
            $query->where('luggage', $request->luggage);
        }
    
        elseif ($request->has('seats')) {
            $query->where('seats', $request->seats);
        }

        elseif ($request->has('mileage')) {
            $query->where('mileage', $request->mileage);
        }
    
    
        elseif ($request->has('year_of_manufacture')) {
            $query->where('year_of_manufacture', $request->year_of_manufacture);
        }
         // ... Repeat for other checkboxes ...
    
        $filterCars = $query->get();
    
        $cars= Car::all();

        return view('/car', compact('filterCars') , compact('cars'));

    }
}


// public function showAllCars( ){
        
//     // $cars= Car::limit(5)->get();
   
//     return view('car' , compact('cars'));
// } // limit sql 

