<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
class SelectBookingController extends Controller
{
    //
    function fetch(Request $request){
        $booking_id=$request->get('bookingId');
        $booking=Booking::find($booking_id);
        return $booking;
    }

    
}
