<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
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
}
