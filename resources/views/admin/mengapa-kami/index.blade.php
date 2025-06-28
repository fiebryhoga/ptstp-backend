<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mengapa Kami') }}
        </h2>
    </x-slot>

    <div class="py-6" x-data="{ openModal: false, currentItem: null }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">#</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Judul</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Deskripsi</th>
                            <th class="px-4 py-2 text-sm font-semibold text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($items as $index => $item)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 text-sm text-gray-800 font-medium">{{ $item->title }}</td>
                                <td class="px-4 py-2 text-sm text-gray-600">{{ $item->description }}</td>
                                <td class="px-4 py-2 text-sm">
                                    <button
                                        class="text-blue-600 hover:underline"
                                        @click="openModal = true; currentItem = {{ $item }}"
                                    >Edit</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Edit -->
        <div
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
            x-show="openModal"
            x-cloak
        >
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h3 class="text-lg font-semibold mb-4">Edit Item</h3>
                <form method="POST" :action="'/admin/mengapa-kami/' + currentItem.id">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="title" x-model="currentItem.title"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="description" x-model="currentItem.description"
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
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
