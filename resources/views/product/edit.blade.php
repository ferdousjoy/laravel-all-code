@extends('layouts.dashboard')
@section('add-page')
active
@endsection
@section('content')
  <div class="row">
   <ol class="breadcrumb">
     <li><a href="{{ url('/home') }}">
       <em class="fa fa-home"></em>
     </a></li>
     <li><a href="{{ url('/add/product') }}">
       <em class="fa fa-home"></em>
     add product</a></li>
     <li class="active">{{ $product->product_name}}</li>
   </ol>
 </div><!--/.row-->

 <div class="row">
   <div class="col-lg-12">
     <h1 class="page-header">Dashboard</h1>
   </div>
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card">
                <div class="card-head"><h2> Edit Products</h2></div>

                <div class="card-body">

                  @if (session('success'))
                  <div class="alert alert-info">
{{ session('success')}}
                  </div>

                  @endif

                 <form action="/update/product" method="post">

@csrf

 <div class="form-group">
   <label>Product name</label>
   <input type="hidden" name="product_id" value="{{$product->id}}">
   <input type="text" class="form-control" name="product_name" placeholder="Product name" value="{{ $product->product_name}}" >
   @if ($errors->has('product_name'))
          <strong style="color:red">{{ $errors->first('product_name') }}</strong>
   @endif
 </div>
 <div class="form-group">
   <label>Product price</label>
   <input type="text" class="form-control" name="product_price" placeholder="Product price" value="{{ $product->product_price}}">
   @if ($errors->has('product_price'))

           <strong style="color:red" >{{ $errors->first('product_price') }}</strong>

   @endif
 </div>

 <button type="submit" class="btn btn-primary">edit Price</button>
</form><br>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
