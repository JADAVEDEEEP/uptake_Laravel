<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle"> 
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              Product List
            </h2>
            @can('create products') 
                
            @endcan
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
                                <th class="px-4 py-2 border">Category Name</th>
                               
                                <th class="px-4 py-2 border">Price</th>
                                <th class="px-4 py-2 border">Image</th>
                                @can('edit products')  
                                    <th class="px-4 py-2 border">Actions</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="px-4 py-2 border text-center">{{ $product->Product_id }}</td>
                                    <td class="px-4 py-2 border text-center">{{ $product->Product_name }}</td>
                                <td class="px-4 py-2 border text-center">
                                        {{ $product->category->Category_name ?? 'N/A' }}
                                    </td>
                                    <td class="px-4 py-2 border text-center">{{ $product->Price }}</td>
                                    <td class="px-4 py-2 border text-center">
                                        @if ($product->product_image)
                                    <img src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image" class="w-16 h-16 object-cover">
                                       @endif
                                    </td>
                                    @can('edit products') 
                                        <td class="px-4 py-2 border text-center">
                                            <a href="{{ route('product.create') }}" class="bg-green-700  rounded-md text-white px-5 py-2">Add Product</a>
                                            <a href="{{ route('product.edit', $product->Product_id) }}" class="bg-yellow-500 text-white px-5 py-2 rounded-md">Edit</a>
                                            <form action="{{ route('product.destroy', $product->Product_id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-5 py-2 rounded-md">Delete</button>
                                            </form>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- <div class="mt-3">
                        {{ $products->links() }}
                        @
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>