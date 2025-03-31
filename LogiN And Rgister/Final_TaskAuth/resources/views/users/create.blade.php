<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between"> 
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              Create Users
            </h2>
            <a href="{{ route('users.index') }}" class="bg-slate-700 text-xl2 rounded-md text-white px-5 py-3">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Product Name Input -->
                        <label for="Name" class="font-medium text-lg">Name</label>
                        <div class="my-3">
                            <input type="text" name="name" value="{{ old('name') }}" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Enter User Name">
                            @error('name')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price Input -->
                        <label for="email" class="font-medium text-lg">Email</label>
                        <div class="my-3">
                            <input type="email" name="email" value="{{ old('email') }}" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Enter user Email">
                            @error('email')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category Select -->
                        
                        <!-- Product Image Input -->
                        <label for="password" class="font-medium text-lg">Password</label>
                        <div class="my-3">
                            <input type="password" name="password" value="{{ old('password') }}" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Enter Password">
                            @error('password')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <label for="password_confirmation" class="font-medium text-lg">Confirm Password</label>
                        <div class="my-3">
                            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Enter Password">
                            @error('password_confirmation')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>


                        <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
