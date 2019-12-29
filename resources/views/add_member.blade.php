@section('header')
@parent
<link rel="stylesheet" href="{{ asset('css/add_member.css') }}" type="text/css">
@endsection

@extends('main_layout')
@section('title','Gym')
@section('page_description','Add Gym Member')
@section('dashboard_content')
@if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>  {{ session()->get('message') }} </strong>
    </div>
@endif

<div class="container border border-secondary rounded">

    <p style="text-align: center;margin-top: 2%;font-family:Arial, Helvetica, sans-serif;
                font-size: 1.5rem;" class="text-info"><strong>
        Enter Member's Information Below</strong></p><hr>
    

    <!----Product Details FORM BEGINS HERE-->
    <form class="form-signin"action="/member/add" method="post">
    {{csrf_field()}}
        <div class="row">
            <div class="col-sm-6">
                <div class="form-label-group">
                    <input id="inputName" type="text" name="member_name" class="form-control" placeholder="Member Name" required autofocus>
                    <label class="text-muted" for="inputName">Member Name</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-label-group">
                    <input id="memberContact" type="number"name="member_contact" class="form-control" placeholder="Member Contact" required>
                    <label class="text-muted" for="inputContact">Member Contact</label>
                </div>
            </div>
        </div>
        <div class="form-label-group">
            <input type="email" id="memberEmail" name="email" class="form-control" placeholder="Email Address" required>  
            <label class="text-muted" for="inputEmail">Email Address</label>
        </div>
        
        <div class="form-label-group">
            <input type="text" id="memberAddress"name="address" class="form-control" placeholder="Address" required> 
            <label class="text-muted" for="inputAddress">Address</label>
        </div>
        <div class="form-label-group">
            <input id="inputJoin" type="date"name="joining_date" class="form-control" placeholder="Joining Date" required>
            <label class="text-muted" for="inputJoin">Joining Date</label>
        </div>

        <br>

        <div class="row">
            <div class="col-sm-6">

                <input type="reset" value="Reset" class="btn btn-danger">
            </div>
            <div class="col-sm-6">

                <button class="btn btn-primary" type="submit">Add Member</button>
            </div>
        </div>


    </form>
    <!-------------------------END HERE--------------------------------------------->

    <br>
</div>

@endsection

@section('scriptFiles')
@parent

@endsection