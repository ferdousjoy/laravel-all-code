@extends('layouts.frontend')
@section('content')

<section id="checkout">
       <div class="container">
           <div class="row">
               <form action="{{ url('final/checkout')}}" method="post">
                 @csrf
                   <div class="col-md-8">
                       <div class="checkout-input">
                           <div class="">
                               <div class="">
                                   <ul class="nav nav-tabs" role="tablist">
                                       <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">BILLING DETAILS</a></li>
                                       <li><a href="#">|</a></li>
                                       <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Shipping Address</a></li>
                                       <li class="tahsan12"><a href="#">(if there is any different shipping address)</a></li>
                                   </ul>
                                   <!-- Tab panes -->
                                   <div class="tab-content">
                                       <div role="tabpanel" class="tab-pane active" id="home">
                                           <div class="form-group">
                                               <input type="text" class="form-control" id="name" name="customer_name" placeholder="Name*" >
                                           </div>
                                           <div class="form-group col-md-6 pl0">
                                               <input type="text" class="form-control" id="email" name="customer_email" placeholder="Email*" >
                                           </div>
                                           <div class="form-group col-md-6 pr0">
                                               <input type="text" class="form-control" id="mobile" name="customer_mobile" placeholder="Phone*" >
                                           </div>
                                           <div class="form-group">
                                               <select class="form-control" id="country" name="customer_country">
                                                   <option value="">Country*</option>
                                                   @foreach($countries as $country)
                                           <option value="{{ $country->id}}">  {{ $country->name}}</option>
                                                   @endforeach
                                               </select>
                                           </div>
                                           <div class="form-group">
                                               <select class="form-control" name="customer_city">
                                                   <option value="1">Town/City*</option>
                                                   <option value="2">Dhaka</option>
                                                   <option value="3">London</option>
                                                   <option value="4">NewYork</option>
                                                   <option value="5">Barcelona</option>
                                                   <option value="6">Paris</option>
                                                   <option value="7">Roma</option>
                                               </select>
                                           </div>
                                           <div class="form-group">
                                               <input type="password" class="form-control" id="name36" name="customer_password" placeholder="Password*"  >
                                           </div>
                                           
                                           <div class="form-group">
                                               <textarea class="form-control" id="message" placeholder="Order Notes Here" name="customer_order_note" maxlength="140" rows="7"></textarea>
                                           </div>
                                       </div>

                                   </div>

                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-4 totala">
                       <div class="total-amount">
                           <ul>
                               <li>
                                   <h3>Cart Total</h3>
                               </li>
                               <li><span>Cart Subtotal</span><a href="#"> {{$cart_subtotal }}
                                <input type="hidden" name="cart_subtotal" value="{{$cart_subtotal }}">
                               </a></li>
                               <li><span>(+) Shipping</span><a href="#"> {{$ship}}
                    <input type="hidden" name="ship" value="{{$ship}}">
                                </a></li>
                               <li><span>(-) Discount</span><a href="#">   {{ $discount}}
                    <input type="hidden" name="discount" value="{{$discount}}">
                                 </a></li>
                               <li><span>Grand Total</span><a href="#">  {{  $Grand_total}}

  <input type="hidden" name="Grand_total" value="{{ $Grand_total}}">
                               </a></li>

                                 <li><span>(-)Coupon Discount</span><a href="#">${{ $coupon_amount }}
                           <input type="hidden" name="coupon_amount" value="{{ $coupon_amount}}">
                                 </a></li>
                                 <li><span>(-) After Coupon Discount</span><a href="#">${{$after_coupon_amount }}
                           <input type="hidden" name="after_coupon_amount" value="{{$after_coupon_amount}}">
                                 </a></li>

                           </ul>





                       <!-- $coupon_amount
                         $after_coupon_amount -->


                       </div>
                       <div class="payments">
                           <div class="payment-head">
                               <h3>Payments</h3>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="payment_type" value="1" checked>
  <label class="form-check-label"> cash on delivery</label>
  </div>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="payment_type" value="2" checked>
  <label class="form-check-label"> paypal</label>
  </div>

                               <div class="procd">
                                   <button type="submit" class="btn btn-primary">Place Order</button>
                               </div>
                           </div>
                       </div>
                   </div>
               </form>
           </div>
       </div>
   </section>

   <!-- checkout part End -->
   @endsection
   @section('footer_scripts')
   <script>
   $(document).ready(function() {
     $('#country').select2();
 });

   </script>
   @endsection
