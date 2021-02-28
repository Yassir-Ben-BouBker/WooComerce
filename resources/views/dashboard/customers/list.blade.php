@extends('layouts.dashboard')

@section('content')

        <div class="container-fluid">
        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                </div>
                                <!-- <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{url('/dashboard/customers')}}">customers</a></li>
                                    </ol>
                                </div> -->
                            </div> <!-- end row -->
                        </div>
        <div class="row">
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Our Customers</h4>
                                <span class="col-sm-auto d-flex justify-content-end  mt-3">
                            <a class="btn btn-falcon-success" href={{url("/dashboard/customers/excel")}}>Exporting</i></a>
                        </span>
                                <div class="table-responsive">
                                    <table id="table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Email</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($list_customers as $customer)
                                                <tr>
                                                    <th scope="row">{{$customer->id}}</th>
                                                    <td>{{$customer->email}}</td>
                                                    <td>{{$customer->first_name}} {{$customer->last_name}} </td>
                                                    <td>{{$customer->username}} </td>
                                                    <td>
                                                    <div class="row">
                                                    <div class="d-flex p-3 bg-secondary text-white">
                                                        <div class="p-2"><a class="btn btn-primary" href="{{url('/dashboard/customers/show/'.$customer->id.'')}}">Customer details</a></div>
                                                        <div class="p-2"><a class="btn btn-primary offset-1" href="{{url('/dashboard/customers/update/'.$customer->id.'')}}">Edit Customer</a></div>
                                                        <div class="p-2">
                                                        <form class="offset-1" action="{{url('/dashboard/customers/delete')}}" method="post">
                                                        @csrf{{method_field('DELETE')}}
                                                            <button class="btn btn-danger" type="submit" name="id" value="{{$customer->id}}">Delete Customer</button>
                                                        </form>
                                                        </div>
                                                    </div>
                                                        
                                                        
                                                        
                                                        


                                                    
                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
        </div>

@endsection