<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
            @can('create users')
                <a href="{{ route('users.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
                    + Create User
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="bg-green-200 text-green-700 p-4 mb-4 rounded-lg shadow">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-200 text-red-700 p-4 mb-4 rounded-lg shadow">
                    {{ session('error') }}
                </div>
            @endif

            {{-- User Table --}}
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full text-left">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-sm font-medium">ID</th>
                            <th class="px-6 py-3 text-sm font-medium">Name</th>
                            <th class="px-6 py-3 text-sm font-medium">Email</th>
                            <th class="px-6 py-3 text-sm font-medium">Profile</th>
                            <th class="px-6 py-3 text-sm font-medium">Created At</th>
                            <th class="px-6 py-3 text-sm font-medium text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-100 transition even:bg-gray-50">
                                <td class="px-6 py-4">{{ $user->id }}</td>
                                <td class="px-6 py-4">{{ $user->name }}</td>
                                <td class="px-6 py-4">{{ $user->email }}</td>
                                <td class="px-6 py-4">
                                    <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Image" class="w-14 h-14 rounded-full border">
                                </td>
                                <td class="px-6 py-4">{{ $user->created_at->format('d M, Y') }}</td>
                                <td class="px-6 py-4 text-center">
                                    @can('edit users')
                                        <a href="{{ route('user.edit', $user->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm py-2 px-4 rounded-md transition shadow">
                                            Edit
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm py-2 px-4 rounded-md transition shadow">
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
