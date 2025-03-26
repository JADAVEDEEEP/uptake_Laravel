<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between"> 
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Category') }}
            </h2>
            <a href="{{ route('category.create') }}" class="bg-slate-700 text-xl2 rounded-md text-white px-5 px-3">Create</a>
        </div>
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
            <table class="w-full ">
                <thead class="bg-grey-50">
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-center py-3">
                    @foreach($category as $cat)
                        <tr class="border-b">
                            <td class="py-3 ">{{$cat->Category_id}}</td>
                            <td class=" py-3">{{$cat->Category_name}}</td>
                            <td class="py-3 ">{{$cat->Status}}</td>
                            {{-- Displaying roles --}}
                            {{-- <td class="px-6 py-3 text-left">
                                @foreach($user->roles as $roles) 
                                    <span>{{ $roles->role_id }}</span>
                                    @if (!$loop->last)
                                        <span>, </span> {{-- Adds a comma between role names if there are multiple --}}
                                   
                             
                            
                            <td class="">{{$cat->created_at}}</td>
                            <td class="">
                                <a href="{{ route('category.edit', $cat->Category_id) }}" class="bg-slate-700 text-xl2 rounded-md text-white px-5 px-3">Edit</a>
                                <form action="{{ route('category.destroy', $cat->Category_id) }}" method="POST" style="display:inline-block;">
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

    <x-slot name="script">
        {{-- Optionally add JS scripts if needed --}}
    </x-slot>
</x-app-layout>
