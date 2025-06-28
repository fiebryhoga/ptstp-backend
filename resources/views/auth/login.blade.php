<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100 px-4">
        <div class="bg-white p-6 rounded-2xl shadow-md w-full max-w-md">
            {{-- Logo dan Nama PT --}}
            <div class="flex flex-col items-center mb-6">
                <img src="{{ asset('assets/logo-stp.png') }}" alt="Logo STP" class="w-20 h-20 mb-2">
                <h1 class="text-2xl font-bold text-center text-gray-700">PT. Siwalan Teknik Perkasa</h1>
            </div>

            {{-- Form Login --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200">
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200">
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center justify-between mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring focus:ring-indigo-200">
                        <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                    </label>
                    <a class="text-sm text-indigo-600 hover:underline" href="{{ route('password.request') }}">
                        Lupa Password?
                    </a>
                </div>

                {{-- Submit --}}
                <div>
                    <button type="submit"
                        class="w-full px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md shadow-sm">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
