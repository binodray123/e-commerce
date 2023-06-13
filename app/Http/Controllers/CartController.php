<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


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
        // Get the data of respective user from database
         $userId = ['user_id' => auth()->user()->id];
        //  $userId= Auth::user()->id;
        return Cart::where('user_id', $userId)->count();
    }

    public function cartList()
    {
        $cartItems = Cart::with('product')
        ->where(['user_id'=>auth()->user()->id])
        ->paginate(3);
        return view('product.cartList', compact('cartItems'));
    }
}
