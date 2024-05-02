<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('home.userpage', compact('products'));
    }

    public function redirect()
    {
        $userType = Auth::user()->usertype;

        if($userType == '1')
        // if(" ")
        {
            return view('admin.home');
        }
        else
        {
            $products = Product::paginate(10);
            return view('home.userpage', compact('products'));
        }
    }

    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_to_cart(Request $request, $id)
    {
        if(Auth::user())
        {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart;

            $cart->user_id = $user->id;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_name = $product->title;

            if($product->discount_price != null)
            {
                $cart->price = $product->discount_price * $request->quantity;
            }
            else
            {
                $cart->price = $product->price * $request->quantity;
            }
            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }

    public function show_cart_items()
    {
        if(auth()->id())
        {
            $userId = auth()->user()->id;
            $cart = Cart::where('user_id', $userId)->get();
            return view('home.showcartitems', compact('cart'));
        } else
        {
            return redirect('login');
        }

    }

    public function removeItem($id)
    {
        $cart = Cart::find($id);

        $cart->delete();
        return redirect()->back();
    }

    public function cashOrder()
    {
        $user = auth()->user();
        $userId = $user->id;
        $cart = Cart::where('user_id', $userId)->get();

        foreach($cart as $cartItem)
        {
            $order = new Order;
            
            $order->name = $cartItem->name;
            $order->email = $cartItem->email;
            $order->phone = $cartItem->phone;
            $order->address = $cartItem->address;
            $order->user_id = $cartItem->user_id;
            $order->product_name = $cartItem->product_name;
            $order->price = $cartItem->price;
            $order->image = $cartItem->image;
            $order->quantity = $cartItem->quantity;
            $order->product_id = $cartItem->product_id;
            $order->payment_status = "Pay On Delivery";
            $order->delivery_status = "Unpaid";

            $order->save();
        }
        return redirect()->back();

    }
}
