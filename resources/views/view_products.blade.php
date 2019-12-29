@extends('main_layout')
@section('title','Boutique')
@section('page_description','View Products')
@section('dashboard_content')

<div class="container">
@if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> {{ session()->get('message') }} </strong>
    </div>
    @endif
    <form action="/update/product" method="post">
            @csrf 
    <div class="card">
    <p style="text-align: center;margin-top: 2%;font-family:Arial, Helvetica, sans-serif;
                font-size: 1.5rem;" class="text-info"><strong>Product's History</strong></p>
                <hr>
        <div class="card-body">
            <div id="table" class="table-editable">
                    <!-- Table Starts here -->
                    <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr style="font-size: 12px;">
                                <th class="text-center">Id</th>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Code</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Purchase Price</th>
                                <th class="text-center">Sale Price</th>
                                <th class="text-center">Edit Record</th>
                                <th class="text-center">Remove Record</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td class="pt-3-half">
                                 {{$product->id}}
                                </td>
                                <td class="pt-3-half">
                                {{$product->name}}
                                </td>
                                <td class="pt-3-half">
                                {{$product->category}}
                                </td>
                                <td class="pt-3-half">
                                {{$product->code}}
                                </td>
                                <td class="pt-3-half">
                                {{$product->quantity}}
                                </td>
                                <td class="pt-3-half">
                                {{$product->purchase_price}}
                                </td>
                                <td class="pt-3-half">
                                {{$product->sale_price}}
                                </td>
                                
                                <td class="pt-3-half">
                                <span class="table-view"><button onclick="onEdit('{{$product->id}}')" style="width:100%;" type="button" class="btn btn-info btn-rounded btn-sm my-0"data-toggle="modal" data-target="#myModal">Edit</button></span>
                                </td>
                                <td>
                                    <span class="table-remove"><button onclick="onDelete('{{$product->id}}')"type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
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
                font-size: 1.5rem;" class="text-info text-center"><strong>Edit Product's Details</strong></p>

                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <hr>
                                </div>
                                <div class="modal-body">

                                    <label class="text-bold" for="productId"><strong>Product's Id:</strong></label>
                                    <input id="productId" type="number" name="productId" class="form-control" readonly>

                                    <label class="text-bold" for="productName"><strong>Product's Name:</strong></label>
                                    <input id="productName" type="text" name="productName" class="form-control" placeholder="Product Name" required autofocus>

                                    <label class="text-bold" for="productCategory"><strong>Product's Category:</strong></label>
                                    <input id="productCategory" type="text" name="productCategory" class="form-control" placeholder="Member's Email" required autofocus>

                                    <label class="text-bold" for="productCode"><strong>Product Code:</strong></label>
                                    <input id="productCode" type="text" name="productCode" class="form-control" placeholder="Product Code" required autofocus>

                                    <label class="text-bold" for="productQuantity"><strong>Product Quantity:</strong></label>
                                    <input id="productQuantity" type="number" name="productQuantity" class="form-control" placeholder="Product Quantity" required autofocus>

                                    <label class="text-bold" for="purchasePrice"><strong>Purchase Prirce:</strong></label>
                                    <input id="purchasePrice" type="number" name="purchasePrice" class="form-control" placeholder="Purchase Price" required autofocus>

                                    <label class="text-bold" for="salePrice"><strong>Sale Prirce:</strong></label>
                                    <input id="salePrice" type="number" name="salePrice" class="form-control" placeholder="Sale Price" required autofocus>
                                   
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
    

</div>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="csrf-token2" content="{{ csrf_token() }}" />

@section('scriptFiles')
<script script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );

  function onEdit(id) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      //to update data asynchronously without reloading the whole page.
        $.ajax({
            url: "{{route('SelectProductController.fetch')}}",
            method: "POST",
            data: {
                productId: id,
                _token: CSRF_TOKEN
            },
            success: function(result) {
                document.getElementById('productId').value = result.id;

                document.getElementById('productName').value = result.name;

                document.getElementById('productCategory').value = result.category;

                document.getElementById('productCode').value = result.code;

                document.getElementById('productQuantity').value = result.quantity;

                document.getElementById('purchasePrice').value = result.purchase_price;

                document.getElementById('salePrice').value = result.sale_price;

            }

        })

    }
</script>
<script>
    
    function onDelete(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token2"]').attr('content');
            $.ajax({
                url: "{{route('DeleteProductController.delete')}}",
                method: "POST",
                data: {
                    productId: id,
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

