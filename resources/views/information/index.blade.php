<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Information Management') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-800">Informasi Sekolah</h3>
                    <a href="{{ route('information.create') }}" class="bg-blue-600 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded-lg shadow-lg transform transition hover:scale-105 duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Informasi Baru
                    </a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-md" role="alert">
                        <div class="flex">
                            <div class="py-1">
                                <svg class="w-6 h-6 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold">Sukses!</p>
                                <p>{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                    <table class="border-collapse table-auto w-full bg-white">
                        <thead>
                            <tr class="bg-gray-50 text-gray-700 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Judul</th>
                                <th class="py-3 px-6 text-left">Deskripsi</th>
                                <th class="py-3 px-6 text-left">Tanggal</th>
                                <th class="py-3 px-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm">
                            @foreach($information as $info)
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="py-4 px-6">{{ $info->title }}</td>
                                    <td class="py-4 px-6">{{ Str::limit($info->content, 100) }}</td>
                                    <td class="py-4 px-6">{{ \Carbon\Carbon::parse($info->date)->format('d M Y') }}</td>
                                    <td class="py-4 px-6 text-center">
                                        <div class="flex item-center justify-center gap-2">
                                            <a href="{{ route('information.edit', $info) }}" 
                                               class="bg-blue-500 hover:bg-yellow-600 text-black px-3 py-1 rounded-lg transition duration-200 ease-in-out transform hover:scale-105">
                                                Edit
                                            </a>
                                            <form action="{{ route('information.destroy', $info) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="bg-red-500 hover:bg-red-600 text-black px-3 py-1 rounded-lg transition duration-200 ease-in-out transform hover:scale-105"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus informasi ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 