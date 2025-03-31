{{-- @extends('layouts.app') --}}
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Forgot Password</h2>

        <form action="{{ route('password') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                <input type="email" name="email" required
                    class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg transition">
                Send OTP
            </button>
        </form>
    </div>
</div>

    </h1>
  </body>
</html>
