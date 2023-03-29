@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">Order Product</h4>
                        <a href="" style="float: right" class="btn btn-dark" data-toggle="modal" data-target="#Addproduct"><i class="fa fa-plus"></i> Add New Product</a>
                    </div>
                        <div class="card-body">
                            <table class="table table-bordered table-left">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Dis (%)</th>
                                        <th>Total</th>
                                        <th><a href="" class="btn btn-sm btn-success add_more rounded-circle"><i class="fa fa-plus"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody class="addMoreProduct">
                                    <tr> 
                                        @foreach ($products as $key => $product)
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <select name="product_id[]" id="product_id" class="form-control product_id">
                                                <option value="">Select Item</option>
                                               
                                                    <option data-price="{{ $product->price}}" value="{{ $product->id }}">{{ $product->product_name }}</option>
                                                
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="quantity[]" value="" id="quantity" class="form-control quantity">
                                        </td>
                                        <td>
                                            <input type="number" value="{{ $product->price }}" name="price[]" id="price" class="form-control price">
                                        </td>
                                        <td>
                                            <input type="number" value="0" name="discount[]" id="discount" class="form-control discount">
                                        </td>
                                        <td>
                                            <input type="number" name="total_amount[]" value = "{{ $product->price *   }}" id="total" class="form-control total_amount">
                                        </td>
                                        <td><a href="" class="btn btn-sm btn-danger delete"><i class="fa fa-times"></i></a></td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Total <b class="total"> 0.00 </b></h4>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
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

