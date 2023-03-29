@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">Add Product</h4>
                        <a href="" style="float: right" class="btn btn-dark" data-toggle="modal" data-target="#Addproduct"><i class="fa fa-plus"></i> Add New Product</a>
                    </div>
                        <div class="card-body">
                            <table class="table table-bordered table-left">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Brand</th>
                                        <th>Price</th>
                                        <th>quantity</th>
                                        <th>Description</th>
                                        <th>Alert Stock</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->brand }}</td>
                                        <td>{{ number_format($product->price, 2) }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->description}}</td>
                                        <td>
                                            @if ($product->alert_stock >= $product->quantity) 
                                                <span class="badge badge-danger"> Low Stock > {{ $product->alert_stock }}</span>
                                            @else <span class="badge badge-success">{{ $product->alert_stock }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Editproduct{{ $product->id }}"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#Deleteproduct{{ $product->id }}"><i class="fa fa-trash"></i> Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    

                                    <!-- Edit Modal -->
                                    <div class="modal right fade" id="Editproduct{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Edit product</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{ route('products.update',$product->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="">Product Name</label>
                                                    <input type="text" class="form-control" value="{{ $product->product_name }}" name="product_name" id="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Brand</label>
                                                    <input type="text" class="form-control" value="{{ $product->brand }}" name="brand" id="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Price</label>
                                                    <input type="number" class="form-control" value="{{ $product->price }}" name="price" id="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Quantity</label>
                                                    <input type="number" class="form-control" value="{{ $product->quantity }}" name="quantity" id="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Alert Stock</label>
                                                    <input type="number" class="form-control" value="{{ $product->alert_stock }}" name="alert_stock" id="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Description</label>
                                                    <textarea class="form-control" name="description" value="{{ $product->description }}" id="" cols="30" rows="2">{{ $product->description }}</textarea>
                                                </div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-primary btn-block">Save product</button>
                                                </div>
                                            </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Delete Modal -->
                                    <div class="modal right fade" id="Deleteproduct{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Delete product</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            
                                            </div>
                                            <div class="modal-body">
                                                    <form action="{{ route('products.destroy',$product->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <p>Are you sure to delete <span class="text-danger">{{$product->product_name}}</span> ?</p>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-info" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                @endforeach
                                {{$products->links('pagination::bootstrap-5')}}
                                </tbody>
                            
                            </table>
                        </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header"><h4>Search product</h4></div>
                        <div class="card-body">

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal create new product -->
<!-- Add Modal -->
<div class="modal right fade" id="Addproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Add product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="{{ route('products.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" name="product_name" id="">
                </div>
                <div class="form-group">
                    <label for="">Brand</label>
                    <input type="text" class="form-control" name="brand" id="">
                </div>

                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" class="form-control" name="price" id="">
                </div>
                <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="number" class="form-control" name="quantity" id="">
                </div>
                <div class="form-group">
                    <label for="">Alert Stock</label>
                    <input type="number" class="form-control" name="alert_stock" id="">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description" id="" cols="30" rows="2"></textarea>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary btn-block">Save product</button>
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
</style>
@endsection
