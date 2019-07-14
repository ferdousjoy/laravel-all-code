@extends('layouts.dashboard')
@section('add-coupon-page')
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
  </div>
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h2>percentage</h2></div>
                <div class="card-body">
                 <form action="/coupon/insert" method="post">
@csrf

 <div class="form-group">
   <label>percentage</label>
   <input type="text" class="form-control" name="percentage" placeholder="Enter percentage">

 </div>


 <button type="submit" class="btn btn-primary">Add caupon</button>
</form><br>
<table class="table table-bordered">
<thead>


<th>coupon name</th>
<th> percentage</th>


</thead>

@foreach($coupons as $coupons)
<tr>
  <td>{{ $coupons->coupon}}</td>
  <td>{{ $coupons->percentage}}</td>
</tr>


@endforeach
</table>




@endsection
