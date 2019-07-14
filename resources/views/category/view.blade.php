@extends('layouts.dashboard')
@section('add-category-page')
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
                <div class="card-header"><h2> Add Category</h2></div>
                <div class="card-body">
                 <form action="/category/insert" method="post">
@csrf

 <div class="form-group">
   <label>Category name</label>
   <input type="text" class="form-control" name="category_name" placeholder="Enter Category">

 </div>


 <button type="submit" class="btn btn-primary">Add category</button>
</form><br>


                </div>
            </div>
        </div>
        <div class="col-lg-6">

          <div class="card">
              <div class="card-header"> <h1> View All Category-{{ App\Category::count() }}</h1></div>

              <div class="card-body">
                 <table class="table table-bordered">
<thead>

<th>SL</th>
<th>category name</th>
<th> Created_at</th>
<th> Last updated</th>
<th> Status</th>
<th> Action</th>

</thead>
@php
  $count=1;
@endphp
@foreach($category as $category)
<tr>
<td>{{$count++ }}</td>
<td>{{$category->category_name}}</td>

<td>{{ $category->created_at}}</td>
<td>{{ $category->updated_at ? $category->updated_at:"Not Yet"}}</td>
<td>
  @if ( $category->status==1)
  <span style="color:green; background-color:black; padding:5px;">Active</span>
@else
   <span style="color:red; background-color:black; padding:5px;">Deactive</span>
  @endif
</td>
<td>
   <a href="{{ url('change/status')}}/{{$category->id}}" class="btn btn-sm btn-info">Change Status</a>

</td>
<td>--</td>
</tr>
@endforeach
                 </table>

              </div>


          </div>


@endsection
