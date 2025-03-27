<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New SKU
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('skus.store') }}" method="POST">
                        @csrf
                        <label for="SKUCode" class="font-medium text-lg">SKU Code</label>
                        <div class="my-3">
                            <input type="text" name="SKUCode" value="{{ old('SKUCode') }}" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Enter SKU Code">
                            @error('SKUCode')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <label for="Price" class="font-medium text-lg">Price</label>
                        <div class="my-3">
                            <input type="text" name="Price" value="{{ old('Price') }}" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Enter Price">
                            @error('Price')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
