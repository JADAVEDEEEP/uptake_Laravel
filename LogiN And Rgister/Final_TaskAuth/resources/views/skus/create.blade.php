<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center">Add New SKU</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden p-8">
                <form action="{{ route('skus.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="SKUCode" class="block font-medium text-lg mb-2">SKU Code</label>
                        <input type="text" id="SKUCode" name="SKUCode" value="{{ old('SKUCode') }}" 
                               class="w-full border-gray-300 shadow-sm rounded-lg p-3 focus:ring-2 focus:ring-blue-500" 
                               placeholder="Enter SKU Code">
                        @error('SKUCode') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="Product_id" class="block font-medium text-lg mb-2">Product</label>
                        <select id="Product_id" name="Product_id" 
                                class="w-full border-gray-300 shadow-sm rounded-lg p-3 focus:ring-2 focus:ring-blue-500">
                            <option value="">Select Product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->Product_id }}" {{ old('Product_id') == $product->Product_id ? 'selected' : '' }}>
                                    {{ $product->Product_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="Size_id" class="block font-medium text-lg mb-2">Size</label>
                        <select id="Size_id" name="Size_id" 
                                class="w-full border-gray-300 shadow-sm rounded-lg p-3 focus:ring-2 focus:ring-blue-500">
                            <option value="">Select Size</option>
                            @foreach($sizes as $size)
                                <option value="{{ $size->Size_id }}" {{ old('Size_id') == $size->Size_id ? 'selected' : '' }}>
                                    {{ $size->Size_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="Color_id" class="block font-medium text-lg mb-2">Color</label>
                        <select id="Color_id" name="Color_id" 
                                class="w-full border-gray-300 shadow-sm rounded-lg p-3 focus:ring-2 focus:ring-blue-500">
                            <option value="">Select Color</option>
                            @foreach($colors as $color)
                                <option value="{{ $color->Color_id }}" {{ old('Color_id') == $color->Color_id ? 'selected' : '' }}>
                                    {{ $color->Color_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="Quantity" class="block font-medium text-lg mb-2">Quantity</label>
                        <input type="number" id="Quantity" name="Quantity" value="{{ old('Quantity') }}" 
                               class="w-full border-gray-300 shadow-sm rounded-lg p-3 focus:ring-2 focus:ring-blue-500" min="1">
                    </div>

                    <div class="flex justify-center">
                        <button class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold shadow-md hover:bg-blue-700 transition" type="submit">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
