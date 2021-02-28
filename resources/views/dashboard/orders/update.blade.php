@extends('layouts.dashboard')

@section('content')

<div class="container"  style="margin-top: 5rem">
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <form action="{{url('/dashboard/orders/update')}}" method="post">
                    @csrf

                <input type="hidden" name="id" value="{{$order->id}}">

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select name="status"  class="form-control">
                            <option value="pending">Pending payment</option>
                            <option value="processing">Processing</option>
                            <option value="on-hold">On hold</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                            <option value="refunded">Refunded</option>
                            <option value="failed">Failed</option>
                        </select>
                    </div>
                </div>

                <div>
                    <button class="btn btn-primary" type="submit">submit</button>
                </div>

                </form>
                
                
                
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->    
</div>

@endsection