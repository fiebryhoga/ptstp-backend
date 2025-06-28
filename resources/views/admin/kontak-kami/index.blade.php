<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kontak Kami') }}
        </h2>
    </x-slot>

    <div class="py-6" x-data="{ openModal: false }">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full table-auto">
                    <tbody>
                        <tr>
                            <td class="font-semibold text-gray-700 w-48">Alamat Kantor</td>
                            <td class="text-gray-800">{{ $kontak->alamat_kantor }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold text-gray-700">Email</td>
                            <td class="text-gray-800">{{ $kontak->email }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold text-gray-700">Telepon</td>
                            <td class="text-gray-800">{{ $kontak->telepon }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-6">
                    <button @click="openModal = true"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Edit Kontak
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div x-show="openModal" x-cloak
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded shadow w-full max-w-lg">
                <h3 class="text-lg font-semibold mb-4">Edit Kontak Kami</h3>

                <form method="POST" action="{{ route('admin.kontak-kami.update', $kontak->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Alamat Kantor</label>
                        <textarea name="alamat_kantor" required
                                  class="mt-1 w-full rounded border-gray-300">{{ $kontak->alamat_kantor }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ $kontak->email }}" required
                               class="mt-1 w-full rounded border-gray-300" />
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Telepon</label>
                        <input type="text" name="telepon" value="{{ $kontak->telepon }}" required
                               class="mt-1 w-full rounded border-gray-300" />
                    </div>

                    <div class="flex justify-end gap-2">
                        <button type="button" @click="openModal = false"
                                class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
