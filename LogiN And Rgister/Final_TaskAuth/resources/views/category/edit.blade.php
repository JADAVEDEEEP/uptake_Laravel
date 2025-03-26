<!-- resources/views/products/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between"> 
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              Edit Product
            </h2>
            <a href="{{ route('category.index') }}" class="bg-slate-700 text-xl2 rounded-md text-white px-5 py-3">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                            <form action="{{ route('category.update', $category->Category_id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                
                                <label for="Category_name" class="font-medium text-lg">Product Name</label>
                                <div class="my-3">
                                    <input type="text" name="Category_name" value="{{ old('Category_name', $category->Category_name) }}" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Enter Product Name">
                                    @error('Category_name')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
        
                        </div>

                        

                        {{-- <label for="category_id" class="font-medium text-lg">Category</label>
                        <div class="my-3">
                            <select name="Category_id" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->category_id }}" {{ old('Category_id', $product-Category_id) == $category->category ? 'selected' : '' }}>{{ $Category->Category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div> --}}

                        {{-- <label for="Product_image" class="font-medium text-lg">Product Image</label>
                        <div class="my-3">
                            <input type="file" name="Product_image" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                            @error('Product_image')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div> --}}

                        <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
