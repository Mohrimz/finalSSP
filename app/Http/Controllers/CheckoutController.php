<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    /**
     * Process the checkout form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming form data.
        $validated = $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'address'      => 'required|string|max:255',
            'city'         => 'required|string|max:255',
            'state'        => 'required|string|max:255',
            'zip'          => 'required|string|max:20',
            'country'      => 'required|string|max:255',
            'card_number'  => 'required|string|max:20',
            'expiry_date'  => 'required|string|max:5',
            'cvv'          => 'required|string|max:4',
            'name_on_card' => 'required|string|max:255',
        ]);

        
        $user_name    = $validated['first_name'] . ' ' . $validated['last_name'];
        $user_address = $validated['address'] . ', ' . $validated['city'] . ', ' . $validated['state'] . ', ' . $validated['zip'] . ', ' . $validated['country'];

        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        foreach ($cart as $product_id => $cart_item) {
            $product_name = $cart_item['name'];
            $quantity     = $cart_item['quantity'];
            $total_price  = $cart_item['price'] * $quantity;

            DB::table('orders')->insert([
                'user_name'    => $user_name,
                'user_address' => $user_address,
                'product_id'   => $product_id,
                'product_name' => $product_name,
                'quantity'     => $quantity,
                'total_price'  => $total_price,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }

        Session::forget('cart');

        Session::flash('order_success', 'Your order has been placed successfully!');

        return redirect()->route('checkout.page')->with('success', 1);
    }
}
