<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
class BookingsController extends Controller
{
    public function store(Request $request)
    {
      $booking=new Booking;
      $booking->customer_name=$request->cust_name;
      $booking->contact_number=$request->contact_num;
      $booking->services= $request->services;
      $booking->is_served= 0;
      $booking->amount_paid=$request->amount_paid;
      $booking->save();
      return redirect()->back()->with('message','New appointment has been booked!');
    }

    public function update(Request $request)
    {
      $booking_record=Booking::find($request->customer_id);
      $booking_record->customer_name=$request->customer_name;
      $booking_record->contact_number=$request->contact_number;
      $booking_record->services=$request->services;
      $booking_record->is_served=$request->customer_status;
      $booking_record->amount_paid=$request->customer_amount;
      $booking_record->save();

      return redirect()->back()->with('message','Booking Updated!');
      
    }

}
