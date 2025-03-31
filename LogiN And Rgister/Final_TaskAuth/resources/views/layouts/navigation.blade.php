<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-5">
            <!-- Navigation Links -->
            <div class="flex space-x-8">
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-gray-900 font-medium">
                    {{ __('Dashboard') }}
                </a>
                <a href="{{ route('users.index') }}" class="text-gray-700 hover:text-gray-900 font-medium">
                    {{ __('Users') }}
                </a>
                <a href="{{ route('color.index') }}" class="text-gray-700 hover:text-gray-900 font-medium">
                    {{ __('Colors') }}
                </a>
                <a href="{{ route('size.index') }}" class="text-gray-700 hover:text-gray-900 font-medium">
                    {{ __('Size') }}
                </a>
                <a href="{{ route('product.index') }}" class="text-gray-700 hover:text-gray-900 font-medium">
                    {{ __('Products') }}
                </a>
                <a href="{{ route('category.index') }}" class="text-gray-700 hover:text-gray-900 font-medium">
                    {{ __('Category') }}
                </a>
                <a href="{{ route('skus.index') }}" class="text-gray-700 hover:text-gray-900 font-medium">
                    {{ __('SKU Product Variant') }}
                </a>
            </div>

            <!-- Profile Dropdown -->
            <div class="relative">
                <button @click="open = !open" class="flex items-center text-gray-700 font-medium focus:outline-none">
                    <span>{{ Auth::user()->name }}</span>
                    <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg py-2">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                        {{ __('Profile') }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
