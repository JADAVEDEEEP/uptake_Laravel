<?php

namespace App\Http\Controllers;

use App\Models\Colors;
use App\Models\Products;
use App\Models\Size;
use App\Models\SKU;
use Illuminate\Http\Request;

class SKUController extends Controller
{
    public function index()
    {
        $skus = SKU::with('products', 'size', 'colors')->get();
        return view('skus.index', compact('skus'));
    }

    public function create()
    {
        $products = Products::all();
        $sizes = Size::all();
        $colors = Colors::all();
        return view('skus.create', compact('products', 'sizes', 'colors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Product_id' => 'required|integer',
            'Size_id' => 'nullable|integer',
            'Color_id' => 'nullable|integer',
            'Quantity' => 'required|integer|min:1',
            'SKUCode' => 'required|string|unique:skus,SKUCode',
        ]);

       
        $pricePerItem = 100;
        $calculatedPrice = $request->Quantity * $pricePerItem;

        SKU::create([
            'Product_id' => $request->Product_id,
            'Size_id' => $request->Size_id,
            'Color_id' => $request->Color_id,
            'Quantity' => $request->Quantity,
            'SKUCode' => $request->SKUCode,
            'Price' => $calculatedPrice,
        ]);

        return redirect()->route('skus.index')->with('success', 'SKU created successfully!');
    }

    public function edit($id)
    {
        $sku = SKU::findOrFail($id);
        $products = Products::all();
        $sizes = Size::all();
        $colors = Colors::all();
        return view('skus.edit', compact('sku', 'products', 'sizes', 'colors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Product_id' => 'required|integer',
            'Size_id' => 'nullable|integer',
            'Color_id' => 'nullable|integer',
            'Quantity' => 'required|integer|min:1',
            'SKUCode' => 'required|string|unique:skus,SKUCode,' . $id . ',SKUID',
        ]);

        $sku = SKU::findOrFail($id);

    
        $pricePerItem = 100;
        $calculatedPrice = $request->Quantity * $pricePerItem;

        $sku->update([
            'Product_id' => $request->Product_id,
            'Size_id' => $request->Size_id,
            'Color_id' => $request->Color_id,
            'Quantity' => $request->Quantity,
            'SKUCode' => $request->SKUCode,
            'Price' => $calculatedPrice,
        ]);

        return redirect()->route('skus.index')->with('success', 'SKU updated successfully!');
    }

    public function destroy($id)
    {
        $sku = SKU::findOrFail($id);
        $sku->delete();

        return redirect()->route('skus.index')->with('success', 'SKU deleted successfully!');
    }
}