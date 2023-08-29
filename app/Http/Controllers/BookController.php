<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Car;
use App\Models\Booking;
use App\Models\Rating;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class BookController extends Controller
{
     
    public function carSinglePage(string $id)
     {

        $car = Car::find($id);
        $ratings = Rating::where('car_id' , $id)->get();
        // $booking = Booking::where('car_id', $id)->get('start_date');
        // $booking2 = Booking::where('car_id', $id)->get('end_date');

        if(!($car)){
          return '<h1 style="text-align:center ;color=red;">Sorry car id not found</h1>';
        }
        $booking = Booking::where('car_id', $id)->pluck('start_date')->toArray();
        $booking2 = Booking::where('car_id', $id)->pluck('end_date')->toArray();
          
        // Assuming $booking and $booking2 are arrays of start and end dates

        if ($booking) {
        $dateRange = CarbonPeriod::create(
            Carbon::createFromFormat('Y-m-d', $booking[0]),
            Carbon::createFromFormat('Y-m-d', $booking2[0])
        );
       
        $dates = array_map(fn ($date) => $date->format('Y-m-d'), iterator_to_array($dateRange));
        // dd($dates);
        return view('car_single' , compact('car', 'ratings','dates'));

    }

    $dates = null;
    
        return view('car_single' , compact('car', 'ratings', 'dates'));
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

    // $booking->timestamps();

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




    // public function showBookDay(string $id){
        
    //     $book= Booking::find()->where('');
    //     return view('car_single' , compact('book'));
    // }

    // public function showBookDayJson()
    //   {
    //     //  $booking = Booking::findOrFail($id); // Retrieve the booking with the specified ID
    
    //     //  $start_date = $booking->start_date; // Access the start_date column
    //     //  $end_date = $booking->end_date; // Access the end_date column

    //      $booking = Booking::all(['start_date']);

    //      return view('car_single', compact('booking'));
    //   }

}


