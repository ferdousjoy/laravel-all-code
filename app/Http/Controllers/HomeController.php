<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Coupon;
use Carbon\Carbon;
use Image;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('checkusertype');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
     function addbanner()
    {
     return view('banner/view');

    }
    function bannerinsert(Request $request)
   {
     if($request->hasFile('banner_image')){
       $ban_image=$request->file('banner_image');
       $filename= str_random(30).'.'.$ban_image->getClientOriginalExtension();
       Image::make($ban_image)->resize(1920, 600)->save(base_path('public/banner_img/'.$filename),60);
       Banner::insert([
         'heading'=>$request->heading,
         'sub_heading'=>$request->sub_heading,
         'details'=>$request->details,
         'banner_image'=>$request->banner_image,
         'banner_image'=>'banner_img/'.$filename,
         'created_at'=>Carbon::now(),
       ]);
       return back()->with('success','Banner Insert Successfully');


     }else{
         return back();
     }
   }
function addcoupon()
{
    $coupons=Coupon::where('status',1)->get();
return view('coupon/view',compact('coupons'));
}
function couponinsert(Request $request)
{
  if(Coupon::where('status',1)->where('percentage',$request->percentage)->exists()){
echo"parba na";
  }else{
$info=  Coupon::create([
  'coupon'=>'',
  'percentage'=> $request->percentage
  ]);
  $coupon=str_random(4).$info->id;
$info-> coupon=$coupon;
$info->save();
return back();
}
}





}
