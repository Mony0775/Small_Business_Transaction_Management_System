<?php

namespace App\Http\Controllers;

use App\Models\Shipper;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shippers = Shipper::paginate(5);
        return view('shippers.index', compact('shippers'));
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
        $shippers = new Shipper;
        $shippers->shipper_name = $request->shipper_name;
        $shippers->phone = $request->phone;
        $shippers->address = $request->address;
        $shippers->email = $request->email;
        $shippers->save();
        if($shippers){
            return redirect()->back()->with('shipper create successfully');
        }else{
            return redirect()->back()->with('shipper create failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipper $shipper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipper $shipper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $shippers = Shipper::find($id);
        // $shippers->suppler_name = $request->shipper_name;
        // $shippers->email = $request->email;
        // $shippers->phone = $request->phone;
        // $shippers->address = $request->address;
        // $shippers->save();
        if(!$shippers){
            return back()->with('Error','shipper not found');
        }
        $shippers->update($request->all());
        return back()->with('Success','shipper update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shippers = Shipper::find($id);
        if(!$shippers){
            return back()->with('Error','shipper not found');
        }
        $shippers->delete();
        return back()->with('Success','shipper delete successfully');
    }
}
