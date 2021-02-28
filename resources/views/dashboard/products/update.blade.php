@extends('layouts.dashboard')

@section('content')

<div class="container"  style="margin-top: 5rem">
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <form action="{{url('/dashboard/products/update')}}" method="post">
                    @csrf

                <input type="hidden" name="id" value="{{$product->id}}">

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input value="{{$product->name}}" name="name" class="form-control" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Sale Price</label>
                    <div class="col-sm-10">
                        <input value="{{$product->sale_price}}" name="sale_price" class="form-control" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Regular Price</label>
                    <div class="col-sm-10">
                        <input value="{{$product->regular_price}}" name="regular_price" class="form-control" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input value="{{$product->description}}" name="description" class="form-control" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                    <div class="col-sm-10">
                        <input value="{{$product->short_description}}" name="short_description" class="form-control" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit"> update </button>
                </div>

                </form>
                
                
                
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->    
</div>

@endsection