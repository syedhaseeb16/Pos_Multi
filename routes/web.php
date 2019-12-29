<?php

use App\Product;
use App\Member;
use App\Booking;

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', 'HomeController@index')->name('dashboard');


//Route::get('/', function () {
//  return view('login');
//});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');


/*
|--------------------------------------------------------------------------
| AJAX EXAMPLE
|--------------------------------------------------------------------------

*/
Route::post('SelectProductController2', 'SelectProductController2@fetchDatalist')->name('SelectProductController2.fetchDatalist')->middleware('auth');

/*
|--------------------------------------------------------------------------
*/


Route::get('/boutique/add/purchase', function () {
    $products = Product::all();
    return view('add_purchase', compact('products'));
    //return $products;

})->middleware('auth');
Route::get('/boutique/view/products', function () {
    $products=Product::all();
    return view('view_products',compact('products'));
})->middleware('auth');
Route::get('/boutique/add/products', function () {
    return view('add_products');
})->middleware('auth');


Route::get('/gym/add/member', function () {
    return view('add_member');
})->middleware('auth');
Route::get('/gym/view/member', function () {

    $members = Member::all();
    return view('view_member', compact('members'));
})->middleware('auth');
Route::get('/gym/notify/members', function () {
    return view('notify_member');
});

Route::get('/parlor/add/appointment', function () {
    return view('add_appointment');
})->middleware('auth');
Route::get('/parlor/view/bookings', function () {
    $bookings = Booking::all();
    return view('view_parlor_bookings', compact('bookings'));
})->middleware('auth');


Route::post('/generate/receipt', 'ProductController@printReceipt')->middleware('auth');

Route::get('/boutique/add/purchase/updated', function () {
    $products = Product::all();
    $message = "Products inventory updated!";
    return view('add_purchase', compact('products', 'message'));
    //return $products;
})->middleware('auth');



Route::get('/gym/notify/members', function () {
    $members = Member::all();

    return view('gym_notify_members', compact('members'));
})->middleware('auth');

Route::post('/send/email', 'MailController@basic_email')->middleware('auth');


Route::post('/product/store', 'ProductController@store');

Route::post('/member/add', 'GymController@store');

Route::post('/booking/add', 'BookingsController@store');



//for parlo
Route::post('SelectBookingController', 'SelectBookingController@fetch')->name('SelectBookingController.fetch');

Route::post('DeleteBookingController', 'DeleteBookingController@delete')->name('DeleteBookingController.delete');

Route::post('/update/booking', 'BookingsController@update');



//for gym
Route::post('SelectMemberController', 'SelectMemberController@fetch')->name('SelectMemberController.fetch');

Route::post('DeleteMemberController', 'DeleteMemberController@delete')->name('DeleteMemberController.delete');

Route::post('/update/member', 'GymController@update');

//for botique
Route::post('SelectProductController', 'SelectProductController@fetch')->name('SelectProductController.fetch');

Route::post('DeleteProductController', 'DeleteProductController@delete')->name('DeleteProductController.delete');

Route::post('/update/product', 'ProductController@update');
