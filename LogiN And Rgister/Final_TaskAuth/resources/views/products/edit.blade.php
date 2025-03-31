<!-- resources/views/products/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between"> 
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Product
            </h2>
            <a href="{{ route('product.index') }}" class="bg-slate-700 text-xl2 rounded-md text-white px-5 py-3">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('product.update', $product->Product_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Product Name -->
                        <label for="Product_name" class="font-medium text-lg">Product Name</label>
                        <div class="my-3">
                            <input type="text" name="Product_name" value="{{ old('Product_name', $product->Product_name) }}" 
                                class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Enter Product Name">
                            @error('Product_name')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price -->
                        <label for="Price" class="font-medium text-lg">Price</label>
                        <div class="my-3">
                            <input type="number" name="Price" value="{{ old('Price', $product->Price) }}" 
                                class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Enter Price">
                            @error('Price')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Product Image -->
                        <label for="Product_image" class="font-medium text-lg">Product Image</label>
                        <div class="my-3">
                            <input type="file" name="product_image" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                            @error('product_image')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Update Button -->
                        <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
