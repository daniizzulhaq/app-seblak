<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') — Seblak Mamakoo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar-link { transition: all 0.2s ease; }
        .sidebar-link:hover { background: linear-gradient(90deg, rgba(239,68,68,0.2), transparent); border-left: 3px solid #ef4444; }
        .sidebar-link.active { background: linear-gradient(90deg, rgba(239,68,68,0.3), transparent); border-left: 3px solid #f97316; }
        .logo-glow { text-shadow: 0 0 20px rgba(251,146,60,0.5); }
    </style>
</head>
<body class="bg-orange-50">
    <div class="flex h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 flex flex-col" style="background: linear-gradient(180deg, #1a0a00 0%, #2d1200 50%, #1a0a00 100%);">

            {{-- Logo --}}
            <div class="p-6 border-b border-red-900/40">
                <div class="flex items-center gap-3 mb-1">
                    <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-orange-500 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-pepper-hot text-white text-lg"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-white logo-glow leading-tight">Mamakoo</h2>
                        <p class="text-xs text-orange-400 font-medium">Admin Panel</p>
                    </div>
                </div>
                <p class="text-xs text-red-400/60 mt-2 italic">🌶️ Pedas itu nikmat!</p>
            </div>

            {{-- Nav --}}
            <nav class="flex-1 py-4 overflow-y-auto">
                <p class="text-xs font-semibold text-orange-600/60 uppercase tracking-widest px-5 mb-2">Menu Utama</p>

                <a href="{{ route('admin.dashboard') }}"
                   class="sidebar-link flex items-center gap-3 py-2.5 px-5 text-orange-100 hover:text-white">
                    <i class="fas fa-tachometer-alt w-4 text-orange-400"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.level-pedas.index') }}"
                   class="sidebar-link flex items-center gap-3 py-2.5 px-5 text-orange-100 hover:text-white">
                    <i class="fas fa-pepper-hot w-4 text-red-400"></i>
                    <span>Level Pedas</span>
                </a>

                <a href="{{ route('admin.kategori.index') }}"
                   class="sidebar-link flex items-center gap-3 py-2.5 px-5 text-orange-100 hover:text-white">
                    <i class="fas fa-tags w-4 text-orange-400"></i>
                    <span>Kategori</span>
                </a>

                <a href="{{ route('admin.produk.index') }}"
                   class="sidebar-link flex items-center gap-3 py-2.5 px-5 text-orange-100 hover:text-white">
                    <i class="fas fa-bowl-food w-4 text-yellow-400"></i>
                    <span>Produk</span>
                </a>

                <a href="{{ route('admin.transactions.index') }}"
                   class="sidebar-link flex items-center gap-3 py-2.5 px-5 text-orange-100 hover:text-white">
                    <i class="fas fa-receipt w-4 text-green-400"></i>
                    <span>Transaksi</span>
                </a>

                <a href="{{ route('admin.payment-methods.index') }}"
                   class="sidebar-link flex items-center gap-3 py-2.5 px-5 text-orange-100 hover:text-white">
                    <i class="fas fa-credit-card w-4 text-blue-400"></i>
                    <span>Payment Methods</span>
                </a>

                <hr class="my-4 border-red-900/40 mx-5">

                <p class="text-xs font-semibold text-orange-600/60 uppercase tracking-widest px-5 mb-2">Lainnya</p>

                <a href="{{ route('home') }}"
                   class="sidebar-link flex items-center gap-3 py-2.5 px-5 text-orange-100 hover:text-white">
                    <i class="fas fa-store w-4 text-orange-400"></i>
                    <span>Ke Toko</span>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="sidebar-link w-full text-left flex items-center gap-3 py-2.5 px-5 text-orange-100 hover:text-white">
                        <i class="fas fa-sign-out-alt w-4 text-red-400"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>

            {{-- Footer sidebar --}}
            <div class="p-4 border-t border-red-900/40">
                <p class="text-xs text-orange-800 text-center">© 2025 Seblak Mamakoo</p>
            </div>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 overflow-auto flex flex-col">

            {{-- Header --}}
            <header class="bg-white border-b border-orange-100 shadow-sm sticky top-0 z-10">
                <div class="px-8 py-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-7 bg-gradient-to-b from-red-500 to-orange-500 rounded-full"></div>
                        <h1 class="text-xl font-bold text-gray-800">@yield('header', 'Dashboard')</h1>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <i class="fas fa-pepper-hot text-red-500"></i>
                        <span>Seblak Mamakoo Admin</span>
                    </div>
                </div>
            </header>

            {{-- Alerts & Content --}}
            <main class="flex-1 p-8">
                @if(session('success'))
                    <div class="flex items-center gap-3 bg-green-50 border border-green-300 text-green-800 px-5 py-3 rounded-xl mb-6 shadow-sm">
                        <i class="fas fa-check-circle text-green-500 text-lg"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="flex items-center gap-3 bg-red-50 border border-red-300 text-red-800 px-5 py-3 rounded-xl mb-6 shadow-sm">
                        <i class="fas fa-times-circle text-red-500 text-lg"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>