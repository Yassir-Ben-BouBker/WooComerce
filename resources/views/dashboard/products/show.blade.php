@extends('layouts.dashboard')

@section('content')

<div class="row" style="margin-top: 5rem">
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{url('/dashboard/products')}}">Products</a></li>
            </ol> -->
        </div>
    </div> <!-- end row -->
</div>
        <div class="card" style="width: 30rem; display:inline-block;">
        <div class="card-body">
            <h5 class="card-title">Product Id</h5><p class="card-text">
                {{$product->id}}
            </p>
        </div>
        </div>
        <div class="card" style="width: 30rem; display:inline-block;">
        <div class="card-body">
            <h5 class="card-title">Regular Price</h5><p class="card-text">
                {{$product->regular_price}}
            </p>
        </div>
        </div>
        <div class="card" style="width: 30rem; display:inline-block;">
        <div class="card-body">
            <h5 class="card-title">On Sale</h5><p class="card-text">
                @if($product->on_sale) yes @else no @endif
            </p>
        </div>
        </div>
        <div class="card" style="width: 30rem; display:inline-block;">
        <div class="card-body">
            <h5 class="card-title">Category</h5><p class="card-text">
                @foreach($product->categories as $category)
                    <span> {{$category->name}}</span>
                @endforeach
            </p>
        </div>
        </div>
        <div class="card" style="width: 60rem; display:inline-block;">
        <div class="card-body">
            <h5 class="card-title">Product Description</h5><p class="card-text">
                {{$product->description}}
            </p>
        </div>
        </div>
        <div class="card" style="width: 60rem; display:inline-block;">
        <div class="card-body">
            <h5 class="card-title">Product Short Description</h5><p class="card-text">
                {{$product->short_description}}
            </p>
        </div>
        </div>
        
</div>


@endsection