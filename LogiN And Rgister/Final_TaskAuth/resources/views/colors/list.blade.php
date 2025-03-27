<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center py-4 px-6 bg-white shadow-md rounded-md">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Colors') }}
            </h2>
            @can('create colors')
                <a href="{{ route('color.create') }}" class="bg-slate-700 text-white text-lg rounded-md py-2 px-5 hover:bg-slate-600 transition duration-200">
                    Create
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Success/Error messages (optional for later use) --}}
            {{-- 
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(session::has('success'))
                    <div class="bg-green-200 border-green-600 p-4 mb-3 rounded-sm shadow-sm">
                        {{ session::get('success') }}
                    </div>
                @endif
                @if(session::has('error'))
                    <div class="bg-red-200 border-red-600 p-4 mb-3 rounded-sm shadow-sm">
                        {{ session::get('error') }}
                    </div>
                @endif
            </div>
            --}}

            <!-- Table for displaying colors -->
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-100 border-b">
                        @can('view colors')
                            <tr>
                                <th class="py-3 px-6 text-gray-700">ID</th>
                                <th class="py-3 px-6 text-gray-700">Name</th>
                                <th class="py-3 px-6 text-gray-700">Created At</th>
                                <th class="py-3 px-6 text-gray-700">Actions</th>
                            </tr>
                        @endcan
                    </thead>
                    <tbody class="bg-white text-center">
                        @foreach($color as $color)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-3">{{ $color->Color_id }}</td>
                                <td class="px-6 py-3">{{ $color->Color_name }}</td>
                                <td class="px-6 py-3">{{ $color->created_at }}</td>
                                <td class="px-6 py-3">
                                    @can('edit colors')
                                        <a href="{{ route('color.edit', $color->Color_id) }}" class="bg-slate-700 text-white px-4 py-2 rounded-md hover:bg-slate-600 transition duration-200">
                                            Edit
                                        </a>
                                    @endcan
                                    
                                    @can('delete colors')
                                        <form action="{{ route('color.destroy', $color->Color_id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-400 transition duration-200 ml-2">
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