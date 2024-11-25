<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Section --><a class="font-bold " href="/">Home</a>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Agenda Stats -->
                <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-xl rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-500 bg-opacity-75">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">Total Agenda</p>
                            <p class="text-2xl font-semibold text-gray-800">{{ \App\Models\Agenda::count() }}</p>
                        </div>
                    </div>
                </div>

                <!-- Gallery Stats -->
                <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-xl rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-500 bg-opacity-75">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">Total Foto</p>
                            <p class="text-2xl font-semibold text-gray-800">{{ \App\Models\Gallery::count() }}</p>
                        </div>
                    </div>
                </div>

                <!-- Information Stats -->
                <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-xl rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-500 bg-opacity-75">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">Total Informasi</p>
                            <p class="text-2xl font-semibold text-gray-800">{{ \App\Models\Information::count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-xl rounded-lg p-6 mb-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Aksi Cepat</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="{{ route('agenda.create') }}" class="flex items-center p-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                        <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Tambah Agenda
                    </a>
                    <a href="{{ route('gallery.create') }}" class="flex items-center p-4 bg-blue-500 text-white rounded-lg hover:bg-purple-600 transition">
                        <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Tambah Foto
                    </a>
                    <a href="{{ route('information.create') }}" class="flex items-center p-4 bg-blue-500 text-white rounded-lg hover:bg-pink-600 transition">
                        <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Tambah Informasi
                    </a>
                </div>
            </div>

            <!-- Recent Items -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Recent Agendas -->
                <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-xl rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Agenda Terbaru</h3>
                    <div class="space-y-4">
                        @forelse(\App\Models\Agenda::latest()->take(3)->get() as $agenda)
                            <div class="border-b pb-2">
                                <p class="font-medium text-gray-800">{{ $agenda->title }}</p>
                                <p class="text-sm text-gray-600">{{ $agenda->date->format('d M Y') }}</p>
                            </div>
                        @empty
                            <p class="text-gray-500">Belum ada agenda</p>
                        @endforelse
                    </div>
                </div>

                <!-- Recent Information -->
                <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-xl rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Terbaru</h3>
                    <div class="space-y-4">
                        @forelse(\App\Models\Information::latest()->take(3)->get() as $info)
                            <div class="border-b pb-2">
                                <p class="font-medium text-gray-800">{{ $info->title }}</p>
                                <p class="text-sm text-gray-600">{{ $info->date->format('d M Y') }}</p>
                            </div>
                        @empty
                            <p class="text-gray-500">Belum ada informasi</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
