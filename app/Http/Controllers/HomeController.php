<?php

namespace App\Http\Controllers;

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
}
