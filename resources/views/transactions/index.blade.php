@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">Transaction List</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-left">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Paid Amount</th>
                                        <th>Balance</th>
                                        <th>Payment Method</th>
                                        <th>User ID</th>
                                        <th>Transaction date</th>
                                        <th>Transaction Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $key => $transaction)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $transaction->order_id }}</td>
                                            <td>{{ number_format($transaction->paid_amount, 2) }}</td>
                                            <td>{{ number_format($transaction->balance, 2) }}</td>
                                            <td>{{ $transaction->payment_method }}</td>
                                            <td>{{ $transaction->user_id}}</td>
                                            <td>{{ $transaction->transac_date}}</td>
                                            <td>{{ $transaction->transac_amount}}</td>
                                        </tr>
                                    @endforeach
                                    {{$transactions->links('pagination::bootstrap-5')}}
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
