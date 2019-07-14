@extends('layouts.dashboard')
@section('add-banner-page')
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
</div>

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Dashboard</h1>
  </div>
  </div>
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h2> Add Banner</h2></div>
                <div class="card-body">
                  @if (session('success'))
                 <div class="alert alert-info">
{{ session('success')}}
                 </div>

                 @endif
   <form action="/banner/insert" method="post" enctype="multipart/form-data">
@csrf

 <div class="form-group">
   <label>heading</label>
   <input type="text" class="form-control" name="heading">
 </div>

 <div class="form-group">
   <label>sub_heading</label>
   <input type="text" class="form-control" name="sub_heading">
 </div>
 <div class="form-group">
   <label>details</label>
   <input type="text" class="form-control" name="details">
 </div>
 <div class="form-group">
   <label>banner_image</label>
   <input type="file" class="form-control" name="banner_image">
 </div>

 <button type="submit" class="btn btn-primary">Add banner</button>
</form>




@endsection
