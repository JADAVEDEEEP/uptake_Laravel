<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between"> 
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
            @can('create users')
            {{-- <a href="{{ route('user.index') }}" class="bg-slate-700 text-xl2 rounded-md text-white px-5 px-3">Create</a> --}}
        </div>
        @endcan
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Uncomment this section if you want to display success or error messages --}}
            {{-- 
            @if(session::has('success'))
            <div class="bg-green-200 border-green-600 p-4 mb-3 rounded-sm shadow-sm">
                {{session::get('success')}}
            </div>
            @endif
            @if(session::has('error'))
            <div class="bg-red-200 border-red-600 p-4 mb-3 rounded-sm shadow-sm">
                {{session::get('error')}}
            </div>
            @endif
            --}}
            <table class="w-full">
                <thead class="bg-grey-50">
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-center">
                    @foreach($users as $user)
                        <tr class="border-b">
                            <td class="px-6 py-3 ">{{$user->id}}</td>
                            <td class="px-6 py-3 ">{{$user->name}}</td>
                            <td class="px-6 py-3 ">{{$user->email}}</td>
                            {{-- Displaying roles --}}
                            {{-- <td class="px-6 py-3 text-left">
                                @foreach($user->roles as $roles) 
                                    <span>{{ $roles->role_id }}</span>
                                    @if (!$loop->last)
                                        <span>, </span> {{-- Adds a comma between role names if there are multiple --}}
                                   
                             
                            
                            <td class="px-6 py-3 ">{{$user->created_at}}</td>
                            <td class="px-6 py-3 ">
                                @can('edit users')
                                <a href="{{ route('user.edit', $user->id) }}" class="bg-slate-700 text-xl2 rounded-md text-white px-5 px-3">Edit</a>
                            </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <x-slot name="script">
        {{-- Optionally add JS scripts if needed --}}
    </x-slot>
</x-app-layout>
