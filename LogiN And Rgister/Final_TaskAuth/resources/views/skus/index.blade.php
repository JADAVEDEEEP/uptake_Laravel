<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                SKU List
            </h2>
            @can('view-skus')
                <a href="{{ route('skus.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm">
                    Add SKU
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <table class="w-full border-collapse border border-gray-200 rounded-lg">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr class="text-left">
                                <th class="px-4 py-3 border">SKU Code</th>
                                <th class="px-4 py-3 border">Product</th>
                                <th class="px-4 py-3 border">Size</th>
                                <th class="px-4 py-3 border">Color</th>
                                <th class="px-4 py-3 border">Quantity</th>
                                <th class="px-4 py-3 border">Price</th>
                                <th class="px-4 py-3 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($skus as $sku)
                                <tr class="border-b hover:bg-gray-50 transition">
                                    <td class="px-4 py-3 border">{{ $sku->SKUCode }}</td>
                                    <td class="px-4 py-3 border">{{ $sku->products ? $sku->products->Product_name : 'N/A' }}</td>
                                    <td class="px-4 py-3 border">{{ $sku->size ? $sku->size->Size_name : 'N/A' }}</td>
                                    <td class="px-4 py-3 border">{{ $sku->colors ? $sku->colors->Color_name : 'N/A' }}</td>
                                    <td class="px-4 py-3 border">{{ $sku->Quantity }}</td>
                                    <td class="px-4 py-3 border">${{ number_format($sku->Price, 2) }}</td>
                                    <td class="px-4 py-3 border">
                                        @can('edit-skus')
                                            <div class="flex gap-2">
                                                <a href="{{ route('skus.edit', $sku->SKUID) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm px-3 py-2 rounded-md">
                                                    Edit
                                                </a>
                                                <form action="{{ route('skus.destroy', $sku->SKUID) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this SKU?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-2 rounded-md">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($skus->isEmpty())
                        <p class="text-center text-gray-500 py-4">No SKUs found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
