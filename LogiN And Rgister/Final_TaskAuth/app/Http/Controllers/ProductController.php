<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = products::with('category')->latest()->paginate(25);

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
            'Product_name' => ['required', 'string', 'max:255'],
            'Price' => ['required', 'numeric'],
            'Category_id' => ['required', 'exists:categories,Category_id'], 
            'product_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Image validation
        ]);
    
    
        $imagePath = null;
        if ($request->hasFile('product_image')) {
            $imagePath = $request->file('product_image')->store('images', 'public'); // Saves in storage/app/public/images
        }
    
       
        $product = products::create([
            'Product_name' => $request->Product_name,
            'Price' => $request->Price,
            'Category_id' => $request->Category_id,
            'product_image' => $imagePath, 
        ]);
    
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
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'Price' => 'required|numeric',
        ]);
    
        $product = products::findorFail($Product_id);
    
        if ($request->hasFile('product_image')) {
           
            if ($product->product_image) {
                Storage::delete($product->product_image);
            }
    
           
            $imagePath = $request->file('product_image')->store('products', 'public');
            $product->product_image = $imagePath;
        }
    
       
        $product->Product_name = $request->Product_name;
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