@extends('layouts.dashboard')
@section('add-page')
active
@endsection
@section('content')
  <div class="row">
  <ol class="breadcrumb">
    <li><a href="#">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">Dashboard</li>
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
                <div class="card-header"><h2> Add Products</h2></div>

                <div class="card-body">

                  @if (session('success'))
                  <div class="alert alert-info">
{{ session('success')}}
                  </div>

                  @endif

                 <form action="/product/insert" method="post" enctype="multipart/form-data">

@csrf

 <div class="form-group">
   <label>category name</label>
<select class="form-control" name="category_id">
<option value="">--SELECT ONE--</option>
@foreach ($categories as $category)
<option value="{{ $category->id }}">{{ $category->category_name }} </option>
@endforeach

</select>
   <label>Product name</label>
   <input type="text" class="form-control" name="product_name" placeholder="Product name" value={{ old('product_name')}}>
   @if ($errors->has('product_name'))
          <strong style="color:red">{{ $errors->first('product_name') }}</strong>
   @endif
 </div>
 <div class="form-group">
   <label>Product price</label>
   <input type="text" class="form-control" name="product_price" placeholder="Product price" value={{ old('product_price')}}>
   @if ($errors->has('product_price'))
           <strong style="color:red" >{{ $errors->first('product_price') }}</strong>
   @endif
 </div>
 <div class="form-group">
   <label>Product Details</label>
  <textarea name="product_details" placeholder="Alert price" value={{ old('product_details')}} rows="12" cols="80"></textarea>

   @if ($errors->has('product_details'))
           <strong style="color:red" >{{ $errors->first('product_details') }}</strong>
   @endif
 </div>
 <div class="form-group">
   <label>Product quantity</label>
   <input type="number" class="form-control" name="product_quantity" placeholder="Alert price" value={{ old('product_quantity')}}>
   @if ($errors->has('product_quantity'))
           <strong style="color:red" >{{ $errors->first('product_quantity') }}</strong>
   @endif
 </div>


 <div class="form-group">
   <label>alert quantity</label>
   <input type="number" class="form-control" name="alert_quantity" placeholder="Alert price" value={{ old('alert_quantity')}}>
   @if ($errors->has('alert_quantity'))
           <strong style="color:red" >{{ $errors->first('alert_quantity') }}</strong>
   @endif
 </div>

 <div class="form-group">
   <label>Product image</label>
   <input type="file" class="form-control" name="product_image">

 </div>




 <button type="submit" class="btn btn-primary">Add Price</button>
</form><br>
<a href="{{url('all/msg')}}" class="btn btn-info"> View all Meesage</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
