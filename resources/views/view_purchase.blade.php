@extends('main_layout')
@section('header')
@parent
<link rel="stylesheet" href="{{ asset('css/view_purchase.css') }}" type="text/css">
@endsection
@section('title','Boutique')
@section('page_description','View Purchases')
@section('dashboard_content')
<div class="container">

    <div class="card">
        <h3 class="text-info card-header text-center font-weight-bold text-uppercase py-4">Purchase History</h3>
        <div class="card-body">

            <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fa fa-search" aria-hidden="true">Search Record </i></a></span>

            <div id="table" class="table-editable">
                <form>
                    <!-- Table Starts here -->
                    <table class="table table-bordered table-responsive-md table-striped text-center">
                        <thead>
                            <tr style="font-size: 12px;">
                                <th class="text-center">S. No</th>
                                <th class="text-center">Sold Products</th>
                                <th class="text-center">Total Amount</th>
                                <th class="text-center">Paid Amount</th>
                                <th class="text-center">Returned Amount</th>
                                <th class="text-center">Selling Time</th>
                                <th class="text-center">Remove Record</th>
                                <th class="text-center">Edit Record</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pt-3-half">
                                  
                                </td>
                                <td class="pt-3-half">
                                   
                                </td>
                                <td class="pt-3-half">
                                   
                                </td>
                                <td class="pt-3-half">
                                   
                                </td>
                                <td class="pt-3-half">
                                  
                                </td>
                                <td class="pt-3-half">
                                   
                                </td>
                                <td>
                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                </td>
                                <td>
                                    <span class="table-edit"><button type="button" class="btn btn-primary btn-rounded btn-sm my-0">Edit</button></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr class="bg-info rounded" style="width:100%;height:2px;border:none;color:#333;" size="30">
                    <br>

            </div>
                <!-------Receipt Details and Print!--------->
               
                

                <!-------Receipt Details and Print!--------->
            </div>
        </div>
        <!--Card Ends Here-->
    </div>

    </form>
    <!-------TABLE ENDS HERE-------------->

</div>
@endsection
