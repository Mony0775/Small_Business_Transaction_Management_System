<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Order_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $orders = Order::all();
        return view('orders.index', compact('products', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $orders = Order::all();
        return view('orders.index', compact('products', 'orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        DB::Transaction(function() use ($request) {
            
        // order models 
            $orders = new Order;
            $orders->name = $request->customer_name;
            $orders->phone = $request->customer_phone;
            $orders->save();
            $order_id = $orders->id;
        // order detail
        for ($product_id = 0; $product_id < count($request->product_id); $product_id++){
            $order_details = new Order_Detail;
            $order_details->order_id = $order_id;
            $order_details->product_id = $request->product_id[$product_id];
            $order_details->unitprice = $request->price[$product_id];
            $order_details->quantity = $request->quantity[$product_id];
            $order_details->discount = $request->discount[$product_id];
            $order_details->amount = $request->total_amount[$product_id];
            $order_details->save();
        }
        // transaction
        $transactions = new Transaction;
        $transactions->order_id = $order_id;
        $transactions->user_id = auth()->user()->id;
        $transactions->balance = $request->balance;
        $transactions->paid_amount = $request->paid_amount;
        $transactions->payment_method = $request->payment_method;
        $transactions->transac_amount = $order_details->amount;
        $transactions->transac_date = date('Y-m-d');
        $transactions->save();

        $products = Product::all();
        $order_details = Order_Detail::where('order_id', $order_id)->get();
        $orderedBy = Order::where('id', $order_id)->get();

         return view('orders.index', 
         [
            'products' => $products,
            'order_details' => $order_details,
            'customer_orders' => $orderedBy
         ]);
        });

        return "Added";




    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
