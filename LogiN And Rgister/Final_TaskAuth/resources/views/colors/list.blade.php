<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between"> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
        <a href="{{ route('color.create') }}" class="bg-slate-700 text-xl2 rounded-md  text-white px-5 px-3">Create </a>
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
                    <thead class="bg-grey-50 ">
                        <tr>
                        <th class="py-3">id</th>
                        <th class="py-3">Name</th>
                        <th class="py-3">created_At</th>
                        <th class="py-3">Actions</th>
                        </tr>
                    </thead>
                     <tbody class="bg-white text-center">
                       @foreach($color as $color)
                       <tr class="border-b">
                        <td class="px-6 py-3 ">{{$color->Color_id}}</td>
                        <td class="px-6 py-3 ">{{$color->Color_name}}</td>
                         
                         {{-- <td class="px-6 py-3 ">{{$color->roles->pluck('name')->implode(', ')}}</td> --}}
                        <td class="px-6 py-3 ">{{$color->created_at}}</td>
                         <td class="px-6 py-3 "><a href="{{ route('color.edit',$color->Color_id) }}" class="bg-slate-700 rounded-md  text-white px-5 px-3">Edit </a>
                            {{-- <td class="px-4 py-2 border">
                                <form action="{{ route('color.destroy', $color->Color_id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md">Delete</button>
                                </form>
                        </td> --}}
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
