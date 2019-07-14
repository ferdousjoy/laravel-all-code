<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Order;
use Auth;

class CustomerController extends Controller
{
  function customerarea()
  {
  $total_sale= Sale::where('user_id',Auth::id())->count();
    $sales= Sale::where('user_id',Auth::id())->get();
    $total_products=0;
    foreach ($sales as $sale) {
     echo $sale->id;
    $products= Sale::where('sale_id',$sale->id)->get();
    foreach ($products as $product) {
$total_products+=$product->product_quantity;
    }
    }

    return view('customer/customerarea',compact('total_sale','total_products'));
  }
}
