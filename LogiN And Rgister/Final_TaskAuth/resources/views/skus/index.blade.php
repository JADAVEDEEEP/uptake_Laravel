<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            SKU List
        </h2>
        <a href="{{ route('skus.create') }}" class="bg-slate-700 text-xl2 rounded-md text-white px-5 py-3">Add SKU</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">SKU Code</th>
                                <th class="px-4 py-2 border">Product ID</th>
                                <th class="px-4 py-2 border">Price</th>
                                <th class="px-4 py-2 border">Quantity</th>
                                <th class="px-4 py-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($skus as $sku)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $sku->SKUCode }}</td>
                                    <td class="px-4 py-2 border">{{ $sku->Product_id }}</td>
                                    <td class="px-4 py-2 border">{{ $sku->Price }}</td>
                                    <td class="px-4 py-2 border">{{ $sku->Quantity }}</td>
                                    <td class="px-4 py-2 border">
                                        <a href="{{ route('skus.edit', $sku->SKUID) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md">Edit</a>
                                        <form action="{{ route('skus.destroy', $sku->SKUID) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
