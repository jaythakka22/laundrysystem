<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders= Orders::all(); 
        return view('admindashboard.orders.list')->with('orders', $orders);
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
         // Retrieve the total cost from the request
         $user = auth()->user();
         $order = new Orders;
         $order->user_id = $user->id;
         $order->total_cost = $request->input('totalCost');;  
         $user->orders()->save($order);
         $order->save();
         return back()->with('success', 'Record was added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $orders,string $id)
    {
        $order = Orders::find($id);
        return view('admindashboard.orders.view')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'status' => 'required|string|max:255',   
        ]);
        $order = Orders::find($id);
        $order->status = $request->input('status');
        $order->save();
        session()->flash('status', "Updated Successfully");
        return redirect()->route('orders.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
