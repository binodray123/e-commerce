<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($id)
    {
        if (auth()->user())
        // add to cart
        {
            $data = [
                'user_id' => auth()->user()->id,
                'product_id' => $id,
            ];
            Cart::create($data);
            return redirect()->route('products')->with('success', 'Product has been added to the cart successfully.');
        } else
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
            ->where(['user_id' => auth()->user()->id])
            ->paginate(3);
        return view('product.cartList', compact('cartItems'));
    }

    public function destroy($id)
    {
        Cart::destroy($id);
        return redirect()->back()->with('success', 'Your cart item deleted successfully.');
    }

    public function orderNow()
    {
        // Fetching the products of total amount of user from cart list
        $userId = ['user_id' => auth()->user()->id];
        $total = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $userId)
            ->sum('products.price');
        return view('product.orderNow', ['total' => $total]);
    }

    public function orderPlace(Request $request)
    {
        $userId = ['user_id' => auth()->user()->id]; //checking the user session
        $allCart = Cart::where('user_id', $userId)->get(); // fetching the cart data
        // saving the data into order table and also removing the data from cart table
        foreach ($allCart as $cart) {
            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = "pending";
            $order->payment_method = $request->payment_method;
            $order->payment_status = "pending";
            $order->address = $request->address;
            $order->save();
            Cart::where('user_id', $userId)->delete();
        }
        return redirect()->route('products');
    }

    public function myOrders()
    {
        $orders = Order::with('product')
            ->where(['user_id' => auth()->user()->id])
            ->get();
        return view('product.myOrder', compact('orders'));
    }
}
