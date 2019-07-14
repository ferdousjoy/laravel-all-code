@extends('layouts.dashboard')
@section('content')

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Your statistics</h1>
  </div>

  <div class="col-lg-6">
<h1>Total purchase</h1><br>
{{$total_sale}}
  </div>
  <div class="col-lg-6">
<h1>Total product</h1><br>
{{$total_products}}
  </div>
  </div>
@endsection
