<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class DeleteProductController extends Controller
{
    function delete(Request $request){
        $product_id=$request->get('productId');
        $product=Product::find($product_id);
        $product->delete();
        return "deleted";
    }
}
