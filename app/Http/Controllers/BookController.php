<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Car;
use App\Models\Booking;
use App\Models\Rating;
use Carbon\Carbon;

class BookController extends Controller
{
     
    public function carSinglePage(string $id)
     {

        $car = Car::find($id);
        
        return view('car_single' , compact('car'));
     }



    public function storeBooking(Request $request)
{
    
    $validatedData = $request->validate([
        'start_location' => 'required|string',
        'end_location' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'start_hour' => 'required|date_format:H:i',
        
        // 'end_hour' => 'required|date_format:H:i',
        // 'booking_cost' => 'required|numeric', // Add validation for booking_cost
    ]);

    // dd($validatedData);
    
    $booking = new Booking();
    $car = new Car();
    $booking->start_location = $request->input('start_location');
    $booking->end_location = $request->input('end_location');
    $booking->start_date = $request->input('start_date');
    $booking->end_date = $request->input('end_date');
    $booking->start_hour = $request->input('start_hour');
    $booking->end_hour =$booking->start_hour;
    $booking->booking_cost = $request->input('booking_cost'); 
    $booking->user_id = Auth::id();
    $booking->lessor_id = $request->input('lessor_id');
    $booking->car_id = $request->input('car_id');
    $car_price = $request->input('car_price');

    $startDate = \Carbon\Carbon::createFromFormat('Y-m-d', $booking->start_date);
    // dd($startDate);
    $endDate = \Carbon\Carbon::createFromFormat('Y-m-d', $booking->end_date);
    $booking->booking_cost = $car_price * $startDate->diffInDays($endDate);

    // dd($booking);


    $booking->save();
    Session::flash('success', 'Booking created successfully.');

    return redirect()->back();
}
 




public function showAvailableCars(Request $request)
{
    $car = Car::all();
    // dd($car);
    
    // Retrieve user's input
    $pickUpLocation = $request->input('pick_up_location');
    $dropOffLocation = $request->input('drop_off_location');
    $pickUpDate = Carbon::createFromFormat('Y-m-d', $request->input('pick_up_date'))->startOfDay();
    $dropOffDate = Carbon::createFromFormat('Y-m-d', $request->input('drop_off_date'))->endOfDay();
    $time_pick = $request->input('time_pick');
    $minPrice = $request->input('min_price');
    $maxPrice = $request->input('max_price');

    // Perform filtering logic to get the available cars based on the user's input
    $bookingIds = Booking::whereNot('start_date', '<=', $dropOffDate) //find first index
                        ->where('end_date', '>=', $pickUpDate)
                        ->pluck('car_id');
    
    if ($bookingIds->isEmpty()) {
        // No bookings found for the selected dates
        $availableCars = collect(); // Empty collection
    } else {
        $availableCars = Car::whereIn('id', $bookingIds) //every index
                            ->where('price', '>=', $minPrice) // Filter by minimum price
                            ->where('price', '<=', $maxPrice) // Filter by maximum price
                            ->get();        
    }
    
    if ($availableCars->isEmpty()) {
        // No cars available for the selected dates and price range
        Session::flash('found', false);
    } else {
        Session::flash('found', true);
    }
    
    return view('index')->with('carsAva', $availableCars)->with('car', $car);
}


public function rating(Request $request , $id){
   
    $rating= new Rating();
    $rating->comments = $request->input("comments");
    $rating->star_rating = 3;
    $rating->car_id = $request->input('car_id');
    $rating->user_id = Auth::id();
    $rating->save();
    return  redirect()->back();
}

    public function showAllCars(){
        $cars= Car::all();
        return view('car')->with('cars', $cars);
    }
}
