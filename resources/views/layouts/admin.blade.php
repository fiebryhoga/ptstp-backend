<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'PTSTP Backend') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r shadow-lg hidden md:block">
            <div class="p-6 text-center border-b">
                <img src="{{ asset('assets/logo-stp.png') }}" class="w-16 h-16 mx-auto mb-2" alt="Logo">
                <h2 class="text-xl font-bold">PT STP Admin</h2>
            </div>
            <nav class="p-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded hover:bg-indigo-100">Dashboard</a>
                <a href="{{ route('admin.mengenal-kami.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-100">Mengenal Kami</a>
                <a href="{{ route('admin.mengapa-kami.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-100">Mengapa Kami</a>
                <a href="{{ route('admin.layanan-kami.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-100">Layanan Kami</a>
                <a href="{{ route('admin.profil-perusahaan') }}" class="block py-2 px-4 rounded hover:bg-indigo-100">Profil Perusahaan</a>
                <a href="{{ route('admin.kontak-kami') }}" class="block py-2 px-4 rounded hover:bg-indigo-100">Kontak Kami</a>
                <a href="{{ route('admin.pesan.index') }}" class="block py-2 px-4 rounded hover:bg-indigo-100">Pesan Masuk</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
