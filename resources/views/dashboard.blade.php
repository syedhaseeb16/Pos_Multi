@extends('main_layout')
@section('title','Dashboard')
@section('page_description','Administrator Dashboard')

@section('dashboard_content')
<br>
<div class="container">

    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="font-family: Poppins, sans-serif;font-size:15px">
        <strong>Daily Sales and Customer Visit!</strong> Below data will change accordingly.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">

                <div class="card-block" style="background: rgba(76, 175, 80, 0.2)">

                    <br>
                    <h5 class="text-center" style="font-family: Poppins, sans-serif;font-weight: bold;">
                        <small style="font-family: Poppins, sans-serif;font-weight: bold;">Botique</small>

                    </h5>

                    <hr style="border:0.5px dotted;width:80%">
                    <p class="text-muted text-center" style="font-size:15px;font-family: Poppins, sans-serif;font-weight: bold;">
                        Today's Profit</p>
                    <h5 class="text-center" style="font-family: Poppins, sans-serif;">
                    <small  style="font-family: Poppins, sans-serif;">Rs. </small>
                    <small  class="count" style="font-family: Poppins, sans-serif;">{{$profit}}</small>
                        <hr style="border:0.5px dotted;width:80%">
                        <p class="text-muted text-center" style="font-size:15px;font-family: Poppins, sans-serif;font-weight: bold;">
                            Today's Customer Visited</p>
                        <h5 class="text-center" style="font-family: Poppins, sans-serif;font-weight: bold;">
                            <small class="count" style="font-family: Poppins, sans-serif;">{{$customer_visit}}</small>
                            <hr style="border:0.5px dotted;width:80%">
                            <p class="text-muted text-center" style="font-size:15px;font-family: Poppins, sans-serif;font-weight: bold;">
                                New Products Added</p>
                            <h5 class="text-center" style="font-family: Poppins, sans-serif;font-weight: bold;">
                                <small class="count" style="font-family: Poppins, sans-serif;">{{$added_product}}</small>
                                <hr>


                                <hr class="bg-success rounded" style="width:90%;height:4px;border:none;color:#333;background-color:#333;" size="30">

                </div>
            </div>
        </div>
        <div class="col-sm-4">

            <div class="card">
                <div class="card-block" style="background: rgba(0,0,255,0.1)">

                    <br>

                    <h5 class="text-center" style="font-family: Poppins, sans-serif;font-weight: bold;">
                        <small style="font-family: Poppins, sans-serif;font-weight: bold;">Gym</small>

                    </h5>
                    <hr style="border:0.5px dotted;width:80%">
                    <p class="text-muted text-center" style="font-size:15px;font-family: Poppins, sans-serif;font-weight: bold;">
                        Total Members</p>
                    <h5 class="text-center" style="font-family: Poppins, sans-serif;font-weight: bold;">
                        <small class="count" style="font-family: Poppins, sans-serif;">{{$total_members}}</small>
                        <hr style="border:0.5px dotted;width:80%">
                        <p class="text-muted text-center" style="font-size:15px;font-family: Poppins, sans-serif;font-weight: bold;">
                            Payment Due Members</p>
                        <h5 class="text-center" style="font-family: Poppins, sans-serif;font-weight: bold;">
                            <small class="count" style="font-family: Poppins, sans-serif;">{{$due_members}}</small>
                            <hr style="border:0.5px dotted;width:80%">
                            <p class="text-muted text-center" style="font-size:15px;font-family: Poppins, sans-serif;font-weight: bold;">
                                Payment Completed Members</p>
                            <h5 class="text-center" style="font-family: Poppins, sans-serif;font-weight: bold;">
                                <small class="count" style="font-family: Poppins, sans-serif;">{{$paid_members}}</small>
                                <hr>
                                <hr class="bg-primary rounded" style="width:90%;height:4px;border:none;color:#333;background-color:#333;" size="30">

                </div>
            </div>
        </div>
        <div class="col-sm-4">

            <div class="card">
                <div class="card-block" style="background: rgba(255,255,0,0.2)">
                    <br>

                    <h5 class="text-center" style="font-family: Poppins, sans-serif;font-weight: bold;">
                        <small style="font-family: Poppins, sans-serif;font-weight: bold;">Parlour</small>

                    </h5>
                    <hr style="border:0.5px dotted;width:80%">
                    <p class="text-muted text-center" style="font-size:15px;font-family: Poppins, sans-serif;font-weight: bold;">
                        Today's Appointment</p>
                    <h5 class="text-center" style="font-family: Poppins, sans-serif;font-weight: bold;">
                        <small class="count" style="font-family: Poppins, sans-serif;">{{$today_appointment}}</small>
                        <hr style="border:0.5px dotted;width:80%">
                        <p class="text-muted text-center" style="font-size:15px;font-family: Poppins, sans-serif;font-weight: bold;">
                            Today's Earning </p>
                        <h5 class="text-center" style="font-family: Poppins, sans-serif;font-weight: bold;">
                        <small style="font-family: Poppins, sans-serif;">Rs.</small> <small class="count" style="font-family: Poppins, sans-serif;">{{$today_earning}}</small>
                            <hr style="border:0.5px dotted;width:80%">
                            <p class="text-muted text-center" style="font-size:15px;font-family: Poppins, sans-serif;font-weight: bold;">
                                Unserved Customers</p>
                            <h5 class="text-center" style="font-family: Poppins, sans-serif;font-weight: bold;">
                                <small class="count" style="font-family: Poppins, sans-serif;">{{$unserved}}</small>
                                <hr>
                                <hr class="bg-warning rounded" style="width:90%;height:4px;border:none;color:#333;background-color:#333;" size="30">

                </div>
            </div>
        </div>
    </div>

    @section('scriptFiles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $('.count').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 3000,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    </script>
    @endsection
    @endsection