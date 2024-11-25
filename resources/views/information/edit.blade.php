<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Edit Informasi') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Edit Informasi</h3>
                    <p class="text-gray-600">Silakan edit informasi yang diperlukan pada form di bawah ini.</p>
                </div>

                <form action="{{ route('information.update', $information) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul Informasi</label>
                        <input type="text" name="title" id="title" value="{{ $information->title }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               required>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="description" id="description" rows="4" 
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                  required>{{ $information->content }}</textarea>
                    </div>

                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="date" id="date" value="{{ $information->date }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               required>
                    </div>

                    <div class="flex items-center justify-end space-x-3 pt-4">
                        <a href="{{ route('information') }}" 
                           class="bg-gray-500 hover:bg-gray-600 text-black font-bold py-2 px-4 rounded-lg shadow-lg transition duration-200">
                            Batal
                        </a>
                        <button type="submit" 
                                class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded-lg shadow-lg transition duration-200">
                            Update Informasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 