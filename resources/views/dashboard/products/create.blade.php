@extends('layouts.dashboard')

@section('content')

<div class="container"  style="margin-top: 5rem">
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <form action="{{url('/dashboard/products/add')}}" method="post">
                    @csrf

                    <h4 class="mt-0 header-title">Product details</h4><br><br>
                

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input name="name" class="form-control" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input name="description" class="form-control" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                    <div class="col-sm-10">
                        <input name="short_description" class="form-control" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Sale Price</label>
                    <div class="col-sm-10">
                        <input name="sale_price" class="form-control" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Regular Price</label>
                    <div class="col-sm-10">
                        <input name="regular_price" class="form-control" type="text">
                    </div>
                </div>

        
                

                <!-- <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="categories">
                            @foreach($list_categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>  
                    </div>
                </div> -->
                <br><br>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"> Add Product </button>
                </div>

                </form>
                

                <form action="{{ url('/dashboard/products/upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                <div class="form-group">
                        <div class="col-md-6">
                            <input class="form-control-file" type="file" name="file" class="form-control " accept=".xlsx,.xls,.csv">
                        </div>
                        <div class="col-md-6 mt-1">
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>
                    </div>

                    </div>
                </form>
                
                
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->    
</div>

@endsection