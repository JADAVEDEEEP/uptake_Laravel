<!-- resources/views/products/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle"> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Product List
        </h2>
        <a href="{{ route('product.create') }}" class="bg-slate-700 text-xl2 rounded-md text-white px-5 py-3">Add Product</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Product Name</th>
                                <th class="px-4 py-2 border">Price</th>
                                <th class="px-4 py-2 border">Image</th>
                                <th class="px-4 py-2 border">Actions</th>
                            </tr>
                                {{-- <th class="px-4 py-2 border">Category</th> --}}
                                
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $product->Product_id }}</td>
                                    <td class="px-4 py-2 border">{{ $product->Product_name }}</td>
                                    <td class="px-4 py-2 border">{{ $product->Price }}</td>
                                    <td class="px-4 py-2 border">{{ $product->product_image}}</td>
                                    {{-- <td class="px-4 py-2 border"> --}}
                                        <!-- Check if category exists and display the category name -->
                                        {{-- {{ $product->category ? $product->category->category_name : 'No Category' }} --}}
                                    </td>
                                    <td class="px-4 py-2 border">
                                        <a href="{{ route('product.edit', $product->Product_id) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md">Edit</a>
                                        <form action="{{ route('product.destroy', $product->Product_id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
