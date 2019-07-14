<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Customer;
use App\Sale;
use App\Order;
use App\Banner;
use App\Category;
use App\Country;
use App\Coupon;
use App\Cart as Joy;
use Carbon\Carbon;
Use Mail;
use App\Mail\Orderconfirm;



class FrontendController extends Controller
{
  function index()
    {
    $products=  Product::orderBy('updated_at','desc')->get();
    $banners= Banner::all();
    $categories = Category::all();
     return view('index',compact('products','banners','categories'));
    }
    function addcart($product_id)
      {
        $ip_address=$_SERVER['REMOTE_ADDR'];
        if(Joy::where('product_id',$product_id)->where('ip_address',$ip_address)->exists()){
          Joy::where('product_id',$product_id)->where('ip_address',$ip_address)->increment('product_quantity');
        }else{
          Joy::insert([
          'product_id'=>$product_id,
          'ip_address'=>$_SERVER['REMOTE_ADDR'],
          'created_at'=>Carbon::now(),

      ]);

        }

  return back();
      }
      function cart()
      {
            $ip_address=$_SERVER['REMOTE_ADDR'];
       $cart_products=Joy::where('ip_address',$ip_address)->get();
       return view('cart/view',compact('cart_products'));
      }

      function deletecart($cart_id)
      {
   Joy::find($cart_id)->delete();
   return redirect('cart');

      }

      function updatecart(Request $request)
      {

if(isset($request->proceed_btn)){
  $countries= Country::all();
    $cart_subtotal= $request->cart_subtotal;
    $ship= $request->ship;
  $discount= $request->discount;
    $Grand_total= $request->Grand_total;
    $coupon_amount= $request->coupon_amount;
    $after_coupon_amount = $request->after_coupon_amount ;
 return view('checkout/view',compact('countries','cart_subtotal','ship','discount','ship','Grand_total','coupon_amount','after_coupon_amount'));
}
if(isset($request->update_cart)){
  foreach ($request->atik as $card_id=> $product_quantity) {
  Joy::find( $card_id)->update([
    'product_quantity'=>$product_quantity
  ]);
  }
   $coupon_by_user= $request->coupon_by_user;
  if(Coupon::where('status',1)->where('coupon', $coupon_by_user)->exists()){
  $coupon_amount=Coupon::where('coupon', $coupon_by_user)->first()->percentage;
  }

  $ip_address=$_SERVER['REMOTE_ADDR'];
$cart_products=  Joy::where('ip_address',$ip_address)->get();
return view('cart/view',compact('cart_products','coupon_by_user','coupon_amount'));

}
 }
 function finalcheckout(Request $request)
 {
   if(User::where('email',$request->customer_email)->exists()){
     $user_id=User::where('email',$request->customer_email)->first()->id;
   }else{
    $user_info= User::create([
     'name'=>$request->customer_name,
     'email'=>$request->customer_email,
     'password'=>bcrypt($request->customer_password),

]);
   $user_id=$user_info->id;
 }
Customer::insert([
  'user_id'=>$user_id,
  'customer_mobile'=>$request->customer_mobile,
  'customer_country'=>$request->customer_country,
  'customer_city'=>$request->customer_city,
  'customer_order_note'=>$request->customer_order_note,
    'created_at'=>Carbon::now(),

]);


$sale_id=Sale::insertGetId([
  'user_id'=>$user_id,
 'cart_subtotal'=>$request->cart_subtotal,
 'shipping'=>$request->ship,
 'discount'=>$request->discount,
 'grand_total'=>$request->Grand_total,
 'coupon_discount'=>$request->coupon_discount,
 'after_coupon_discount'=>$request->after_coupon_discount,
 'payment_type'=>$request->payment_type,
'created_at'=>Carbon::now(),
]);
$ip_address=$_SERVER['REMOTE_ADDR'];
$cart_items=Joy::where('ip_address', $ip_address)->get();
foreach ($cart_items as $cart_item) {
  Order::insert([
  'sale_id'=>$sale_id,
  'product_id'=>$cart_item->product_id,
  'product_quantity'=>$cart_item->product_quantity,
  'ip_address'=>$ip_address,
  'created_at'=>Carbon::now(),
  ]);
Joy::find($cart_item->id)->delete();
Product::find($cart_item->product_id)->decrement('product_quantity',$cart_item->product_quantity);
}

Mail::send(new Orderconfirm($sale_id));
return redirect('/cart')->with('status','profile Updated');


 }


 function test()
{
  Mail::send(new Orderconfirm($sale_id));
}
}
