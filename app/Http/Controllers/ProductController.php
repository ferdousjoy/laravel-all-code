<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
  function __construct()
  {
     $this->middleware('auth');
       $this->middleware('verified');
       $this->middleware('checkusertype');
  }
  function addcategory(){
  $category = Category::all();
   return view('category/view',compact('category'));
  }
  function change($category_id){

   $category_info = Category::find($category_id);
if( $category_info->status==1){
 $category_info->status=2;
}else{
 $category_info->status=1;
}
$category_info->save();
return back();


  }

  function categoryinsert(Request $request){

     Category::insert([
      "category_name"=>$request->category_name,
      "created_at"=>Carbon::now()
    ]);
   return back()->with('success','category Insert Successfully');
  }
    function addproduct(){

$categories = Category::where('status',1)->get();
     return view('product/view',compact('categories'));
    }
    function productinsert(Request $request){
      $request->validate([
        'product_name'=>'required',
        'product_price'=>'required|integer',
      ],
    [
      'product_name.required'=>'Give product name',
      'product_price.required'=>'Give product price',
      'product_price.integer'=>'Give product price will be anumber',
    ]);


if($request->hasFile('product_image')){
  // $new_file_location = $request->file('product_image')->store('product_image_folder');
  $product_image=$request->file('product_image');
  $filename= str_random(30).'.'.$product_image->getClientOriginalExtension();
  Image::make($product_image)->resize(320, 240)->save(base_path('public/testing/'.$filename),50);
  Product::insert([
    'category_id'=>$request->category_id,
    'product_name'=>$request->product_name,
    'product_details'=>$request->product_details,
    'product_price'=>$request->product_price,
    'product_quantity'=>$request->product_quantity,
    'alert_quantity'=>$request->alert_quantity,
    'product_image'=>'testing/'.$filename,
    'created_at'=>Carbon::now(),
  ]);
  return back()->with('success','Product Insert Successfully');


}else{
    return back();
}


    } 

function allmsg(){
  $products =  Product::orderBy('id','desc')->simplePaginate(7);
  $deleted_products=Product::onlyTrashed()->get();
  return view('product/msg',compact('products','deleted_products'));
}
function productdelete($product_id){
 Product::find($product_id)->delete();
 return back()->with('successdelte','Product delete Successfully');
}

function productedit($product_id){
 $product = Product::findOrFail($product_id);
  return view('product/edit',compact('product'));
}
function productupdate(Request $request){
 Product::findOrFail($request->product_id)->update([
   'product_name'=>$request->product_name,
   'product_price'=>$request->product_price
 ]);
 return back();
}

function productrestore($product_id){

 Product::onlyTrashed()->findOrFail($product_id)->restore();
 return back();
}



}
