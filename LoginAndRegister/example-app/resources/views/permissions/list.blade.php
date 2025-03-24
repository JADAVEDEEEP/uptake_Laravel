<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between"> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions') }}
        </h2>
        <a href="{{ route('permissions.create') }}" class="bg-slate-700 text-xl2 rounded-md  text-white px-5 px-3">Create </a>
    </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(session::has('success'))
                <div class="bg-green-200 broder-green-600 p-4 mb-3 rounded-sm shadow-sm">
                    {{session::get('success')}}
                </div>    
                @endif
                @if(session::has('error'))
                <div class="bg-red-200 broder-red-600 p-4 mb-3 rounded-sm shadow-sm">
                    {{session::get('error')}}
                    @endif
                </div> --}}
            <table class="w-full">
                <thead class="bg-grey-50">
                    <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Created</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                 <tbody class="bg-white">
                   @foreach($permissions as $permission)
                   <tr class="border-b">
                    <td class="px-6 py3 text-left">{{$permission->id}}</td>
                    <td class="px-6 py3 text-left">{{$permission->name}}</td>
                    <td class="px-6 py3 text-left">{{$permission->created_at}}</td>
                    <td class="px-6 py3 text-left"><a href="{{ route('permissions.edit',$permission->id) }}" class="bg-slate-700 text-xl2 rounded-md  text-white px-5 px-3">Edit </a>
                        <a href="{{ route('permissions.index') }}" class="bg-red-700 text-xl2 rounded-md  text-white px-5 px-3">delete </a>
                    </td>
                   </tr>
                    @endforeach
                 </tbody>
            </table>
                {{$permissions->links()}}
            </div>
        </div>
    </div>
    <x-slot name="script">
        
    </x-slot>
</x-app-layout>
