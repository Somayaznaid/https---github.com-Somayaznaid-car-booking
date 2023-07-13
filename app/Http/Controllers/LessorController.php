<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;

class LessorController extends Controller
{
    
    public function addCar(Request $request)
{
    // Validate the incoming request using the CarRequest or custom validation logic

    $validated = $request->validate([
        'name' => 'required',
        'price' => 'required',
        'city' => 'required',
        'description' => 'required',
        'mileage' => 'required',
        'transmission' => 'required',
        'seats' => 'required',
        'luggage' => 'required',
        'fuel' => 'required',
        'img_1' => 'required|image|mimes:jpeg,png,jpg,gif',
        'img_2' => 'required|image|mimes:jpeg,png,jpg,gif',
        'img_3' => 'required|image|mimes:jpeg,png,jpg,gif',
        'year_of_manufacture' => 'required',
    ]);

    // Create a new car instance and assign the necessary attributes

    $car = new Car();
    $car->name = $request->input('name');
    $car->description = $request->input('description');
    $car->mileage = $request->input('mileage');
    $car->mileage = $request->input('city'); 
    $car->mileage = $request->input('price');
    $car->transmission = $request->input('transmission');
    $car->seats = $request->input('seats');
    $car->luggage = $request->input('luggage');
    $car->fuel = $request->input('fuel');

    $img_1 = $request->file('img_1'); // Updated input name to 'img'
    $imagePath = $this->storeImage($img_1);
    $car->img_1 = $imagePath;

    $img_2 = $request->file('img_2'); // Updated input name to 'img'
    $imagePath = $this->storeImage($img_2);
    $car->img_2 = $imagePath;

    $img_3 = $request->file('img_3'); // Updated input name to 'img'
    $imagePath = $this->storeImage($img_3);
    $car->img_3 = $imagePath;


    $car->year_of_manufacture = $request->input('year_of_manufacture');
    $car->lessor_id = Auth::id();
    $car->user_id = null;

    $car->save();

    return redirect('product')->with('success', 'Car added successfully!');
}

private function storeImage($file)
{
    $extension = $file->getClientOriginalExtension();
    $filename = time() . '_' . uniqid() . '.' . $extension;
    $file->move(public_path('images'), $filename);
    return $filename;
}

    public function showCars(){
        
        $car = Car::all();
        return view('index' , ['car' =>$car]);
    }

    public function showCarsLessor(){
        $id= Auth::lessor()->id;
        // dd($id);
        // $lessor = Lessor::where('id' , $id);
        $car = Car::find($id);
        return view('product' , ['car' =>$car]);
    }

}
