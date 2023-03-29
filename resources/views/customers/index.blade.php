@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">Add Customer</h4>
                        <a href="" style="float: right" class="btn btn-dark" data-toggle="modal" data-target="#Addcustomer"><i class="fa fa-plus"></i> Add New Customer</a>
                    </div>
                        <div class="card-body">
                            <table class="table table-bordered table-left">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($customers as $key => $customer)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $customer->customer_name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Editcustomer{{ $customer->id }}"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#Deletecustomer{{ $customer->id }}"><i class="fa fa-trash"></i> Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    

                                    <!-- Edit Modal -->
                                    <div class="modal right fade" id="Editcustomer{{ $customer->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Edit Customer</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            
                                            </div>
                                            <div class="modal-body">
                                                    <form action="{{ route('customers.update',$customer->id) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="">Name</label>
                                                            <input type="text" class="form-control" value="{{ $customer->customer_name }}" name="customer_name" id="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="email" class="form-control" value="{{ $customer->email }}" name="email" id="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Address</label>
                                                            <input type="text" class="form-control" value="{{ $customer->address }}" name="address" id="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Phone</label>
                                                            <input type="text" class="form-control" value="{{ $customer->phone }}" name="phone" id="">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-warning btn-block">Update customer</button>
                                                        </div>
                                                    </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Delete Modal -->
                                    <div class="modal right fade" id="Deletecustomer{{ $customer->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Delete Customer</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            
                                            </div>
                                            <div class="modal-body">
                                                    <form action="{{ route('customers.destroy',$customer->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <p>Are you sure to delete {{$customer->name}} ?</p>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                                {{$customers->links('pagination::bootstrap-5')}}
                                </tbody>
                                
                            </table>
                        </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header"><h4>Search Customer</h4></div>
                        <div class="card-body">

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal create new customer -->
<!-- Add Modal -->
<div class="modal right fade" id="Addcustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Add Customer</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="{{ route('customers.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="customer_name" id="">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" id="">
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="address" id="">
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" class="form-control" name="phone" id="">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-block">Save Customer</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>



<style>
    .modal.right .modal-dialog {
        top: 0;
        right: 0;
        margin-right: 20vh;
        /* position: absolute; */

    }
    .modal.fade:not(.in).right .modal-dialog {
        -webkit-transform: translate3d(25%, 0, 0);
        transform: translate3d(25%,0,0);
    }
    select {
        appearance: auto;
        border-radius: 0;
        }
    select::-ms-expand{
        display: block;
    }
</style>
@endsection
