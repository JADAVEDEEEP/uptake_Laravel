<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between"> 
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              Permission/Edit
            </h2>
            <a href="{{ route('permissions.index') }}" class="bg-slate-700 text-xl2 rounded-md  text-white px-5 px-3">Back </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <form action="{{ route('permissions.update',$permssions->id) }} " method="post">
                 @csrf
                    <label for="" class="font-medium font-medium text-lg">Name</label>
                    <div class="my-3">
                        <input value="{{ old('name',$permssions->name)}}" type="text" name="name" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Enter Name">
                        @error('name')
                        <p class="text-red-400 font-medium">{{$message}}</p>
                         @enderror
                    </div>
                    <button class="bg-slate-700 text-sm rounded-md  text-white px-5 py-3" type="submit">Update</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
