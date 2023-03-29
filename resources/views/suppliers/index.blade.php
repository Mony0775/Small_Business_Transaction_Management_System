@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">Add Supplier</h4>
                        <a href="" style="float: right" class="btn btn-dark" data-toggle="modal" data-target="#Addsupplier"><i class="fa fa-plus"></i> Add New Supplier</a>
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
                                @foreach ($suppliers as $key => $supplier)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $supplier->supplier_name }}</td>
                                        <td>{{ $supplier->email }}</td>
                                        <td>{{ $supplier->address }}</td>
                                        <td>{{ $supplier->phone }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Editsupplier{{ $supplier->id }}"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#Deletesupplier{{ $supplier->id }}"><i class="fa fa-trash"></i> Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    

                                    <!-- Edit Modal -->
                                    <div class="modal right fade" id="Editsupplier{{ $supplier->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Edit supplier</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            
                                            </div>
                                            <div class="modal-body">
                                                    <form action="{{ route('suppliers.update',$supplier->id) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="">Name</label>
                                                            <input type="text" class="form-control" value="{{ $supplier->supplier_name }}" name="supplier_name" id="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="email" class="form-control" value="{{ $supplier->email }}" name="email" id="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Address</label>
                                                            <input type="text" class="form-control" value="{{ $supplier->address }}" name="address" id="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Phone</label>
                                                            <input type="text" class="form-control" value="{{ $supplier->phone }}" name="phone" id="">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-warning btn-block">Update supplier</button>
                                                        </div>
                                                    </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Delete Modal -->
                                    <div class="modal right fade" id="Deletesupplier{{ $supplier->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Delete supplier</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            
                                            </div>
                                            <div class="modal-body">
                                                    <form action="{{ route('suppliers.destroy',$supplier->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <p>Are you sure to delete {{$supplier->name}} ?</p>
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
                                {{$suppliers->links('pagination::bootstrap-5')}}
                                </tbody>
                                
                            </table>
                        </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header"><h4>Search Supplier</h4></div>
                        <div class="card-body">

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal create new supplier -->
<!-- Add Modal -->
<div class="modal right fade" id="Addsupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Add Supplier</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="{{ route('suppliers.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="supplier_name" id="">
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
                    <button class="btn btn-primary btn-block">Save supplier</button>
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
