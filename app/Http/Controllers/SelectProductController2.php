<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class SelectProductController2 extends Controller
{
    //
    
    function fetchDatalist(Request $reuqest)
    {
        $select=$reuqest->get('select');
        $data=Product::where("name","=",$select)->first();
        return $data;
    }
}
