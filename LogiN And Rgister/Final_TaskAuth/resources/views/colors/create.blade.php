<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between"> 
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              Permission/Create
            </h2>
            <a href="{{ route('color.store') }}" class="bg-slate-700 text-xl2 rounded-md  text-white px-5 px-3">Back </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <form action="{{ route('color.store') }} " method="post">
                 @csrf
                    <label for="" class="font-medium font-medium text-lg">Name</label>
                    <div class="my-3">
                        <input value="{{ old('color_name')}}" type="text" name="color_name" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Enter Name">
                        @error('color_name')
                        <p class="text-red-400 font-medium">{{$message}}</p>
                         @enderror
                    </div>
                    {{-- <div class="grid grid-cols-4 mb-3">
                        @foreach ($permissionss as $permissionss )
                        <div class="mt-3">
                            <input type="checkbox" class="rounded" name="permission[]" value="{{$permissionss->name}}" id="permissionss-{{$permissionss->id}}">  
                            <label for="permissionss-{{$permissionss->id}}">{{$permissionss->name}}</label>
                           </div>    
                        @endforeach
                        
                    
                    </div> --}}
                    
                    <button class="bg-slate-700 text-sm rounded-md  text-white px-5 py-3" type="submit">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
