<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  
    public function index()
    {
        $category = categorie::latest()->paginate(25);
        return view('category.index', compact('category'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Category_name' => 'required|string|max:255',
            
        ]);

        $category = new categorie();
        $category->Category_name = $request->Category_name;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Product created successfully!');
    }

    public function edit($Category_id)
    {
        $Category = categorie::find($Category_id);
        $categories = Categorie::all();
        return view('category.edit', compact('Category', 'categories'));
    }

    public function update(Request $request, $Category_id)
    {
        
        $request->validate([
            'Category_name' => 'required|string|max:255',
            'Status' => 'required',
        ]);
    
      
        $Category = categorie::find($Category_id);
        $Category->Category_name = $request->Category_name;
        // $Category->Status = $request->Status;
        $Category->save();
    
        return redirect()->route('category.index')->with('success', 'Product updated successfully!');
    }
    
    public function destroy($Category_id)
    {
        $product = categorie::findOrFail($Category_id);
        $product->delete();

        return redirect()->route('category.index')->with('success', 'Product deleted successfully!');
    }
}
