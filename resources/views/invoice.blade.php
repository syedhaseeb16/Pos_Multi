<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Customer Receipt</title>
    <link rel="stylesheet" href="{{ asset('css/invoice.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

</head>

<body>
    
    <div class="invoice-box">
    <br>
        <h1>The Fashion House</h1>
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>

                            <td>
                                <?php echo "Date: " . date("d/m/Y") . "<br>";
                                echo "Time: " . date("h:i a") . "<br>";
                                ?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>



            <tr class="heading">
                <td>
                    Product Name
                </td>
                <td>
                    Item Code
                </td>
                <td>
                    Item Price
                </td>
                <td>
                    Quantity
                </td>

                <td>
                    Total Price
                </td>
            </tr>
         <?php for($x=0;$x<count($product_code);$x++){  ?>
            <tr class="item">
                
                    
                    <td>
                    {{$product_name[$x]}}
                    </td>
               

                <td>
                    {{$product_code[$x]}}
                </td>


                <td>
                   &nbsp;&nbsp;&nbsp; Rs.{{$product_price[$x]}}
                </td>


                <td>
                    x{{$product_quantity[$x]}}
                </td>



                <td>
                    Rs.{{$total_price[$x]}}
                </td>


            </tr>
         <?php } ?>
        </table>
        <hr class="bg-info rounded" style="width:100%;height:2px;border:none;color:#333;" size="30">
        <p class="text-right">
            <strong class="text-primary">Total: Rs. {{$total_bill}}</strong>
            <br>
            <strong class="text-primary">Amount Paid: Rs. {{$amount_paid}}</strong>
            <br>
            <strong class="text-primary">Amount Returned: Rs. {{$amount_return}}</strong>
            <br><br>
             <button target="_blank" class="btn btn-danger" onclick="myFunction()"> Print Receipt </button>
        </p>

    </div>
    <script>
    function myFunction() {
    window.print();
    location.href = "/boutique/add/purchase/updated";
    }
</script>
</body>

</html>