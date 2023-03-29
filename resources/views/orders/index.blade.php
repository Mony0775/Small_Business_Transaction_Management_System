@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">Order Product</h4>
                        <a href="" style="float: right" class="btn btn-dark" data-toggle="modal" data-target="#Addproduct"><i class="fa fa-plus"></i> Add New Product</a>
                    </div>
                    <form action="{{ route('orders.store') }}" method="post">
                        @csrf
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
                                        <th><a href="" class="btn btn-sm btn-success add_more"><i class="fa fa-plus"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody class="addMoreProduct">
                                    <tr> 
                                        <td>1</td>
                                        <td>
                                            <select name="product_id[]" id="product_id" class="form-control product_id">
                                                <option value="">----Select Item</option>
                                                @foreach ($products as $product)
                                                    <option data-price="{{ $product->price}}" value="{{ $product->id }}">{{ $product->product_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="quantity[]" id="quantity" class="form-control quantity">
                                        </td>
                                        <td>
                                            <input type="number" readonly name="price[]" id="price" class="form-control price">
                                        </td>
                                        <td>
                                            <input type="number" value="0" name="discount[]" id="discount" class="form-control discount">
                                        </td>
                                        <td>
                                            <input type="number" readonly name="total_amount[]" id="total" class="form-control total_amount">
                                        </td>
                                        <td><a href="" class="btn btn-sm btn-danger delete"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Total <b class="total"> 0.00 </b></h4>
                    </div>
                    <div class="card-body">
                        <div class="panel">
                            <div class="row">
                                <table class="table table-striped">
                                    <tr>
                                        <td>
                                            <label for="">Customer Name</label>
                                            <input type="text" name="customer_name" id="" class="form-control">
                                        </td>
                                        <td>
                                            <label for="">Customer Phone</label>
                                            <input type="number" name="customer_phone" id="" class="form-control">
                                            
                                        </td>
                                    </tr>
                                </table>
                                <td>
                                    Payment Method <br/>
                                    <span class="radio-item">
                                        <input type="radio" name="payment_method" id="payment_method" class="true" value="Cash" checked="checked">
                                        <label for="payment_method"><i class="fa fa-money-bill text-success"></i> Cash</label>
                                        <input type="radio" name="payment_method" id="payment_method" class="true" value="bank transfer" checked="checked">
                                        <label for="payment_method"><i class="fa fa-university text-danger"></i> Bank Transfer</label>
                                        <input type="radio" name="payment_method" id="payment_method" class="true" value="credit card" checked="checked">
                                        <label for="payment_method"><i class="fa fa-credit-card text-info"></i> Credit Card</label>
                                    </span>
                                </td><br/>
                                <td>
                                    Payment <input type="number" name="paid_amount" id="paid_amount" class="form-control">
                                </td>
                                <td>
                                    Returning Change <input type="number" readonly name="balance" id="balance" class="form-control">
                                </td>
                                <td>
                                    <button class="btn-primary btn-lg btn-block mt-3">Save</button>
                                </td>
                                <td>
                                    <button class="btn-danger btn-lg btn-block mt-2">Calculate</button>
                                </td>
                                <td>
                                    <a href="" class="text-center text-danger mt-3"><i class="fa fa-sign-out-alt"></i>Logout</a>
                                </td>
                                

                                <!-- <div class="form-group">
                                    
                                </div>
                                <div class="form-group">
                                    
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
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
hi

<div class="modal">
    <div id="print">
        <div id="invoice-POS">
                    <!-- Print section -->
            <div id="print_content">
                <center id="top">
                    <div class="logo">
                        Agohgo
                    </div>
                    <div class="info">

                    </div>
                    <h2>
                        POS Ltd
                    </h2>
                </center>


            </div>
            <div class="mid">
                <div class="info">
                    <h2>
                        Contact Us
                    </h2>
                    <p>
                        Address: Prek Thmey
                        Email: mony2gmail.com
                        Phone: 069 444 653
                    </p>
                </div>
            </div>
            <!-- End of reciept -->
            <div class="bot">
                <div id="table">
                    <table>
                        <tr class="tabletittle">
                            <td class="item"><h2>Item</h2></td>
                            <td class="Hours"><h2>Quantity</h2></td>
                            <td class="Rate"><h2>Unity</h2></td>
                            <td class="Rate"><h2>Discount</h2></td>
                            <td class="Rate"><h2>Sub Total</h2></td>
                        </tr>
                        <tr class="service">
                            <td class="tableitem"> <p class="itemtext">Mango</p></td>
                            <td class="tableitem"><p class="itemtext">20</p></td>
                            <td class="tableitem"><p class="itemtext">$5</p></td>
                            <td class="tableitem"><p class="itemtext">0</p></td>
                            <td class="tableitem"><p class="itemtext">100</p></td>
                        </tr>
                        <tr class="tabletittle">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="Rate"><p class="itemtext">Tax</p></td>
                            <td class="Payment"><p class="itemtext">$100</p></td>
                        </tr>
                        <tr class="tabletittle">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="Rate"><p class="itemtext">Total</p></td>
                            <td class="Payment"><p class="itemtext">$100</p></td>
                        </tr>
                    
                    </table>
                    <div class="legalcopy">
                        <p class="legal">
                            <strong>** Thanks you for visiting ****</strong><br>
                            The good which are subject to tax, price include
                        </p>
                    </div>
                    <div class="serial-number">
                        Serial: <span class="serial">12457897586998</span>
                        <span>24/7/2020 &nbsp; &nbsp; 00:45 </span>
                        
                    </div>
                </div>
            </div>
            </div>

            <style>
                #invoice-POS{
                    box-shadow: 0 0 1in -0.25in rgb(0, 0, 0.5);
                    padding: 2mm;
                    margin: 0 auto;
                    width: 58mm;
                    background: #ffff;
                }
                #invoice-POS ::selection{
                    background: #f315f3;
                    color: #ffff;
                }
                #invoice-POS ::-moz-selection{
                    background: #410941;
                    color: #ffff;
                }
                #invoice-POS h1{
                    font-size: 1.5em;
                    color: #222;
                }
                #invoice-POS h2{
                    font-size: 0.5em;
                }
                #invoice-POS h3{
                    font-size: 1.2rem;
                    font-weight: 300;
                    line-height: 2rem;
                }
                #invoice-POS p{
                    font-size: 0.7rem;
                    line-height: 2rem;
                    color: #666;
                }
                #invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot{
                    border-bottom: 1px solid #eee;
                }
                #invoice-POS #top{
                    min-height: 100px;

                }
                #invoice-POS #mid{
                    min-height: 80px;
                    
                }
                #invoice-POS #bot{
                    min-height: 50px;
                    
                }
                #invoice-POS #top .logo{
                    height: 60px;
                    width: 60px;
                    background-image: url() no-repeat;
                    background-size: 60px 60px;
                    border-radius: 50px;
                }
                #invoice-POS #top .logo{
                    height: 60px;
                    width: 60px;
                    background-image: url() no-repeat;
                    background-size: 60px 60px;
                    border-radius: 50px;
                }
                #invoice-POS .info{
                    display: block;
                    margin-left: 0;
                    text-align: center;
                }
                #invoice-POS .title{
                    float: right;
                }
                #invoice-POS .title p{
                    text-align: right;
                }
                #invoice-POS table{
                    width: 100%;
                    border-collapse: collapse;
                }
                #invoice-POS .tabletitle{
                    font-size: 0,5em;
                    background: #eee;
                }
                #invoice-POS .service{
                    border-bottom: 1px solid #eee;
                }
                #invoice-POS .item{
                    width: 24mm;
                }
                #invoice-POS .itemtext{
                    font-size: 0.5em;
                }
                #invoice-POS #legalcopy{
                    margin-top: 5mm;
                    text-align: center;
                }
                .serial-number{
                    margin-top: 5mm;
                    margin-bottom: 2mm;
                    text-align: center;
                    font-size: 12px;
                }
                .serial{
                    font-size: 10px !important;
                }
            </style>
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
    .radio-item input[type="radio"]{
        width: 20px;
        height: 20px;
        margin: 0 5px 0 5px;
        padding: 0;
        cursor: pointer;
        background:-color: rgb(25, 100, 0);
        background-image: radial-gradient(ellipse at top left, rgb(255, 255, 255) 0%,
        rgb(240, 250, 220) 0%, rgb(225, 250, 100) 5%, rgb(25, 100, 0) 100%);
    }
    .radio-item label{
        display: inline-block;
        margin: 0;
        padding: 0;
        line-height:25px;
        height:25px;
        cursor: pointer;
    }
    .radio-item input[type="radio"]::before{
        position: relative;
        margin: 4px -25px -4px 0;
        display: inline-block;
        visibility: visible;
        width: 12px;
        height: 12px;
        border-radius: 10px;
        background: radial-gradient(ellipse at top left, rgba(255, 255, 255) 0%,
        rgba(250, 250, 250) 5%, rgba(230, 230, 230) 95%, rgba(255, 255, 255) 100%);
        content="";
        cursor: pointer;
    }
    .radio-item input[type="radio"]:checked:after{
        position: relative;
        top: 0;
        left: 9px;
        display: inline-block;
        visibility: visible;
        width: 20px;
        height: 20px;
        border-radius: 6px;
        background: radial-gradient(ellipse at top left, rgb(255, 255, 255) 0%,
        rgb(240, 250, 220) 0%, rgb(225, 250, 100) 5%, rgb(25, 100, 0) 100%);
        cursor: pointer;
        content=""
    }
    .radio-item input[type="radio"].false:checked:after{
        background: radial-gradient(ellipse at top left, rgba(255, 255, 255) 0%,
        rgba(250, 250, 250) 5%, rgba(230, 230, 230) 95%, rgba(255, 255, 255) 100%);
    }
    .radio-item input[type="radio"].true:checked:after{
        background: radial-gradient(ellipse at top left, rgba(255, 255, 255) 0%,
        rgba(250, 250, 250) 5%, rgba(230, 230, 230) 95%, rgba(255, 255, 255) 100%);
    }

