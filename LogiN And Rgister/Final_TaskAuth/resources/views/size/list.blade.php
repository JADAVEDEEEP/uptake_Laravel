<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center py-4 px-6 bg-white shadow-md rounded-md">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Size List') }}
            </h2>
            @can('create size')
                <a href="{{ route('size.create') }}" class="bg-green-700 text-white px-5 py-2 rounded-md hover:bg-green-600 transition">
                    Add Size
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                @if(session('success'))
                    <div class="bg-green-200 border-l-4 border-green-600 p-4 mb-3 rounded-md shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="bg-red-200 border-l-4 border-red-600 p-4 mb-3 rounded-md shadow-sm">
                        {{ session('error') }}
                    </div>
                @endif
                
                <table class="w-full border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-6 border">ID</th>
                            <th class="py-3 px-6 border">Name</th>
                            <th class="py-3 px-6 border">Created At</th>
                            <th class="py-3 px-6 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($size as $sizes)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-6">{{ $sizes->Size_id }}</td>
                                <td class="py-3 px-6">{{ $sizes->Size_name }}</td>
                                <td class="py-3 px-6">{{ $sizes->created_at->format('d M, Y') }}</td>
                                <td class="py-3 px-6 flex justify-center space-x-2">
                                    @can('edit size')
                                        <a href="{{ route('size.edit', $sizes->Size_id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-400 transition">
                                            Edit
                                        </a>
                                    @endcan
                                    @can('delete size')
                                        <form action="{{ route('size.destroy', $sizes->Size_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this size?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-400 transition">
                                                Delete
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>