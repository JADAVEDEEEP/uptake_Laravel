<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit SKU
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('skus.update', $sku->SKUID) }}" method="POST">
                        @csrf
                        {{-- @method('POST') --}}
                        <!-- SKU Code -->
                        <label for="SKUCode" class="font-medium text-lg">SKU Code</label>
                        <div class="my-3">
                            <input type="text" name="SKUCode" value="{{ old('SKUCode', $sku->SKUCode) }}" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Enter SKU Code">
                            @error('SKUCode')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Product Dropdown -->
                        <label for="Product_id" class="font-medium text-lg">Product</label>
                        <div class="my-3">
                            <select name="Product_id" class="border-gray-300 shadow-sm w-1/2 rounded-lg" required>
                                @foreach($products as $product)
                                    <option value="{{ $product->Product_id }}" {{ $sku->Product_id == $product->Product_id ? 'selected' : '' }}>
                                        {{ $product->Product_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('Product_id')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Size Dropdown -->
                        <label for="Size_id" class="font-medium text-lg">Size</label>
                        <div class="my-3">
                            <select name="Size_id" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @foreach($sizes as $size)
                                    <option value="{{ $size->Size_id }}" {{ $sku->Size_id == $size->Size_id ? 'selected' : '' }}>
                                        {{ $size->Size_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('Size_id')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Color Dropdown -->
                        <label for="Color_id" class="font-medium text-lg">Color</label>
                        <div class="my-3">
                            <select name="Color_id" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @foreach($colors as $color)
                                    <option value="{{ $color->Color_id }}" {{ $sku->Color_id == $color->Color_id ? 'selected' : '' }}>
                                        {{ $color->Color_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('Color_id')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Quantity -->
                        <label for="Quantity" class="font-medium text-lg">Quantity</label>
                        <div class="my-3">
                            <input type="number" name="Quantity" value="{{ old('Quantity', $sku->Quantity) }}" class="border-gray-300 shadow-sm w-1/2 rounded-lg" min="1" required>
                            @error('Quantity')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price -->
                        {{-- <label for="Price" class="font-medium text-lg">Price</label>
                        <div class="my-3">
                            <input type="text" name="Price" value="{{ old('Price', $sku->Price) }}" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Price" readonly>
                            @error('Price')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div> --}}

                        <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3" type="submit">Update SKU</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>