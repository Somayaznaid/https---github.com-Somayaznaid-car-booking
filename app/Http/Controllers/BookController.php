<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Car;
use App\Models\Booking;

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
             'end_hour' => 'required|date_format:H:i',
             
         ]);

        //  dd($validatedData);
 
         $booking = new Booking();
 
         $booking->start_location = $request->input('start_location');
         $booking->end_location = $request->input('end_location');
         $booking->start_date = $request->input('start_date');
         $booking->end_date = $request->input('end_date');
         $booking->start_hour = $request->input('start_hour');
         $booking->end_hour = $request->input('end_hour');
         $booking->cost = $request->input('booking_cost');
         $booking->user_id = Auth::id();
         $booking->lessor_id = $request->input('lessor_id');
         $booking->car_id = $request->input('car_id');
        //  dd($booking);
         $booking->save();
         Session::flash('success', 'Booking created successfully.');
    
         return redirect()->back();
     }
}
