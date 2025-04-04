<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3DIFY - Solusi Praktis Asset 3D</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4 flex justify-between items-center flex-wrap gap-y-2">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('assets/images/logo_3difyy.png') }}" alt="3DIFY Logo" class="h-10">
            <span class="font-bold text-lg">3DIFY</span>
        </div>
        <div class="hidden md:flex space-x-6 w-full md:w-auto justify-center md:justify-start mt-2 md:mt-0">
            <a href="#" class="font-semibold text-black">Beranda</a>
            <a href="{{url('/categories')}}" class="text-gray-600">Kategori</a>
            <a href="{{url('/products')}}" class="text-gray-600">Produk</a>
            <a href="{{url('/teams')}}" class="text-gray-600">Team</a>
        </div>
        <div class="flex items-center space-x-4">
            @if(Auth::check())
                <a href="{{ url ('/profile') }}">
                    <i class="bx bxs-user-circle cursor-pointer text-[40px] md:text-[100px] lg:text-[40px]"></i>
                </a>
            @else
                <a href="{{ url('/login') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Login</a>
            @endif
        </div>
    </nav>

    <header class="relative w-full h-[400px] flex items-center text-white px-6">
        <img src="{{ asset('assets/images/banner.png') }}" alt="Banner 3DIFY" class="absolute w-[calc(100%-200px)] h-full object-cover rounded-lg left-1/2 transform -translate-x-1/2 mt-10">
        <div class="relative z-10 max-w-xl text-left ml-20 pl-8">
            <p class="text-4xl font-bold max-w-xl">Solusi Praktis Kebutuhan Asset 3D Blender</p>
            <p class="mt-2 text-xl">3Dify memudahkan Anda menemukan dan membeli asset 3D berkualitas tinggi, khusus untuk furniture dan alat tulis sekolah.</p>
            <div class="mt-4 flex space-x-4">
                <button class="bg-blue-600 px-4 py-2 rounded-md text-white">Jelajahi Kategori</button>
                <button class="bg-white text-blue-600 px-4 py-2 rounded-md border border-blue-600">Temukan Produk</button>
            </div>
        </div>
    </header>

    <!-- Trending Categories -->
    <section class="container mx-auto mt-10 p-6 text-center">
        <h2 class="text-xl font-semibold mb-4">Trending Categories</h2>
        <div class="flex justify-center space-x-4">
            <div class="flex flex-col items-center">
                <a href="furniture.html" class="block w-40 h-40 bg-gradient-to-b from-blue-400 to-blue-800 rounded-md overflow-hidden">
                    <img src="{{ asset('assets/images/design (4) 1.png') }}" alt="Furniture" class="w-full h-full object-contain">
                </a>
                <span class="text-center text-black mt-2 font-bold text-lg">Furniture</span>
            </div>
            <div class="flex flex-col items-center">
                <a href="stationary.html" class="block w-40 h-40 bg-gradient-to-b from-blue-400 to-blue-800 rounded-md overflow-hidden">
                    <img src="{{ asset('assets/images/design (4) 2.png') }}" alt="Stationary" class="w-full h-full object-contain">
                </a>
                <span class="text-center text-black mt-2 font-bold text-lg">Stationary</span>
            </div>
        </div>
    </section>

    <!-- Product Section -->
    <div class="container mx-auto mb-20 px-4">
        <h1 class="text-3xl font-bold mb-6">Produk Kami</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <button class="product-button bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                    <a href="{{ url('/product/'.$product->id) }}">
                        @if($product->image)
                            <img src="{{ asset('/images/' . $product->image) }}" alt="Product Image" class="mb-4">
                        @else
                            <span class="w-full h-32 flex items-center justify-center bg-gray-200 text-gray-500 mb-4">No Image Available</span>
                        @endif
                    </a>
                    <div class="text-left mt-2">
                        <a href="{{ url('/product/'.$product->id) }}" class="block">
                            <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                        </a>
                        <p class="text-gray-500">{{ $product->description }}</p>
                        <p class="text-gray-500">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </button>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white py-8">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-start gap-8 px-4">
            <div class="flex flex-col space-y-2">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('assets/images/logo_3difyy.png') }}" alt="3DIFY Logo" class="h-10">
                    <span class="text-2xl font-bold">3DIFY</span>
                </div>
                <p class="italic text-blue-800 font-semibold">Solusi Praktis Kebutuhan Asset 3D Blender</p>
            </div>

            <div class="flex flex-col sm:flex-row sm:space-x-16 gap-4">
                <div>
                    <h3 class="font-semibold text-blue-800">Produk Kami</h3>
                    <ul class="mt-2 space-y-1">
                        <li>Pensil</li>
                        <li>Penghapus</li>
                        <li>Kursi</li>
                        <li>Meja</li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-blue-800">Website 3Dify</h3>
                    <ul class="mt-2 space-y-1">
                        <li>Beranda</li>
                        <li>Kategori</li>
                        <li>Produk</li>
                        <li>Tim Kami</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Hamburger toggle script -->
<script>
    const toggleBtn = document.getElementById('menu-toggle');
    const navLinks = document.getElementById('nav-links');

    toggleBtn.addEventListener('click', () => {
      navLinks.classList.toggle('hidden');
    });
  </script>

</body>
</html>
