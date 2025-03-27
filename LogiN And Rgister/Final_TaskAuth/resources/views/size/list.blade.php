<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between"> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
        @can('create size')
        <a href="{{ route('size.create') }}" class="bg-slate-700 text-xl2 rounded-md  text-white px-5 px-3">Create </a>
    </div>
    @endcan
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
                    <thead class="bg-grey-50 ">
                        <tr>
                        <th class="py-3">id</th>
                        <th class="py-3">Name</th>
                        <th class="py-3">created_At</th>
                        <th class="py-3">Actions</th>
                        </tr>
                    </thead>
                     <tbody class="bg-white text-center ">
                       @foreach($size as $sizes)
                       <tr class="border-b">
                        <td class=" py-3 ">{{$sizes->Size_id}}</td>
                        <td class=" py-3">{{$sizes->Size_name}}</td>
                         
                         {{-- <td class="px-6 py3 text-left">{{$size->roles->pluck('name')->implode(', ')}}</td> --}}
                        <td class="py-3 ">{{$sizes->created_at}}</td>
                        <div class="">
                            @can('edit size')
                         <td class="px-6 py-3 flex gap-3 justify-center ">
                            <a href="{{ route('size.edit',$sizes->Size_id) }}" class="bg-slate-700 text-xl2 rounded-md  text-white px-5 px-3">Edit </a> 
                            <form action="{{ route('size.destroy', $sizes->Size_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this size?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-700 text-xl2 rounded-md text-white px-5 px-3">Delete</button>
                            </form>
                        </div>
                        @endcan
                        </td>
                       </tr>
                        @endforeach
                     </tbody>
                </table>
                   
                </div>
            </div>
            
    </div>
    <x-slot name="script">
        
    </x-slot>
</x-app-layout>
