@extends('layouts.frontend')
@section('content')

    <!-- Shopping Cart Start -->
    <section id="card">
        <div class="container">
          @if(session('status'))
        <div class="alert alert-success">
          {{session('status')}}
        </div>
        @endif

            <div class="row">
                <div class="col-md-9">
                    <div class="cart-info">
                        <table class="table table-striped table-hover table-bordered">
                            <tbody>
                                <tr>
                                  <th class="tl">Product & Color</th>
                                  <th>Product quantity</th>
                                  <th>Unit Price</th>
                                  <th>Quantity</th>
                                  <th>Total Price</th>
                                  <th>Remove Item</th>
                              </tr>
                                  @php
                                  $cart_subtotal=0;
                                  $ship=15;
                                  $discount=20;
                                  @endphp
                                  <form  action="{{url('update/cart')}}" method="post">
@csrf


@forelse($cart_products as $cart_product)
<tr>


    <td>
        <div class="col-md-12 pl">
            <div class="col-md-3 pl">
                <img src="{{asset($cart_product->get_product_info->product_image)}}" alt="cart1" class="img-responsive">
            </div>
            <div class="col-md-9 pro-info pl text-left">
                <h3> {{ $cart_product->get_product_info->product_name}}</h3>
                <p>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half"></i>
                </p>
                <p>Color: Silver</p>
            </div>
        </div>
    </td>
    <td>{{ $cart_product->get_product_info->product_quantity}}</td>
    <td>{{ $cart_product->get_product_info->product_price}} tk</td>
    <td>
        <div class="quantity">
            <div class="handle-counter" id="handleCounter{{$cart_product->id}}">
                <div class="input">
                    <input type="text" value="{{$cart_product->product_quantity}}" name="atik[{{$cart_product->id}}]">
                </div>
                <div class="click">
                    <a class="counter-plus btn btn-primary">+</a>
                    <a class="counter-minus btn btn-primary">-</a>
                </div>
                <div class="clearfix"></div>
                @php
                $flag=0;
                @endphp
                @if($cart_product->get_product_info->product_quantity < $cart_product->product_quantity)
                High demand!!{{$cart_product->get_product_info->product_quantity}}
                @php
                $flag=1;
                @endphp
                @endif
            </div>
        </div>
    </td>
    <td>
      @php
       $cart_subtotal= $cart_subtotal+ ($cart_product->get_product_info->product_price*$cart_product->product_quantity);
      @endphp
{{ $cart_product->get_product_info->product_price*$cart_product->product_quantity}}
    </td>
    <td><a href="{{url('cart/delete')}}/{{$cart_product->id}}"><i class="fa fa-trash-o"></i></a></td>
</tr>
@empty
<tr>
  <td colspan="5">Nothing to show</td>
  @php
  $flag=0;
  @endphp
</tr>
@endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="cart-total">
                        <h2>Have a coupon?</h2>

                            <div class="input-group">
                              @if(isset($coupon_by_user))
                                <input id="1" class="form-control" type="text" placeholder="type your code" name="coupon_by_user" value="{{$coupon_by_user}}"/>
                                @else
                                  <input id="1" class="form-control" type="text" placeholder="type your code" name="coupon_by_user"/>
                              @endif

                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="submit">Send</button>
                                </span>
                            </div>

                    </div>
                    <div class="total-amount">
                        <ul>
                            <li>
                                <h3>Cart Total</h3>
                            </li>
                            <li><span>Cart Subtotal</span><a href="#">$ {{  $cart_subtotal}}
                  <input type="text" name="cart_subtotal" value="{{$cart_subtotal}}">
                            </a></li>
                            <li><span>(+) Shipping</span><a href="#">${{ $ship}}
    <input type="text" name="ship" value="{{ $ship}}">

                            </a></li>


                            <li><span>(-) Discount</span><a href="#">${{$discount }}

  <input type="text" name="discount" value="{{$discount }}">
                            </a>


                            </li>
                            <li><span>Grand Total</span><a href="#">$ {{ $cart_subtotal+$ship- $discount}}
                        <input type="text" name="Grand_total" value="{{$cart_subtotal+$ship- $discount}}">


                            </a></li>
                            @if(isset( $coupon_amount))

                            @php
                            $grand_total= $cart_subtotal+$ship- $discount;
                            $coupon_discount=($grand_total* $coupon_amount)/100;
                            $after_coupon_amount=$grand_total- $coupon_discount;
                            @endphp
                              <li><span>(-)Coupon Discount</span><a href="#">${{ $coupon_amount }}</a>
                                <input type="text" name="coupon_amount" value="{{$coupon_amount}}"></li>
                              <li><span>(-) After Coupon Discount</span><a href="#">${{$after_coupon_amount }}
                              <input type="text" name="after_coupon_amount" value="{{$after_coupon_amount}}"></li>

                              </a></li>
                              @endif
                        </ul>
                    </div>
                    <div class="proceed">
                        <button name="update_cart" value="update_cart" class="btn btn-sm btn-success updat" type="submit">update cart</button>
                        <button name="proceed_btn" value="proceed_btn" class="btn btn-sm btn-success updat" {{($flag==1)? "disabled":""}} type="submit">proceedt</button>






                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart End -->

@endsection
@section('footer_scripts')
<script>
    $(function($) {
        var options = {
            minimum: 1,
            maximize: 100,
            onChange: valChanged,
            onMinimum: function(e) {
                console.log('reached minimum: ' + e)
            },
            onMaximize: function(e) {
                console.log('reached maximize' + e)
            }
        }
        @foreach($cart_products as $cart_product)
  $('#handleCounter{{$cart_product->id}}').handleCounter(options)
        @endforeach


            maximize: 100
        })
    })

    function valChanged(d) {
        //            console.log(d)
    }

</script>

@endsection
