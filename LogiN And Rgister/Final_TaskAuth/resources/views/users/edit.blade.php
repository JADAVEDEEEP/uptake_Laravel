<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between"> 
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              users/Edit
            </h2>
            <a href="{{ route('user.index') }}" class="bg-slate-700 text-xl2 rounded-md  text-white px-5 px-3">Back </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <form action="{{ route('user.update',$users->id) }} " method="post">
                 @csrf
                    <label for="" class="font-medium font-medium text-lg">Name</label>
                    <div class="my-3">
                        <input value="{{ old('name',$users->name)}}" type="text" name="name" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Enter Name">
                        @error('name')
                        <p class="text-red-400 font-medium">{{$message}}</p>
                         @enderror
                    </div>
                    <label for="" class="font-medium font-medium text-lg">Email</label>
                    <div class="my-3">
                        <input value="{{ old('email',$users->email)}}" type="text" name="email" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Enter Name">
                        @error('email')
                        <p class="text-red-400 font-medium">{{$message}}</p>
                         @enderror
                    </div>
                    <div class="grid grid-cols-4 mb-3">
                        {{-- @foreach ($roles as $roless )
                        <div class="mt-3">

                            {{-- <input {{$hasroles->contains($roless->id)?'checked':''}} type="checkbox" class="rounded" name="role[]" value="{{$roless->name}}" id="role-{{$roless->id}}">  
                            <label for="role-{{$roless->id}}">{{$roless->name}}</label> --}}
                           </div>     
                      
                        
                    
                    </div>
                    
                    <button class="bg-slate-700 text-sm rounded-md  text-white px-5 py-3" type="submit">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
