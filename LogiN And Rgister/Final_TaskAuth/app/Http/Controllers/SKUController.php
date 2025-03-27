<?php

namespace App\Http\Controllers;

use App\Models\SKU;
use Illuminate\Http\Request;

class SKUController extends Controller
{
    public function index()
    {
        $skus = SKU::all();  // You can paginate if needed: SKU::paginate(10);
        return view('skus.index', compact('skus'));
    }

    // Show the form for creating a new SKU
    public function create()
    {
        return view('skus.create');
    }

    // Store a newly created SKU in the database
    public function store(Request $request)
    {
        $request->validate([
            'Product_id' => 'required|integer',
            'Size_id' => 'nullable|integer',
            'Color_id' => 'nullable|integer',
            'Price' => 'nullable|numeric',
            'Quantity' => 'nullable|integer',
            'SKUCode' => 'required|string|unique:skus,SKUCode',
        ]);

        SKU::create($request->all());

        return redirect()->route('skus.index')->with('success', 'SKU created successfully!');
    }

    // Show the form for editing the specified SKU
    public function edit($id)
    {
        $sku = SKU::findOrFail($id);
        return view('skus.edit', compact('sku'));
    }

    // Update the specified SKU in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'Product_id' => 'required|integer',
            'Size_id' => 'nullable|integer',
            'Color_id' => 'nullable|integer',
            'Price' => 'nullable|numeric',
            'Quantity' => 'nullable|integer',
            'SKUCode' => 'required|string|unique:skus,SKUCode,' . $id . ',SKUID', // Ignore SKUCode for current record
        ]);

        $sku = SKU::findOrFail($id);
        $sku->update($request->all());

        return redirect()->route('skus.index')->with('success', 'SKU updated successfully!');
    }

    // Remove the specified SKU from the database
    public function destroy($id)
    {
        $sku = SKU::findOrFail($id);
        $sku->delete();

        return redirect()->route('skus.index')->with('success', 'SKU deleted successfully!');
    }
}
