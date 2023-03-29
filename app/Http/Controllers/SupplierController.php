<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use paginate;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::paginate(5);
        return view('suppliers.index', compact('suppliers'));
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
        $suppliers = new Supplier;
        $suppliers->supplier_name = $request->supplier_name;
        $suppliers->phone = $request->phone;
        $suppliers->address = $request->address;
        $suppliers->email = $request->email;
        $suppliers->save();
        if($suppliers){
            return redirect()->back()->with('Supplier create successfully');
        }else{
            return redirect()->back()->with('Supplier create failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $suppliers = Supplier::find($id);
        // $suppliers->suppler_name = $request->supplier_name;
        // $suppliers->email = $request->email;
        // $suppliers->phone = $request->phone;
        // $suppliers->address = $request->address;
        // $suppliers->save();
        if(!$suppliers){
            return back()->with('Error','supplier not found');
        }
        $suppliers->update($request->all());
        return back()->with('Success','supplier update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $suppliers = Supplier::find($id);
        if(!$suppliers){
            return back()->with('Error','supplier not found');
        }
        $suppliers->delete();
        return back()->with('Success','supplier delete successfully');
    }
}
