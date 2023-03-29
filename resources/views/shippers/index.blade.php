@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">Add Shipper</h4>
                        <a href="" style="float: right" class="btn btn-dark" data-toggle="modal" data-target="#Addshipper"><i class="fa fa-plus"></i> Add New Shipper</a>
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
                                @foreach ($shippers as $key => $shipper)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $shipper->shipper_name }}</td>
                                        <td>{{ $shipper->email }}</td>
                                        <td>{{ $shipper->address }}</td>
                                        <td>{{ $shipper->phone }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Editshipper{{ $shipper->id }}"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#Deleteshipper{{ $shipper->id }}"><i class="fa fa-trash"></i> Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    

                                    <!-- Edit Modal -->
                                    <div class="modal right fade" id="Editshipper{{ $shipper->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Edit Shipper</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            
                                            </div>
                                            <div class="modal-body">
                                                    <form action="{{ route('shippers.update',$shipper->id) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="">Name</label>
                                                            <input type="text" class="form-control" value="{{ $shipper->shipper_name }}" name="shipper_name" id="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="email" class="form-control" value="{{ $shipper->email }}" name="email" id="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Address</label>
                                                            <input type="text" class="form-control" value="{{ $shipper->address }}" name="address" id="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Phone</label>
                                                            <input type="text" class="form-control" value="{{ $shipper->phone }}" name="phone" id="">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-warning btn-block">Update shipper</button>
                                                        </div>
                                                    </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Delete Modal -->
                                    <div class="modal right fade" id="Deleteshipper{{ $shipper->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Delete Shipper</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            
                                            </div>
                                            <div class="modal-body">
                                                    <form action="{{ route('shippers.destroy',$shipper->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <p>Are you sure to delete {{$shipper->name}} ?</p>
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
                                {{$shippers->links('pagination::bootstrap-5')}}
                                </tbody>
                                
                            </table>
                        </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header"><h4>Search Shipper</h4></div>
                        <div class="card-body">

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal create new shipper -->
<!-- Add Modal -->
<div class="modal right fade" id="Addshipper" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Add Shipper</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="{{ route('shippers.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="shipper_name" id="">
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
                    <button class="btn btn-primary btn-block">Save Shipper</button>
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
