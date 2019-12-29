@extends('main_layout')
@section('title','Parlor')
@section('page_description','View Bookings')
@section('dashboard_content')

<div class="container">

    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> {{ session()->get('message') }} </strong>
    </div>
    @endif
    <form action="/update/booking" method="post">
            @csrf 
        <div class="card">
            <p style="text-align: center;margin-top: 2%;font-family:Arial, Helvetica, sans-serif;
                font-size: 1.5rem;" class="text-info"><strong>Customer's Booking Details</strong></p>
            <hr>
            <div class="card-body">

                <div id="table" class="table-editable">
                    <!-- Table Starts here -->
                    <table id="Table" class="table table-bordered table-responsive-md table-striped text-center">
                        <thead>
                            <tr style="font-size: 12px;">
                                <th class="text-center">Id</th>
                                <th class="text-center">Customer Name</th>
                                <th class="text-center">Contact</th>
                                <th class="text-center">Services</th>
                                <th class="text-center">Amount Paid</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Edit Record</th>
                                <th class="text-center">Remove Record</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                            <tr>
                                <td class="pt-3-half">
                                    {{$booking->id}}
                                </td>
                                <td class="pt-3-half">
                                    {{$booking->customer_name}}
                                </td>
                                <td class="pt-3-half">
                                    {{$booking->contact_number}}
                                </td>
                                <td class="pt-3-half">
                                    {{$booking->services}}
                                </td>
                                <td class="pt-3-half">
                                    {{$booking->amount_paid}}
                                </td>
                                <td class="pt-3-half">
                                    @if($booking->is_served==0)
                                    {{"Not Served"}}
                                    @else
                                    {{"Served"}}
                                    @endif
                                </td>
                                <td class="pt-3-half">
                                    <span class="table-view"><button onclick="onEdit('{{$booking->id}}')" style="width:100%;" type="button" class="btn btn-info btn-rounded btn-sm my-0" data-toggle="modal" data-target="#myModal">Edit</button></span>
                                </td>
                                <td class="pt-3-half">
                                    <span class="table-remove"><button onclick="onDelete('{{$booking->id}}')" style="width:100%;" type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                </td>


                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!-- Modal -->

                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <p style="margin-left:30%;font-family:Arial, Helvetica, sans-serif;
                font-size: 1.5rem;" class="text-info text-center"><strong>Edit Customer's Booking Details</strong></p>

                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <hr>
                                </div>
                                <div class="modal-body">

                                    <label class="text-bold" for="customer_id"><strong>Customer's Id:</strong></label>
                                    <input id="customer_id" type="number" name="customer_id" class="form-control" readonly>

                                    <label class="text-bold" for="customer_name"><strong>Customer's Name:</strong></label>
                                    <input id="customer_name" type="text" name="customer_name" class="form-control" placeholder="Customer's Name" required autofocus>

                                    <label class="text-bold" for="contact_number"><strong>Customer's Contact:</strong></label>
                                    <input id="contact_number" type="number" name="contact_number" class="form-control" placeholder="Customer's Contact" required autofocus>

                                    <label class="text-bold" for="services"><strong>Customer's Services:</strong></label>
                                    <input id="services" type="text" name="services" class="form-control" placeholder="Customer's Services" required autofocus>

                                    <label class="text-bold" for="Customer_Amount"><strong>Customer's Amount Paid:</strong></label>
                                    <input id="Customer_Amount" type="number" name="customer_amount" class="form-control" placeholder="Amount Paid" required autofocus>

                                    <div class="checkbox">
                                        <label class="text-bold" for="customer_status"><strong>Customer's Service Status:</strong></label>
                                        <br>
                                        <input type="radio" name="customer_status" value="1"> Served
                                        <br>
                                        <input type="radio" name="customer_status" value="0"> Not Served
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info">Update</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!--modal end-->
                <hr class="bg-info rounded" style="width:100%;height:2px;border:none;color:#333;" size="30">
                <br>

            </div>
            <!-------Receipt Details and Print!--------->



            <!-------Receipt Details and Print!--------->
        </div>
</div>
<!--Card Ends Here-->
</div>

<!-------TABLE ENDS HERE-------------->
</form>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="csrf-token2" content="{{ csrf_token() }}" />

@section('scriptFiles')
<script script type="text/javascript">
    $(document).ready(function() {
        $('#Table').DataTable();
    });

    function onEdit(id) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      //to update data asynchronously without reloading the whole page.
        $.ajax({
            url: "{{route('SelectBookingController.fetch')}}",
            method: "POST",
            data: {
                bookingId: id,
                _token: CSRF_TOKEN
            },
            success: function(result) {
                document.getElementById('customer_id').value = result.id;

                document.getElementById('customer_name').value = result.customer_name;

                document.getElementById('contact_number').value = result.contact_number;

                document.getElementById('services').value = result.services;

                document.getElementById('Customer_Amount').value = result.amount_paid;
            }

        })

    }
</script>

<script>
    
function onDelete(id) {
        var CSRF_TOKEN = $('meta[name="csrf-token2"]').attr('content');
        $.ajax({
            url: "{{route('DeleteBookingController.delete')}}",
            method: "POST",
            data: {
                bookingId: id,
                _token: CSRF_TOKEN
            },
            success: function(result) {
                location.reload();
             }

        })

    }
    </script>


@endsection



@endsection