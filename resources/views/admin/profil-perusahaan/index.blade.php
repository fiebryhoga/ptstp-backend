<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil Perusahaan') }}
        </h2>
    </x-slot>

    <div class="py-6" x-data="{ openEdit: false }">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="space-y-4">
                    <div>
                        <h3 class="font-semibold text-gray-700">Kata Pengantar</h3>
                        <p class="text-sm text-gray-800">{{ $profil->kata_pengantar }}</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h4 class="text-gray-600 text-sm">Tanggal Berdiri</h4>
                            <p class="text-gray-800">{{ \Carbon\Carbon::parse($profil->tanggal_berdiri)->translatedFormat('d F Y') }}</p>
                        </div>
                        <div>
                            <h4 class="text-gray-600 text-sm">Direktur Utama</h4>
                            <p class="text-gray-800">{{ $profil->direktur_utama }}</p>
                        </div>
                        <div>
                            <h4 class="text-gray-600 text-sm">Nomor Izin Usaha</h4>
                            <p class="text-gray-800">{{ $profil->nomor_izin_usaha }}</p>
                        </div>
                        <div>
                            <h4 class="text-gray-600 text-sm">Alamat Kantor</h4>
                            <p class="text-gray-800">{{ $profil->alamat_kantor }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 text-right">
                    <button @click="openEdit = true"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Edit Profil
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
             x-show="openEdit" x-cloak>
            <div class="bg-white rounded-lg p-6 w-full max-w-2xl">
                <h3 class="text-lg font-semibold mb-4">Edit Profil Perusahaan</h3>

                <form method="POST" action="{{ route('admin.profil-perusahaan.update', $profil->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Kata Pengantar</label>
                        <textarea name="kata_pengantar" required rows="4"
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ $profil->kata_pengantar }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Berdiri</label>
                            <input type="date" name="tanggal_berdiri" value="{{ $profil->tanggal_berdiri }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Direktur Utama</label>
                            <input type="text" name="direktur_utama" value="{{ $profil->direktur_utama }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        {{-- Input untuk Nomor Izin Usaha --}}
    <div class="mb-4">
        <label for="nomor_izin_usaha" class="block text-sm font-medium text-gray-700">Nomor Izin Usaha</label>
        <input type="text" name="nomor_izin_usaha" id="nomor_izin_usaha" value="{{ old('nomor_izin_usaha', $profil->nomor_izin_usaha) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        @error('nomor_izin_usaha') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Alamat Kantor</label>
                            <input type="text" name="alamat_kantor" value="{{ $profil->alamat_kantor }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                    </div>

                    <div class="flex justify-end gap-2">
                        <button type="button" @click="openEdit = false"
                                class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
