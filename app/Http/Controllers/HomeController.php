<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $profit = DB::table('purchases')->sum('total_bill');
        $customer_visit = DB::table('purchases')->count('total_bill');
        $added_product = DB::table('products')->count('id');
        $total_members = DB::table('members')->count('id');
        $paid_members=DB::table('members')->where('fee_status',1)->count('id');
        $due_members=DB::table('members')->where('fee_status',0)->count('id');
        $today_appointment=DB::table('bookings')->count('id');
        $today_earning=DB::table('bookings')->sum('amount_paid');
        $unserved=DB::table('bookings')->where('is_served',0)->count('id');
        return view('dashboard', compact('profit', 'customer_visit', 'added_product', 'total_members',
    'paid_members','due_members','today_appointment','today_earning','unserved'));
    }
}
