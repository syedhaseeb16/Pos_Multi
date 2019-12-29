@section('header')
@parent
<!--Librar Files CSS -->
@endsection
@extends('main_layout')
@section('title','Gym')
@section('page_description','Notify Gym Members')

@section('dashboard_content')
@if (\Session::has('success'))
    <div class="alert alert-success">
        {!! \Session::get('success') !!}
        
    </div>
@endif
<!-- Default form login -->
<form class="text-center border border-light p-5" action="/send/email" method="post">
   {{csrf_field()}}
    <p class="h4 mb-4 text-info">Your Message to Gym Members</p>

    <!-- To -->
    <input list="listOfEmails" type="email" name="email" id="email" class="form-control mb-4" placeholder="Receiver E-mail">
     <datalist id="listOfEmails">
         @foreach($members as $member)
         <option>{{$member->email}}</option>
         @endforeach
     </datalist>
    <!-- Subject -->
    <input type="text" name="subject" id="subject" class="form-control mb-4" placeholder="Subject">

    <input style="height:100px" type="text" name="text" id="text" class="form-control mb-4" placeholder="Your message here..">
    

    <!-- Send Message -->
    <button class="btn btn-primary 4" type="submit">Send Email</button>



</form>

@section('scriptFiles')

@endsection

@endsection