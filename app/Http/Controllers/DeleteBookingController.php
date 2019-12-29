<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
class DeleteBookingController extends Controller
{
    //
    function delete(Request $request){
        $booking_id=$request->get('bookingId');
        $booking=Booking::find($booking_id);
        $booking->delete();
        return "deleted";
    }
}
