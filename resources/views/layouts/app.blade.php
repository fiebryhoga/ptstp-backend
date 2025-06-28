<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PTSTP Admin') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="bg-gray-100 text-gray-900 antialiased">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        {{-- Menambahkan flex-shrink-0 untuk memastikan sidebar tidak mengecil --}}
        <aside class="w-64 bg-white border-r hidden md:block flex-shrink-0">
            <div class="p-6 border-b text-center">
                <img src="{{ asset('assets/logo-stp.png') }}" class="w-16 h-16 mx-auto mb-2" alt="Logo">
                <h2 class="text-xl font-bold">PT STP Admin</h2>
            </div>
            <nav class="p-4 space-y-2">
                <a href="{{ route('admin.mengenal-kami.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-100">Mengenal Kami</a>
                <a href="{{ route('admin.mengapa-kami.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-100">Mengapa Kami</a>
                <a href="{{ route('admin.layanan-kami.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-100">Layanan Kami</a>
                <a href="{{ route('admin.profil-perusahaan.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-100">Profil Perusahaan</a>
                <a href="{{ route('admin.kontak-kami.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-100">Kontak Kami</a>
                <a href="{{ route('admin.pesan.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-100">Pesan Masuk</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
                <div class="text-xl font-semibold text-gray-800">
                    {{ $header ?? 'Dashboard' }}
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-600 hover:underline text-sm">Logout</button>
                </form>
            </header>

            <!-- Content -->
            <main class="p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
