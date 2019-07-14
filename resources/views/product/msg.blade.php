@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> <h1> View All Product-{{ App\Product::count() }}</h1></div>

                <div class="card-body">
                   <table class="table table-borders">
<thead>
<th>SL</th>
  <th>category name</th>
  <th>Product availity</th>
  <th>Product name</th>
  <th>Product Quantity</th>
  <th>alert Quantity</th>
  <th>product price</th>
  <th> Created_at</th>
  <th> photo</th>
  <th> Last updated</th>
  <th> Action</th>

</thead>
@php
  $count=1;
@endphp
@foreach($products as $product)
<tr>
   <td>{{$count++ }}</td>
  <td>{{$product->get_category_name->category_name}}</td>
  <td>
    @if($product->alert_quantity>=($product->product_quantity))
<span style="background:red; padding:10px; color:#fff;"> product is near to unavailable</span>
@else
<span style="background:green; padding:10px; color:#fff;">product avialable</span>
    @endif

  </td>
  <td>{{$product->product_name}}</td>
  <td>{{$product->product_quantity}}</td>
  <td>{{$product->alert_quantity}}</td>
  <td>{{$product->product_price}}</td>
  <td>{{ $product->created_at}}</td>
  <td> <img  width="50" src="{{asset('testing/'.$product->product_image)}}" >   </td>
  <td>{{ $product->updated_at ? $product->updated_at:"Not Yet"}}</td>
  <td>
    <a href="{{ url('delete/product')}}/{{$product->id}}" class="btn btn-danger">Delete</a>-
    <a href="{{ url('edit/product')}}/{{$product->id}}" class="btn btn-info">Edit</a>

  </td>
  <td>--</td>
</tr>
@endforeach
                   </table>
                    {{ $products->links()}}
                </div>
                @if (session('successdelte'))
                <div class="alert alert-info">
      {{ session('successdelte')}}
                </div>

                @endif

            </div>
        </div>
    </div>
{{-- deleted message --}}

@if ($deleted_products->count() >0)
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header"> <h1> View All Delected Product {{ $deleted_products->count() }} </h1>

              </div>

              <div class="card-body">
                 <table class="table table-borders">
  <thead>

  <th>SL</th>
  <th>Product name</th>
  <th>product price</th>
  <th> Created_at</th>
  <th> Last updated</th>
  <th> Action</th>

  </thead>
  @php
    $count=1;
  @endphp
  @foreach($deleted_products as $deleted_products)
  <tr>
 <td>{{$count++ }}</td>
  <td>{{$deleted_products->product_name}}</td>
  <td>{{$deleted_products->product_price}}</td>
  <td>{{ $deleted_products->created_at}}</td>
  <td>{{ $deleted_products->updated_at ? $deleted_products->updated_at:"Not Yet"}}</td>
  <td>
  <a href="{{ url('restore/product')}}/{{$deleted_products->id}}" class="btn btn-success">Restore</a>


  </td>
  <td>--</td>
  </tr>
  @endforeach
                 </table>
                  {{ $products->links()}}
              </div>
              @if (session('successdelte'))
              <div class="alert alert-info">
    {{ session('successdelte')}}
              </div>

              @endif

          </div>
      </div>
  </div>

@endif














</div>
@endsection