</style>
@endsection

@section('script')
<script type="text/javascript">
        $('.add_more').on('click', function(e){
            e.preventDefault();
            var product = $('.product_id').html();
            var numberofrow = ($('.addMoreProduct tr').length - 0) + 1;
            var tr = '<tr><td class"no"">' + numberofrow + '</td>' + 
                    '<td><select class="form-control product_id" name="product_id[]">' + product +' </select></td>' +
                    '<td><input type="number" name="quantity[]" class="form-control quantity"></td>'+
                    '<td><input type="number" readonly name="price[]" class="form-control price"></td>'+
                    '<td><input type="number" value="0" name="discount[]" class="form-control discount"></td>'+
                    '<td><input type="number" readonly name="total_amount[]" class="form-control total_amount"></td>'+
                    '<td><a href="#" class="btn btn-danger btn-sm delete"><i class="fa fa-times"></i></a></td>';
            $('.addMoreProduct').append(tr);
        });
        $('.addMoreProduct').delegate('.delete', 'click', function() {
            $(this).parent().parent().remove()
        });
        function TotalAmount(){
            var total = 0;
            $('.total_amount').each(function(i,e){
                var amount = $(this).val() - 0;
                total += amount
            });
            $('.total').html(total);

        }
        $('.addMoreProduct').delegate('.product_id', 'change', function() {
            var tr = $(this).parent().parent();
            var price = tr.find('.product_id option:selected').attr('data-price');
            tr.find('.price').val(price);
            var quantity = tr.find('.quantity').val() - 0;
            var discount = tr.find('.discount').val() - 0;
            var price = tr.find('.price').val() - 0;
            var total_amount = (quantity * price) - ((quantity *discount) / 100);
            tr.find('.total_amount').val(total_amount);
            TotalAmount();
        });
        $('.addMoreProduct').delegate('.quantity', 'discount', 'keyup', function(){
            var tr = $(this).parent().parent();
            var quantity = tr.find('.quantity').val() - 0;
            var discount = tr.find('.discount').val() - 0;
            var price = tr.find('.price').val() - 0;
            var total_amount = (quantity * price) - ((quantity *discount) / 100);
            tr.find('.total_amount').val(total_amount);
            TotalAmount();
        });
        $('.quantity').keyup(function(){
            var tr = $(this).parent().parent();
            var quantity = tr.find('.quantity').val() - 0;
            var discount = tr.find('.discount').val() - 0;
            var price = tr.find('.price').val() - 0;
            var total_amount = (quantity * price) - ((quantity *discount) / 100);
            tr.find('.total_amount').val(total_amount);
            TotalAmount();
        });

        $('.discount').keyup(function(){
            var tr = $(this).parent().parent();
            var quantity = tr.find('.quantity').val() - 0;
            var discount = tr.find('.discount').val() - 0;
            var price = tr.find('.price').val() - 0;
            var total_amount = (quantity * price) - ((quantity *discount) / 100);
            tr.find('.total_amount').val(total_amount);
            TotalAmount();
        });

        $('#paid_amount').keyup(function(){
            var total = $('.total').html();
            var paid_amount = $(this).val();
            var tot = paid_amount - total;
            $('#balance').val(tot);
        })
</script>
@endsection
