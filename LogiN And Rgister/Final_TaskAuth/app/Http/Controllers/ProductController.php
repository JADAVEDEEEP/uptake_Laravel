<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use App\Models\products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = products::latest()->paginate(25);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Product_name' => 'required|string|max:255',
            'Product_image' => 'nullable|image',
            'Price' => 'required|numeric',
        ]);

        $product = new products();
        $product->Product_name = $request->Product_name;
        $product->Product_image = $request->file('Product_image') ? $request->file('Product_image')->store('products') : null;
        $product->Price = $request->Price;
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product created successfully!');
    }

    public function edit($Product_id)
    {
        $product = products::find($Product_id);
  
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $Product_id)
    {
        $request->validate([
            'Product_name' => 'required|string|max:255',
            'Product_image' => 'nullable|image',
            'Price' => 'required|numeric',
        ]);

        $product = products::findOrFail($Product_id);
        $product->Product_name = $request->Product_name;
        $product->Product_image = $request->file('Product_image') ? $request->file('Product_image')->store('products') : $product->Product_image;
        $product->Price = $request->Price;
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }

    public function destroy($Product_id)
    {
        $product = products::find($Product_id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
    }
}