<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center py-4 px-6 bg-white shadow-md rounded-md">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Color List') }}
            </h2>
            @can('create-colors')
                <a href="{{ route('color.create') }}" class="bg-green-700 text-white px-5 py-2 rounded-md hover:bg-green-600 transition">
                    Add Color
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <table class="min-w-full table-auto border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-6 border">ID</th>
                            <th class="py-3 px-6 border">Name</th>
                            <th class="py-3 px-6 border">Created At</th>
                            <th class="py-3 px-6 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($color as $color)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-3">{{ $color->Color_id }}</td>
                                <td class="px-6 py-3">{{ $color->Color_name }}</td>
                                <td class="px-6 py-3">{{ $color->created_at->format('d M, Y') }}</td>
                                <td class="px-6 py-3 space-x-2">
                                    @can('edit-colors')
                                        <a href="{{ route('color.edit', $color->Color_id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-400 transition">
                                            Edit
                                        </a>
                                    @endcan
                                    
                                    @can('delete-colors')
                                        <form action="{{ route('color.destroy', $color->Color_id) }}" method="POST" class="inline">
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
