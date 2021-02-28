@extends('layouts.dashboard')

@section('content')

<div class="container"  style="margin-top: 5rem">
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h4 class="page-title">Order {{$order->id}}</h4>
        </div>
        <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{url('/dashboard/orders')}}">Orders</a></li>
            </ol>
        </div> -->
    </div> <!-- end row -->
</div>
<div class="card m-b-30 card-body">
    <h4 class="card-title font-16 mt-0">Number , ID</h4>
    <p class="card-text">
        {{$order->id}}
    </p>

    <h4 class="card-title font-16 mt-0">Status</h4>
    <p class="card-text">
        {{$order->status}}
    </p>

</div>
</div>

@endsection