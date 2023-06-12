<?php

namespace App\Http\Controllers;

use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart($id)
    {
        if(auth()->user())
        // add to cart
        {
            $data = [
                'user_id' => auth()->user()->id,
                'product_id' => $id,
            ];
            Cart::create($data);
            return redirect()->route('products')->with('success','Product has been added to the cart successfully.');
        }
        else
        // redirect to login page
        {
            return redirect()->route('login');
        }

    }
    public static function cartItem()
    {
        $userId = ['user_id' => auth()->user()->id];
        return Cart::where('user_id', $userId)->count();
    }
}
