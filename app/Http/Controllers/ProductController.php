<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::where("stock", ">", 0)->get();

        return view("home.home", compact("products"));
    }
    // * create product
    public function store(Request $request)
    {
        request()->validate([
            "name" => "required",
            "price" => "required",
            "type" => "required",
            "stock" => "required",
        ]);
        Product::create([
            "name" => $request->name,
            "price" => $request->price,
            "type" => $request->type,
            "stock" => $request->stock,
        ]);
        return redirect()->back();
    }
    // *  update a  product
    public function update(Request $request, Product $product)
    {
        request()->validate([
            "name" => "required",
            "price" => "required",
            "type" => "required",
            "stock" => "required",
        ]);
        $product->update([
            "name" => $request->name,
            "price" => $request->price,
            "type" => $request->type,
            "stock" => $request->stock,
        ]);
        return back();
    }
    // * delete product
    public function destroy(Product $product)
    {
        dd($product);
        $product->delete();
        return back();
    }
    // * buy 
    public function buy(Product $product)
    {
        if ($product->stock > 0) {
            $product->decrement("stock");
            return back();
        }
    }
}
