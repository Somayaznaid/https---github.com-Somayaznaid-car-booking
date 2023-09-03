<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car; 


class CarController extends Controller
{

    public function filterCars(Request $request)
    {
        $filters = [
            'type_id' => $request->input('type_id'),
            'transmission' => $request->input('transmission'),
            'name' => $request->input('name'),
            'fuel' => $request->input('fuel'),
            'luggage' => $request->input('luggage'),
            'seats' => $request->input('seats'),
            'mileage' => $request->input('mileage'),
            'year_of_manufacture' => $request->input('year_of_manufacture'),
        ];
    
        $query = Car::query();
    
        foreach ($filters as $filter => $value) {
            if (!is_null($value)) {
                switch ($filter) {
                    case 'type_id':
                        if ($value == 1 || $value == 2) {
                            $query->where('type_id', $value);
                        }
                        break;
                    case 'transmission':
                        if (in_array($value, ['manual', 'automatic'])) {
                            $query->where('transmission', $value);
                        }
                        break;
                    case 'name':
                        $query->where('name', 'like', '%' . $value . '%');
                        break;
                    case 'year_of_manufacture':
                    case 'mileage':
                    case 'seats':
                    case 'fuel':
                    case 'luggage':
                        $query->where($filter, $value);
                        break;
                }
            }
        }
    
        $filterCars = $query->get();
        $cars = Car::all();
    
        if ($filterCars->isEmpty()) {
            // Flash a message to the session when no cars match the filters
            session()->flash('no_cars_message', 'No cars match the selected filters.');
        }
    
        return view('/car', compact('filterCars', 'cars'));
    }
    

}


// public function showAllCars( ){
        
//     // $cars= Car::limit(5)->get();
   
//     return view('car' , compact('cars'));
// } // limit sql 

