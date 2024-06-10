<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data' ));
    }

    public function add_category(Request $request)
    {
        $data = new Category();

        $data->category_name = $request->category;

        $data->save();

        return redirect()->back()->with('message', 'Category added successfully');
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category has been deleted successfully.');
    }

    public function add_product(Request $request)
    {
        $data = new Product();
        $data->title = $request->product;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->discount_price = $request->discount_price;
        $data->quantity = $request->qty;
        $data->category = $request->category;
        $data->category = $request->category;

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('products', $imagename);
        $data->image = $imagename;
        $data->save();

        return redirect()->back()->with('message', 'Product has been added successfully.');
    }

    public function view_product()
    {
        $category = Category::all();

        return view('admin.products', compact('category'));
    }

    public function show_products()
    {
        $products = Product::all();

        return view('admin.show_products', compact('products'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Product has been deleted successfully.');
    }

    public function edit_product($id)
    {
        $product = Product::find($id);
        $category = Category::all();

        return view('admin.update_product', compact('product', 'category'));
    }

    public function update_product(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->product;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->quantity = $request->qty;
        $product->category = $request->category;
        // $product->category = $request->category;

        $image = $request->image;

        if($image)
        {
        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('products', $imagename);
        $product->image = $imagename;
        }
        
        $product->save();

        return redirect()->back()->with('message', 'Product has been updated successfully!');
    }

    public function viewOrders()
    {
        $orders = Order::all();
        return view('admin.orders', compact('orders'));
    }
}
