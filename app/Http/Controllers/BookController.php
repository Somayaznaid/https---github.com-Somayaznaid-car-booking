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
        $ratings = Rating::where('car_id' , $id)->get();
        return view('car_single' , compact('car', 'ratings'));
     }

     public function carSinglePageSale(string $id)
     {
         $car = Car::find($id);
        //  $ratings = Rating::with('user')->get();
          $ratings = Rating::where('car_id' , $id)
           ->get();
        
         return view('car_single_sale', compact('car', 'ratings'));
     }

    public function storeBooking(Request $request)
{
    
    $validatedData = $request->validate([
        'start_location' => 'required|string',
        'end_location' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'start_hour' => 'required|date_format:H:i',
        
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
    // Retrieve user's input
    $pickUpLocation = $request->input('pick_up_location');
    $dropOffLocation = $pickUpLocation;
    $pickUpDate = Carbon::createFromFormat('Y-m-d', $request->input('pick_up_date'))->startOfDay();
    $dropOffDate = Carbon::createFromFormat('Y-m-d', $request->input('drop_off_date'))->endOfDay();
    $time_pick = $request->input('time_pick');
    $minPrice = $request->input('min_price');
    $maxPrice = $request->input('max_price');

    // Get the booking IDs that don't overlap with the selected dates
    $bookingIds = Booking::where('end_date', '<', $pickUpDate)
        ->orWhere('start_date', '>', $dropOffDate)
        ->pluck('car_id');

    // Filter cars based on booking IDs and price range
    $availableCars = Car::whereNotIn('id', $bookingIds)
        ->where('price', '>=', $minPrice)
        ->where('price', '<=', $maxPrice)
        ->get();

    if ($availableCars->isEmpty()) {
        // No cars available for the selected dates and price range
        Session::flash('found', false);
    } else {
        Session::flash('found', true);
    }

    $bookings = Booking::all();
    $cars = Car::all();
    //   dd($availableCars);
    return view('index')->with(compact('availableCars', 'cars', 'bookings'));
}


public function rating(Request $request, $id)
{
    $rating = new Rating();
    $rating->comments = $request->input("comments");
    $rating->star_rating = 0; // Retrieve the rating value from the request
    $rating->car_id = $request->input('car_id');
    $rating->user_id = Auth::id();
    $rating->save();
    
    $ratings = Rating::where('car_id' , 13)->get();
    // dd($ratings);
    return redirect()->back();
}

// public function reviewstore(Request $request){
//     $review = new Rating();
//     $review->car_id = $request->car_id;
//     $review->comments= $request->comment;
//     $review->star_rating = $request->rating;
//     $review->user_id = Auth::id();
//     $review->service_id = $request->service_id;
//     $review->save();
//     return redirect()->back()->with('flash_msg_success','Your review has been submitted Successfully,');
// }


    public function showAllCars( ){
        
        // $cars= Car::limit(5)->get();
        $cars= Car::all();
        return view('car' , compact('cars'));
    } // limit sql 

    public function showBookDay(string $id){
        
        $book= Booking::find()->where('');
        return view('car_single' , compact('book'));
    }
}


// public function showBookDay(string $id)
// {
//     $booking = Booking::findOrFail($id); // Retrieve the booking with the specified ID
    
//     $start_date = $booking->start_date; // Access the start_date column
//     $end_date = $booking->end_date; // Access the end_date column

//     return view('car_single', compact('booking', 'start_date', 'end_date'));
// }