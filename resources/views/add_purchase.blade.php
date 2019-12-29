@section('header')
@parent
<link rel="stylesheet" href="{{ asset('css/add_purchase.css') }}" type="text/css">
@endsection
@extends('main_layout')
@section('title','Boutique')
@section('page_description','Add Purchases')

@section('dashboard_content')


<div class="container">
    @if(!empty($message))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card">
        <h3 style="text-align: center;font-family:Arial, Helvetica, sans-serif;
                font-size: 1.3rem;" class="text-info card-header text-center font-weight-bold text-uppercase py-4">Customer Receipt</h3>
        <div class="card-body">

            <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus-circle fa-1.5x" aria-hidden="true"> Add New Item</i></a></span>

            <div id="table" class="table-editable">
                <form action="/generate/receipt" method="post">
                    {{csrf_field()}}
                    <!-- Table Starts here -->
                    <table class="table table-bordered table-responsive-md table-striped text-center">
                        <thead>
                            <tr>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Code</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Total Price</th>
                                <th class="text-center">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pt-3-half">
                                    <input list="products" class="prod_name" id="prod_name_0" name="prod_name[]" placeholder="Product Name" onchange="getProduct(this)">
                                    <datalist id="products" class="prod_name">
                                        @foreach($products as $product)
                                        <option value="{{$product->name}}"> </option>
                                        @endforeach
                                    </datalist>
                                    {{csrf_field()}}
                                </td>
                                <td class="pt-3-half">
                                    <input type="text" class="prod_code" placeholder="Product Code" name="prod_code[]" id="prod_code_0" readonly>
                                </td>
                                <td class="pt-3-half">
                                    <input type="text" placeholder="Product Category" name="prod_category[]" id="prod_category_0" readonly>
                                </td>
                                <td class="pt-3-half">
                                    <input type="text" placeholder="Product Price" name="prod_price[]" id="prod_price_0" readonly>
                                </td>
                                <td class="pt-3-half">
                                    <input type="text" placeholder="Product Quantity" name="prod_quantity[]" id="prod_quantity_0" onchange="getId(this,this.value)">
                                </td>
                                <td class="pt-3-half">
                                    <input type="text" placeholder="Total Price" name="total_price[]" id="total_price_0" readonly>
                                </td>
                                <td>
                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr class="bg-info rounded" style="width:100%;height:2px;border:none;color:#333;" size="30">
                    <br>

            </div>
            <div class="card-footer">
                <!-------Receipt Details and Print!--------->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group input-group-sm mb-3 half">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Paid Amount</span>
                            </div>
                            <input onchange="amountPaid(this.value)" id="amount_paid" name="amount_paid" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Paid Amount">

                        </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="input-group input-group-sm mb-3 half">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Total Amount</span>
                            </div>
                            <input id="amount_total" name="amount_total" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Total Amount">

                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-sm-6">
                        <div class="input-group input-group-sm mb-3 half">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Return Amount</span>
                            </div>
                            <input id="amount_return" name="amount_return" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Return Amount">

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary btn-rounded btn-sm float-right">Generate Receipt</button>
                    </div>

                </div>

                <!-------Receipt Details and Print!--------->
            </div>
        </div>
        <!--Card Ends Here-->
    </div>

    </form>
    <!-------TABLE ENDS HERE-------------->

</div>

@endsection

@section('scriptFiles')

<script type="text/javascript" src="{{ asset('js/add_purchase.js') }}">
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />


<script>
    var count = 0;
    var totalBill = 0;

    function getProduct(productName) {

        if ($(productName).val() != '') //if selected option is not empty
        {
            var select = $(productName).val(); //stores selected option value in it
            var _token = $('input[name="_token"]').val(); //token generated by csrf field
            // alert(_token);
            //alert(select);

            $.ajax({
                url: "{{route('SelectProductController2.fetchDatalist') }}",
                method: "POST",
                data: {
                    select: select,
                    _token: _token
                },
                success: function(result) {
                    var codeId = "prod_code_";
                    var resCodeId = codeId.concat(count);
                    var categoryId = "prod_category_";
                    var resCategoryId = categoryId.concat(count);

                    var priceId = "prod_price_";
                    var resPriceId = priceId.concat(count);
                    // alert(resCodeId + " " + resCategoryId + " " + resPriceId);
                    count++;
                    document.getElementById(resCodeId).value = result.code;
                    document.getElementById(resCategoryId).value = result.category;
                    document.getElementById(resPriceId).value = result.purchase_price;
                    // $("input[name='prod_code']").val(result.code);
                    // $("input[name='prod_category']").val(result.category);
                    // $("input[name='prod_price']").val(result.purchase_price);

                }
            })

        }
    }



    function getId(element, itemQuantity) {
        var row = element.parentNode.parentNode.rowIndex - 1;
        var totalPriceId = "total_price_";
        var resTotalPriceId = totalPriceId.concat(row);
        var itemPriceId = "prod_price_";
        var resItemPriceId = itemPriceId.concat(row);
        var totalPrice = document.getElementById(resItemPriceId).value * itemQuantity;
        document.getElementById(resTotalPriceId).value = totalPrice;
        totalBill = totalBill + totalPrice;
        document.getElementById("amount_total").value = totalBill;
        // alert(resTotalPriceId+" "+itemQuantity+" "+resItemPriceId+" "+totalPrice);
    }


    function amountPaid(amountPaid) {
        totalAmount = document.getElementById("amount_total").value;
        document.getElementById("amount_return").value = amountPaid - totalAmount;
    }
</script>



@endsection