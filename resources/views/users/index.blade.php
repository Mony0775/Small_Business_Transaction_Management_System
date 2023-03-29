@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">Add Employee</h4>
                        <a href="" style="float: right" class="btn btn-dark" data-toggle="modal" data-target="#AddUser"><i class="fa fa-plus"></i> Add New Employee</a>
                    </div>
                        <div class="card-body">
                            <table class="table table-bordered table-left">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td> @if ($user->is_admin == 1) Admin
                                            @else Cashier
                                        @endif   
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EditUser{{ $user->id }}"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#DeleteUser{{ $user->id }}"><i class="fa fa-trash"></i> Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    

                                    <!-- Edit Modal -->
                                    <div class="modal right fade" id="EditUser{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Edit User</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            
                                            </div>
                                            <div class="modal-body">
                                                    <form action="{{ route('users.update',$user->id) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="">Name</label>
                                                            <input type="text" class="form-control" value="{{ $user->name }}" name="name" id="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="email" class="form-control" value="{{ $user->email }}" name="email" id="">
                                                        </div>
                                                        <!-- <div class="form-group">
                                                            <label for="">Phone</label>
                                                            <input type="text" class="form-control" value="{{ $user->name }}" name="phone" id="">
                                                        </div> -->
                                                        <div class="form-group">
                                                            <label for="">Password</label>
                                                            <input type="password" class="form-control" readonly value="{{ $user->password }}" name="password" id="">
                                                        </div>
                                                        <!-- <div class="form-group">
                                                            <label for="">Confirm Password</label>
                                                            <input type="password" class="form-control" value="{{ $user->password }}" name="confirm_password" id="">
                                                        </div> -->
                                                        <div class="form-group">
                                                            <label for="">Role</label>
                                                            <select class="form-control" value="{{ $user->is_admin }}" name="is_admin" id="">
                                                                <option value="1" @if ($user->is_admin == 1)
                                                                    selected
                                                                @endif>Admin</option>
                                                                <option value="2" @if ($user->is_admin == 2)
                                                                    selected
                                                                @endif>Cashier</option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-warning btn-block">Update User</button>
                                                        </div>
                                                    </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Delete Modal -->
                                    <div class="modal right fade" id="DeleteUser{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Delete User</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            
                                            </div>
                                            <div class="modal-body">
                                                    <form action="{{ route('users.destroy',$user->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <p>Are you sure to delete {{$user->name}} ?</p>
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
                                {{$users->links('pagination::bootstrap-5')}}
                                </tbody>
                                
                            </table>
                        </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header"><h4>Search Employee</h4></div>
                        <div class="card-body">

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal create new user -->
<!-- Add Modal -->
<div class="modal right fade" id="AddUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Add Employee</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" id="">
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" class="form-control" name="phone" id="">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" id="">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" id="">
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select class="form-control" name="is_admin" id="">
                        <option value="1">Admin</option>
                        <option value="2">Employee</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-block">Save User</button>
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
