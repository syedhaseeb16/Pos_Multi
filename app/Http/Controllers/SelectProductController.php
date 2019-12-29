<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class SelectProductController extends Controller
{
    //

    function fetch(Request $request){
        $product_id=$request->get('productId');
        $product=Product::find($product_id);
        return $product;
    }

}
