<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::paginate(5);
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customers = new Customer;
        $customers->customer_name = $request->customer_name;
        $customers->phone = $request->phone;
        $customers->address = $request->address;
        $customers->email = $request->email;
        $customers->save();
        if($customers){
            return redirect()->back()->with('customer create successfully');
        }else{
            return redirect()->back()->with('customer create failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $customers = Customer::find($id);
        // $customers->suppler_name = $request->customer_name;
        // $customers->email = $request->email;
        // $customers->phone = $request->phone;
        // $customers->address = $request->address;
        // $customers->save();
        if(!$customers){
            return back()->with('Error','customer not found');
        }
        $customers->update($request->all());
        return back()->with('Success','customer update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customers = Customer::find($id);
        if(!$customers){
            return back()->with('Error','customer not found');
        }
        $customers->delete();
        return back()->with('Success','customer delete successfully');
    }
}
