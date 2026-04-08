@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- ===================== HERO SECTION ===================== --}}
    <div class="relative overflow-hidden rounded-3xl mb-16">
        {{-- Background gradient merah-oranye --}}
        <div class="absolute inset-0" style="background: linear-gradient(135deg, #D72638 0%, #F46036 60%, #F4C430 100%); opacity:0.95;"></div>

        {{-- Pattern titik-titik halus --}}
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.06\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

        <div class="relative text-center py-24 px-4">
            {{-- Badge atas --}}
            <div class="inline-block mb-6">
                <div class="flex items-center justify-center space-x-2 rounded-full px-6 py-2 text-white" style="background:rgba(255,255,255,0.2); backdrop-filter:blur(8px);">
                    <i class="fas fa-pepper-hot" style="color:#F4C430;"></i>
                    <span class="text-sm font-bold">Seblak Terenak &amp; Terpedas #1 Bandung</span>
                </div>
            </div>

            {{-- Judul Utama --}}
            <h1 class="text-5xl md:text-6xl font-black text-white mb-6 leading-tight" style="font-family:'Pacifico',cursive;">
                Selamat Datang di<br>
                <span style="font-family:'Pacifico',cursive; color:#F4C430;">
                    Mamakoo!
                </span>
            </h1>

            <p class="text-xl md:text-2xl mb-10 max-w-3xl mx-auto font-bold" style="color:rgba(255,255,255,0.9);">
                Seblak &amp; jajanan pedas autentik khas Nusantara — dibuat segar, disajikan hangat, dikirim cepat ke pintu rumah kamu 🌶️
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('catalog.index') }}"
                   class="group relative inline-flex items-center justify-center px-8 py-4 text-lg font-black rounded-2xl overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-2xl"
                   style="background:#fff; color:#D72638;">
                    <i class="fas fa-fire-flame-curved mr-3" style="color:#F46036;"></i>
                    Lihat Menu Pedas
                    <i class="fas fa-arrow-right ml-3 group-hover:translate-x-2 transition-transform duration-300" style="color:#F46036;"></i>
                </a>

                <a href="#featured"
                   class="group inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white rounded-2xl transition-all duration-300 hover:scale-105"
                   style="background:rgba(255,255,255,0.2); border:2px solid rgba(255,255,255,0.5);">
                    <i class="fas fa-bowl-food mr-3 group-hover:translate-y-1 transition-transform duration-300"></i>
                    Menu Andalan
                </a>
            </div>

            {{-- Trust badges --}}
            <div class="mt-12 flex flex-wrap items-center justify-center gap-8" style="color:rgba(255,255,255,0.85);">
                <div class="flex items-center gap-2">
                    <i class="fas fa-fire text-2xl" style="color:#F4C430;"></i>
                    <span class="text-sm font-bold">Level Pedas Bisa Pilih</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-truck-fast text-2xl" style="color:#F4C430;"></i>
                    <span class="text-sm font-bold">Gratis Ongkir</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-leaf text-2xl" style="color:#F4C430;"></i>
                    <span class="text-sm font-bold">Bahan Segar Tiap Hari</span>
                </div>
            </div>
        </div>
    </div>

    {{-- ===================== STATS SECTION ===================== --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
        <div class="rounded-2xl p-6 text-white transform hover:scale-105 transition-transform duration-300"
             style="background: linear-gradient(135deg, #D72638, #b01e2c);">
            <div class="flex items-center justify-between mb-3">
                <i class="fas fa-users text-3xl opacity-80"></i>
                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
            </div>
            <h3 class="text-3xl font-black mb-1">5000+</h3>
            <p class="text-sm font-bold" style="color:rgba(255,255,255,0.8);">Pelanggan Setia</p>
        </div>

        <div class="rounded-2xl p-6 text-white transform hover:scale-105 transition-transform duration-300"
             style="background: linear-gradient(135deg, #F46036, #d14e28);">
            <div class="flex items-center justify-between mb-3">
                <i class="fas fa-bowl-food text-3xl opacity-80"></i>
                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
            </div>
            <h3 class="text-3xl font-black mb-1">30+</h3>
            <p class="text-sm font-bold" style="color:rgba(255,255,255,0.8);">Varian Menu</p>
        </div>

        <div class="rounded-2xl p-6 text-white transform hover:scale-105 transition-transform duration-300"
             style="background: linear-gradient(135deg, #c0812a, #a06020);">
            <div class="flex items-center justify-between mb-3">
                <i class="fas fa-store text-3xl opacity-80"></i>
                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
            </div>
            <h3 class="text-3xl font-black mb-1">5+</h3>
            <p class="text-sm font-bold" style="color:rgba(255,255,255,0.8);">Tahun Berdiri</p>
        </div>

        <div class="rounded-2xl p-6 text-white transform hover:scale-105 transition-transform duration-300"
             style="background: linear-gradient(135deg, #F4C430, #d4a420);">
            <div class="flex items-center justify-between mb-3">
                <i class="fas fa-star text-3xl opacity-80"></i>
                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
            </div>
            <h3 class="text-3xl font-black mb-1">4.9</h3>
            <p class="text-sm font-bold" style="color:rgba(80,40,0,0.8);">Rating Pelanggan</p>
        </div>
    </div>

    {{-- ===================== FEATURED PRODUCTS ===================== --}}
    <div id="featured" class="mb-16">
        <div class="text-center mb-12">
            <div class="inline-block mb-4">
                <span class="text-white text-sm font-black px-5 py-2 rounded-full"
                      style="background: linear-gradient(135deg, #D72638, #F46036);">
                    <i class="fas fa-fire mr-2"></i>Paling Laris
                </span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black mb-4" style="color:#2d1200; font-family:'Pacifico',cursive;">
                Menu Andalan
            </h2>
            <p class="text-xl max-w-2xl mx-auto font-bold" style="color:#7a4a2a;">
                Pilihan seblak &amp; jajanan favorit yang bikin nagih terus! 🌶️
            </p>
        </div>

        @if(isset($featuredProducts) && count($featuredProducts) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredProducts as $product)
            <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2"
                 style="border:1px solid #ffe0cc;">

                <div class="relative overflow-hidden">
                    <img src="{{ $product->gambar ? Storage::url($product->gambar) : 'https://via.placeholder.com/400x300' }}"
                         alt="{{ $product->nama_alat }}"
                         class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">

                    {{-- Badge ANDALAN --}}
                    <div class="absolute top-4 right-4">
                        <span class="text-white text-xs font-black px-3 py-1 rounded-full shadow-lg"
                              style="background: linear-gradient(135deg, #F4C430, #F46036);">
                            <i class="fas fa-crown mr-1"></i>ANDALAN
                        </span>
                    </div>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>

                <div class="p-6">
                    <div class="flex items-start justify-between mb-3">
                        <h3 class="text-xl font-black group-hover:transition-colors duration-300"
                            style="color:#2d1200;">
                            {{ $product->nama_alat }}
                        </h3>
                        <button class="transition-colors duration-300" style="color:#ccc;">
                            <i class="far fa-heart text-xl hover:text-red-500"></i>
                        </button>
                    </div>

                    @if($product->deskripsi)
                    <p class="text-sm mb-4 line-clamp-2" style="color:#7a4a2a;">
                        {{ Str::limit($product->deskripsi, 80) }}
                    </p>
                    @endif

                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-xs font-bold mb-1" style="color:#F46036;">Harga</p>
                            <p class="text-2xl font-black" style="color:#D72638;">
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="flex items-center gap-1 rounded-full px-3 py-1"
                             style="background:#fff8e1;">
                            <i class="fas fa-star text-sm" style="color:#F4C430;"></i>
                            <span class="text-sm font-black" style="color:#2d1200;">4.9</span>
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <a href="{{ route('catalog.show', $product) }}"
                           class="flex-1 text-white text-center py-3 rounded-xl font-black hover:shadow-xl transform hover:scale-105 transition-all duration-300"
                           style="background: linear-gradient(135deg, #D72638, #F46036);">
                            <i class="fas fa-eye mr-2"></i>Lihat Detail
                        </a>

                        @auth
                            @if(auth()->user()->isCustomer())
                                @if($product->stok > 0)
                                    <form action="{{ route('cart.add', $product) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit"
                                                class="text-white px-4 py-3 rounded-xl hover:shadow-xl transform hover:scale-105 transition-all duration-300"
                                                style="background: linear-gradient(135deg, #22c55e, #16a34a);"
                                                title="Tambah ke Keranjang">
                                            <i class="fas fa-basket-shopping"></i>
                                        </button>
                                    </form>
                                @else
                                    <button disabled
                                            class="bg-gray-300 text-gray-500 px-4 py-3 rounded-xl cursor-not-allowed"
                                            title="Stok Habis">
                                        <i class="fas fa-times-circle"></i>
                                    </button>
                                @endif
                            @endif
                        @else
                            <a href="{{ route('login') }}"
                               class="px-4 py-3 rounded-xl transition-all duration-300 font-bold"
                               style="background:#fff3e4; color:#D72638;"
                               title="Login untuk Memesan">
                                <i class="fas fa-basket-shopping"></i>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 rounded-2xl" style="background:#fff3e4;">
            <i class="fas fa-bowl-food text-6xl mb-4" style="color:#F4C430;"></i>
            <p class="text-xl font-bold" style="color:#7a4a2a;">Belum ada menu andalan</p>
        </div>
        @endif
    </div>

    {{-- ===================== CTA SECTION ===================== --}}
    <div class="rounded-3xl p-12 text-center text-white mb-16 relative overflow-hidden"
         style="background: linear-gradient(135deg, #D72638 0%, #F46036 60%, #F4C430 100%);">
        {{-- Pattern --}}
        <div class="absolute inset-0 opacity-10"
             style="background-image: url('data:image/svg+xml,%3Csvg width=\"80\" height=\"80\" viewBox=\"0 0 80 80\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"1\"%3E%3Cpath d=\"M0 0h40v40H0V0zm40 40h40v40H40V40zm0-40h2l-2 2V0zm0 4l4-4h2l-6 6V4zm0 4l8-8h2L40 10V8zm0 4L52 0h2L40 14v-2zm0 4L56 0h2L40 18v-2zm0 4L60 0h2L40 22v-2zm0 4L64 0h2L40 26v-2zm0 4L68 0h2L40 30v-2zm0 4L72 0h2L40 34v-2zm0 4L76 0h2L40 38v-2zm0 4L80 0v2L42 40h-2zm4 0L80 4v2L46 40h-2zm4 0L80 8v2L50 40h-2zm4 0l28-28v2L54 40h-2zm4 0l24-24v2L58 40h-2zm4 0l20-20v2L62 40h-2zm4 0l16-16v2L66 40h-2zm4 0l12-12v2L70 40h-2zm4 0l8-8v2l-6 6h-2zm4 0l4-4v2l-2 2h-2z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

        <div class="relative z-10">
            <div class="text-5xl mb-6">🌶️</div>
            <h3 class="text-3xl md:text-4xl font-black mb-4" style="font-family:'Pacifico',cursive;">
                Promo Member Baru!
            </h3>
            <p class="text-xl mb-8 font-bold" style="color:rgba(255,255,255,0.92);">
                Daftar sekarang dan dapatkan voucher diskon <strong>20%</strong> untuk order pertama kamu 🔥
            </p>
            <a href="{{ route('register') }}"
               class="inline-block font-black text-lg px-8 py-4 rounded-2xl transform hover:scale-105 transition-all duration-300 shadow-xl hover:shadow-2xl"
               style="background:#fff; color:#D72638;">
                <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang, Gratis!
            </a>
        </div>
    </div>

    {{-- ===================== FEATURES SECTION ===================== --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
        <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300"
             style="border:1px solid #ffe0cc;">
            <div class="w-16 h-16 rounded-2xl flex items-center justify-center mb-6"
                 style="background: linear-gradient(135deg, #D72638, #b01e2c);">
                <i class="fas fa-fire-flame-curved text-3xl text-white"></i>
            </div>
            <h3 class="text-2xl font-black mb-3" style="color:#2d1200;">Level Pedas Pilihan</h3>
            <p class="font-bold" style="color:#7a4a2a;">
                Pilih sendiri tingkat kepedasan dari level 1 hingga level "minta ampun" — sesuai selera kamu!
            </p>
        </div>

        <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300"
             style="border:1px solid #ffe0cc;">
            <div class="w-16 h-16 rounded-2xl flex items-center justify-center mb-6"
                 style="background: linear-gradient(135deg, #F46036, #d14e28);">
                <i class="fas fa-truck-fast text-3xl text-white"></i>
            </div>
            <h3 class="text-2xl font-black mb-3" style="color:#2d1200;">Pengiriman Cepat</h3>
            <p class="font-bold" style="color:#7a4a2a;">
                Gratis ongkir ke seluruh Indonesia. Pesanan dikirim dalam keadaan segar dan terjaga kualitasnya.
            </p>
        </div>

        <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300"
             style="border:1px solid #ffe0cc;">
            <div class="w-16 h-16 rounded-2xl flex items-center justify-center mb-6"
                 style="background: linear-gradient(135deg, #F4C430, #d4a420);">
                <i class="fas fa-leaf text-3xl text-white"></i>
            </div>
            <h3 class="text-2xl font-black mb-3" style="color:#2d1200;">Bahan Segar Setiap Hari</h3>
            <p class="font-bold" style="color:#7a4a2a;">
                Semua bahan dipilih segar setiap pagi dari pasar lokal — dijamin halal dan higienis.
            </p>
        </div>
    </div>

</div>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection