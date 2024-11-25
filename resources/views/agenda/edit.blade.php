<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Edit Agenda') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Edit Agenda</h3>
                    <p class="text-gray-600">Silakan edit informasi agenda di bawah ini.</p>
                </div>

                <form action="{{ route('agenda.update', $agenda) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul Agenda</label>
                        <input type="text" name="title" id="title" value="{{ $agenda->title }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               required>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="description" id="description" rows="4" 
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                  required>{{ $agenda->description }}</textarea>
                    </div>

                    <div>
                        <label for="event_date" class="block text-sm font-medium text-gray-700">Tanggal Berlangsung</label>
                        <input type="date" name="event_date" id="event_date" value="{{ $agenda->event_date }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               required>
                    </div>

                    <div class="flex items-center justify-end space-x-3 pt-4">
                        <a href="{{ route('agenda') }}" 
                           class="bg-gray-500 hover:bg-gray-600 text-black font-bold py-2 px-4 rounded-lg shadow-lg transition duration-200">
                            Batal
                        </a>
                        <button type="submit" 
                                class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded-lg shadow-lg transition duration-200">
                            Update Agenda
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 