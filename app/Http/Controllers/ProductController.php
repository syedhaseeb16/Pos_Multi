<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\Product;

class ProductController extends Controller
{
    //
    public function printReceipt(Request $request)
    {
        $purchase = new Purchase;
        for ($i = 0; $i < count($request->prod_code); $i++) {
            $product_code[$i] = $request->prod_code[$i];
            // echo $request->prod_code[$i]."<br>";
            $product_name[$i] = $request->prod_name[$i];
            //echo $request->prod_category[$i]."<br>";
            $product_price[$i] = $request->prod_price[$i];
            $product_quantity[$i] = $request->prod_quantity[$i];
            $total_price[$i] = $request->total_price[$i];

            $products = Product::where('code', '=', $request->prod_code[$i])->first();
            $products->quantity = $products->quantity - $request->prod_quantity[$i];
            $products->save();
        }
        //print_r($product_code);
         $purchase->total_bill=$request->amount_total;
        $purchase->save();
        $total_bill = $request->amount_total;
        $amount_paid = $request->amount_paid;
        $amount_return = $request->amount_return;
        return view('invoice')->with(compact(
            'product_code',
            'product_name',
            'product_quantity',
            'product_price',
            'total_price',
            'total_bill',
            'amount_paid',
            'amount_return'
        ));
    }
    public function store(Request $request)
    {
        $product=new Product;
        $product->name=$request->prod_name;
        $product->category=$request->prod_category;
        $product->code=$request->prod_code;
        $product->purchase_price=$request->purchase_price;
        $product->sale_price=$request->sale_price;
        $product->quantity=$request->prod_quantity;
        $product->save();
        return redirect()->back()->with('message', 'Product has been stored!');
    }
    public function update(Request $request)
        {
          $product_record=Product::find($request->productId);
          $product_record->name=$request->productName;
          $product_record->category=$request->productCategory;
          $product_record->code=$request->productCode;
          $product_record->quantity=$request->productQuantity;
          $product_record->purchase_price=$request->purchasePrice;
          $product_record->sale_price=$request->salePrice;
          $product_record->save();
    
          return redirect()->back()->with('message','Product Updated!');
          
        }

   
}
