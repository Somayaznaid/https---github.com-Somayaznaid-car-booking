<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Booking;
use App\Models\Lessor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        'type_id' => 'required',
    ]);
    // dd($validated) ;
    // Create a new car instance and assign the necessary attributes

    $car = new Car();
    $car->name = $request->input('name');
    $car->description = $request->input('description');
    $car->mileage = $request->input('mileage');
    $car->mileage = $request->input('city'); 
    $car->price = $request->input('price');
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
    $car->type_id = $request->input('type_id');
    $car->lessor_id = Auth::id();
    $car->user_id = null;

    $car->save();
    Session::flash('add_product_found');
    return redirect('product')->with('add_product_found', 'Car added successfully!');
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

    public function showCarsLessor(Request $request)
    {
        $id = Auth::id(); 
        $cars = Car::where('lessor_id', $id)
            // ->where('type_id', 1)
            ->get();
        
        $bookings = Booking::with('car')
            ->where('lessor_id', $id)
            ->get();
        
        return view('product_lessor', compact('cars', 'bookings'));
    }

    public function showBookingLessor(Request $request)
    {
        $id = Auth::id(); 
        $cars = Car::where('lessor_id', $id)
            // ->where('type_id', 1)
            ->get();
        
        $bookings = Booking::with('car')
            ->where('lessor_id', $id)
            ->get();
        
        return view('order_lessor', compact('cars', 'bookings'));
    }
    


public function deleteProduct(string $id)
{
    $data = Car::find($id);

   
    if (Booking::where('car_id' , $id)->exists()) {
        // dd(Booking::where('car_id' , $id)->get());
        return redirect('/product')->with('warning', 'Deleting this car is not allowed as it has associated bookings, and removing it would compromise the accuracy of the booking records.');

    } else {

        $data->delete();
        return redirect('/product')->with('success', 'Car deleted successfully.');
    }
}

  public function showCarEdit(string $id){
     
      $car = Car::find($id);
      
      return view('edit_product', compact('car'));
  }

  public function editCar(Request $request)
  {
      // Validate the incoming request using the CarRequest or custom validation logic
    //   dd("car");
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
          'year_of_manufacture' => 'required',
      ]);
  
      // Create a new car instance and assign the necessary attributes
  
      $car = Car::find($request->input('car_id'));

      $car->name = $request->input('name');
      $car->description = $request->input('description');
      $car->mileage = $request->input('mileage');
      $car->city = $request->input('city'); 
      $car->price = $request->input('price');
      $car->transmission = $request->input('transmission');
      $car->seats = $request->input('seats');
      $car->luggage = $request->input('luggage');
      $car->fuel = $request->input('fuel');


      if($request->input('img_1') || $request->input('img_2')|| $request->input('img_3') ){
      $img_1 = $request->file('img_1'); // Updated input name to 'img'
      $imagePath = $this->storeImage($img_1);
      $car->img_1 = $imagePath;
  
      $img_2 = $request->file('img_2'); // Updated input name to 'img'
      $imagePath = $this->storeImage($img_2);
      $car->img_2 = $imagePath;
  
      $img_3 = $request->file('img_3'); // Updated input name to 'img'
      $imagePath = $this->storeImage($img_3);
      $car->img_3 = $imagePath;
      }
  
      $car->year_of_manufacture = $request->input('year_of_manufacture');
      
      
    
      $car->update();
      Session::flash('edit_product_found');
      return redirect('product')->with('edit_product_found', 'Car edit successfully!');
  }


  public function showLessorProfile(){
       $id = Auth::id(); 
    $lessor =  Lessor::find($id);
    return view('/lessor_profile' ,compact('lessor') );
  }



  public function approve($id)
  {
      $order = Booking::findOrFail($id);
      $order->status = 'approved';
      $order->save();

      // Add any additional logic or notifications you need here

      return redirect()->back()->with('success_approve', 'Order approved successfully.');
  }

  public function reject($id)
  {
      $order = Booking::findOrFail($id);
      $order->status = 'rejected';
      $order->delete();

      // Add any additional logic or notifications you need here

      return redirect()->back()->with('success_reject', 'Order rejected successfully.');
  }


  public function editLessorInfo(Request $request)
  {
      // Retrieve the lessor's ID
      $lessorId = Auth::id();
  
      // Find the lessor record
      $lessor = Lessor::findOrFail($lessorId);
  
      // Update the lessor's information
      $lessor->name = $request->input('name');
      $lessor->email = $request->input('email');
      if ($request->filled('password')) {
          $lessor->password = bcrypt($request->input('password'));
      }
      $lessor->phone = $request->input('phone');
      $lessor->save();
  
      Session::flash('success', 'Your profile has been updated successfully.');
  
      return redirect()->back();
  }
  
}
