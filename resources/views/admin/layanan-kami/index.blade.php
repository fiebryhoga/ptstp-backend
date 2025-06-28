<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Layanan Kami') }}
        </h2>
    </x-slot>

    <div class="py-6" x-data="{ openAdd: false, openEdit: false, currentItem: null }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tombol Tambah -->
            <div class="mb-4">
                <button @click="openAdd = true"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Tambah Layanan
                </button>
            </div>

            <!-- Table -->
            <div class="bg-white shadow rounded-lg p-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Gambar</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Nama</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Deskripsi</th>
                            <th class="px-4 py-2 text-sm font-semibold text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($items as $item)
                            <tr>
                                <td class="px-4 py-2">
                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" class="h-16 rounded" alt="gambar">
                                    @else
                                        <span class="text-gray-400 text-sm">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2">{{ $item->nama }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $item->deskripsi }}</td>
                                <td class="px-4 py-2 flex gap-2">
                                    <button @click="openEdit = true; currentItem = {{ $item }}"
                                            class="text-blue-600 hover:underline">Edit</button>
                                    <form method="POST" action="{{ route('admin.layanan-kami.destroy', $item->id) }}"
                                          onsubmit="return confirm('Hapus layanan ini?')">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal Tambah -->
            <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                 x-show="openAdd" x-cloak>
                <div class="bg-white p-6 rounded-lg w-full max-w-md">
                    <h3 class="text-lg font-semibold mb-4">Tambah Layanan</h3>
                    <form method="POST" action="{{ route('admin.layanan-kami.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nama Layanan</label>
                            <input type="text" name="nama" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" required
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Gambar (Opsional)</label>
                            <input type="file" name="gambar"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div class="flex justify-end gap-2">
                            <button type="button" @click="openAdd = false"
                                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Edit -->
            <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                 x-show="openEdit" x-cloak>
                <div class="bg-white p-6 rounded-lg w-full max-w-md">
                    <h3 class="text-lg font-semibold mb-4">Edit Layanan</h3>
                    <form :action="'/admin/layanan-kami/' + currentItem.id" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nama Layanan</label>
                            <input type="text" name="nama" x-model="currentItem.nama"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" x-model="currentItem.deskripsi"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Ganti Gambar</label>
                            <input type="file" name="gambar"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div class="flex justify-end gap-2">
                            <button type="button" @click="openEdit = false"
                                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
