<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 4 BOGOR</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .hero-pattern {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white/90 backdrop-blur-md fixed w-full z-50 shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <img src="https://pjj.smkn4bogor.sch.id/pluginfile.php/1/core_admin/logocompact/300x300/1662946883/LOGO%20SMKN%204.png" alt="Logo" class="h-12">
                    <div>
                        <h1 class="text-xl font-bold text-blue-900">SMKN 4 BOGOR</h1>
                        <p class="text-sm text-blue-600">Maju seiring perkembangan digital</p>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#agenda" class="text-gray-600 hover:text-blue-600 transition">Agenda</a>
                    <a href="#gallery" class="text-gray-600 hover:text-blue-600 transition">Galeri</a>
                    <a href="#informasi" class="text-gray-600 hover:text-blue-600 transition">Informasi</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition shadow-lg">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 transition">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition shadow-lg">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-pattern min-h-screen flex items-center text-white pt-20">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <h2 class="text-4xl md:text-6xl font-bold leading-tight">
                        Selamat Datang di<br>
                        <span class="text-yellow-400">SMKN 4 BOGOR</span>
                    </h2>
                    <p class="text-xl text-blue-100 leading-relaxed">
                        Sekolah kejuruan berbasis Teknologi Informasi dan Komunikasi yang terakreditasi A.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#agenda" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition shadow-lg flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Lihat Agenda
                        </a>
                        <a href="#gallery" class="bg-blue-600 border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition shadow-lg flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Galeri
                        </a>
                    </div>
                </div>
                <div class="relative hidden md:block">
                    <div class="absolute -inset-2 bg-blue-400 rounded-full blur-3xl opacity-30 animate-pulse"></div>
                    <img src="https://smkn4bogor.sch.id/assets/images/background/smkn4bogor_2.jpg" 
                         alt="SMKN 4 Bogor" 
                         class="relative rounded-lg shadow-2xl animate-float">
                </div>
            </div>
        </div>
    </section>

    <!-- Agenda Section -->
    <section id="agenda" class="py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Agenda Sekolah</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($agendas as $agenda)
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="flex items-center mb-4">
                            <div class="p-3 bg-blue-100 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-blue-600 font-semibold">{{ $agenda->date->format('d F Y') }}</p>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800">{{ $agenda->title }}</h3>
                        <p class="text-gray-600">{{ Str::limit($agenda->description, 150) }}</p>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500">
                        Belum ada agenda yang ditambahkan
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="py-24 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Galeri Foto</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($galleries as $gallery)
                    <div class="group relative overflow-hidden rounded-xl bg-white shadow-lg card-hover">
                        <img src="{{ Storage::url($gallery->image) }}" 
                             alt="{{ $gallery->title }}"
                             class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <div class="absolute bottom-4 left-4 right-4 text-white">
                                <h3 class="font-semibold text-lg">{{ $gallery->title }}</h3>
                                @if($gallery->description)
                                    <p class="text-sm text-gray-200">{{ Str::limit($gallery->description, 100) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500">
                        Belum ada foto yang ditambahkan
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Information Section -->
    <section id="informasi" class="py-24">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Informasi Terkini</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($informations as $info)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                        @if($info->image)
                            <img src="{{ Storage::url($info->image) }}" 
                                 alt="{{ $info->title }}"
                                 class="w-full h-48 object-cover">
                        @endif
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-blue-600 font-medium">{{ $info->date->format('d F Y') }}</span>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-gray-800">{{ $info->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($info->content, 150) }}</p>
                            <a href="#" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center group">
                                Baca selengkapnya
                                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500">
                        Belum ada informasi yang ditambahkan
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">SMKN 4 BOGOR</h3>
                    <p class="text-blue-200">Maju seiring perkembangan digital</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Kontak</h3>
                    <p class="text-blue-200">Jl. Raya Tajur, Kp. Buntar RT.02/RW.08</p>
                    <p class="text-blue-200">Kel. Muara sari, Kec. Bogor Selatan</p>
                    <p class="text-blue-200">Kota Bogor, Jawa Barat 16137</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Sosial Media</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-blue-200 hover:text-white transition">Facebook</a>
                        <a href="#" class="text-blue-200 hover:text-white transition">Instagram</a>
                        <a href="#" class="text-blue-200 hover:text-white transition">Twitter</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-blue-800 mt-8 pt-8 text-center text-blue-200">
                <p>&copy; {{ date('Y') }} SMKN 4 BOGOR. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>