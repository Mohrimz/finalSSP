<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ManageOrdersController extends Controller
{
    /**
     * Display a listing of orders with all relevant columns.
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(10);

        return view('admin.manage_orders', compact('orders'));
    }

    /**
     * Show the form for editing the specified order.
     */
    public function edit(Order $order)
    {
        return view('admin.edit_order', compact('order'));
    }

    /**
     * Update the specified order in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'user_name'     => 'required|string|max:255',
            'user_address'  => 'required|string|max:255',
            'product_id'    => 'required|integer',
            'product_name'  => 'required|string|max:255',
            'quantity'      => 'required|integer',
            'total_price'   => 'required|numeric',
            'order_date'    => 'required|date',
        ]);

        $order->update($validated);

        return redirect()->route('admin.manage.orders.edit', $order->id)
                         ->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.manage.orders')
                         ->with('success', 'Order deleted successfully.');
    }
}
