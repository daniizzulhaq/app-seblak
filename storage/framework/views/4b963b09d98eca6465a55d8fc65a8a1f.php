<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Seblak Mamakoo - Pedas Nikmat Nusantara'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Pacifico&display=swap');

        body {
            font-family: 'Nunito', sans-serif;
            background-color: #fff8f0;
        }

        /* ===== WARNA UTAMA MAMAKOO ===== */
        /* Merah cabai: #D72638  |  Oranye hangat: #F46036  |  Kuning kunyit: #F4C430  |  Krem: #FFF3E4 */

        .gradient-bg {
            background: linear-gradient(135deg, #D72638 0%, #F46036 100%);
        }

        .glass-effect {
            background: rgba(255, 248, 240, 0.97);
            backdrop-filter: blur(10px);
            border-bottom: 2px solid #F46036;
        }

        .nav-link {
            position: relative;
            transition: all 0.3s ease;
            font-weight: 700;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #D72638, #F46036);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .btn-gradient {
            background: linear-gradient(135deg, #D72638 0%, #F46036 100%);
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(215, 38, 56, 0.35);
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(215, 38, 56, 0.5);
        }

        .dropdown-menu {
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .alert-slide {
            animation: slideInRight 0.5s ease;
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(100px); }
            to   { opacity: 1; transform: translateX(0); }
        }

        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: linear-gradient(135deg, #F4C430 0%, #F46036 100%);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50%       { transform: scale(1.1); }
        }

        .footer-wave {
            background: linear-gradient(135deg, #1a0a00 0%, #2d1200 100%);
        }

        .icon-bounce:hover {
            animation: bounce 0.5s;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-10px); }
        }

        /* Dekorasi cabai kecil di background */
        body::before {
            content: '';
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image:
                radial-gradient(circle at 15% 20%, rgba(244, 96, 54, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 85% 80%, rgba(215, 38, 56, 0.05) 0%, transparent 40%);
            pointer-events: none;
            z-index: 0;
        }

        main, nav, footer {
            position: relative;
            z-index: 1;
        }

        /* Badge promo / label merah */
        .badge-spicy {
            background: #D72638;
            color: #fff;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 0.05em;
            padding: 2px 8px;
            border-radius: 999px;
        }
    </style>
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('hidden');
        }

        window.addEventListener('click', function(e) {
            const dropdown = document.getElementById('userDropdown');
            const button   = document.getElementById('dropdownButton');
            if (dropdown && button && !button.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });

        // Auto hide alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert-auto-hide');
            alerts.forEach(alert => {
                alert.style.animation = 'slideInRight 0.5s ease reverse';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>
</head>
<body class="min-h-screen" style="background-color:#fff8f0;">

    
    <nav class="glass-effect sticky top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">

                
                <div class="flex items-center">
                    <a href="<?php echo e(route('home')); ?>" class="flex items-center space-x-3 group">
                        <div class="w-12 h-12 gradient-bg rounded-2xl flex items-center justify-center transform group-hover:rotate-6 transition-transform duration-300 shadow-md">
                            
                            <i class="fas fa-bowl-food text-white text-xl"></i>
                        </div>
                        <div class="leading-tight">
                            <span class="text-2xl font-black" style="font-family:'Pacifico',cursive; color:#D72638;">
                                Mamakoo
                            </span>
                            <span class="block text-xs font-700 tracking-widest" style="color:#F46036; font-weight:800; letter-spacing:0.12em;">
                                SEBLAK & JAJANAN PEDAS
                            </span>
                        </div>
                    </a>
                </div>

                
                <div class="flex items-center space-x-6">
                    <a href="<?php echo e(route('catalog.index')); ?>"
                       class="nav-link font-bold"
                       style="color:#2d1200;">
                        <i class="fas fa-fire-flame-curved mr-1" style="color:#F46036;"></i>Menu Pedas
                    </a>

                    <?php if(auth()->guard()->check()): ?>
                        <?php if(auth()->user()->isCustomer()): ?>
                            <a href="<?php echo e(route('cart.index')); ?>"
                               class="nav-link font-bold relative"
                               style="color:#2d1200;">
                                <i class="fas fa-shopping-basket text-lg icon-bounce" style="color:#F46036;"></i>
                                <?php
                                    $cartCount = auth()->user()->carts()->sum('quantity');
                                ?>
                                <?php if($cartCount > 0): ?>
                                    <span class="cart-badge text-white text-xs font-black w-5 h-5 flex items-center justify-center rounded-full">
                                        <?php echo e($cartCount > 99 ? '99+' : $cartCount); ?>

                                    </span>
                                <?php endif; ?>
                            </a>
                            <a href="<?php echo e(route('transactions.index')); ?>"
                               class="nav-link font-bold"
                               style="color:#2d1200;">
                                <i class="fas fa-receipt mr-1" style="color:#F46036;"></i>Pesanan Saya
                            </a>
                        <?php endif; ?>

                        <?php if(auth()->user()->isAdmin()): ?>
                            <a href="<?php echo e(route('admin.dashboard')); ?>"
                               class="nav-link font-bold"
                               style="color:#2d1200;">
                                <i class="fas fa-tachometer-alt mr-1" style="color:#F46036;"></i>Dashboard
                            </a>
                        <?php endif; ?>

                        
                        <div class="relative">
                            <button id="dropdownButton" onclick="toggleDropdown()" type="button"
                                    class="flex items-center space-x-2 focus:outline-none group"
                                    style="color:#2d1200;">
                                <div class="w-10 h-10 gradient-bg rounded-full flex items-center justify-center shadow">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <span class="font-bold text-sm"><?php echo e(auth()->user()->name); ?></span>
                                <i class="fas fa-chevron-down text-xs group-hover:rotate-180 transition-transform duration-300" style="color:#F46036;"></i>
                            </button>

                            <div id="userDropdown"
                                 class="hidden dropdown-menu absolute right-0 mt-3 w-56 rounded-2xl shadow-2xl py-2 border"
                                 style="background:#fff8f0; border-color:#F4C430;">
                                <div class="px-4 py-3 border-b" style="border-color:#f0e0cc;">
                                    <p class="text-sm font-bold" style="color:#2d1200;"><?php echo e(auth()->user()->name); ?></p>
                                    <p class="text-xs mt-1" style="color:#F46036;"><?php echo e(auth()->user()->email); ?></p>
                                </div>
                                <form method="POST" action="<?php echo e(route('logout')); ?>" class="mt-2">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit"
                                            class="w-full text-left px-4 py-3 transition-all duration-300 rounded-xl mx-0 flex items-center space-x-3 hover:bg-red-50"
                                            style="color:#2d1200;">
                                        <i class="fas fa-sign-out-alt" style="color:#D72638;"></i>
                                        <span class="font-bold">Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>

                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>"
                           class="nav-link font-bold"
                           style="color:#2d1200;">
                            <i class="fas fa-sign-in-alt mr-1" style="color:#F46036;"></i>Masuk
                        </a>
                        <a href="<?php echo e(route('register')); ?>"
                           class="btn-gradient text-white px-5 py-3 rounded-xl font-bold text-sm shadow">
                            <i class="fas fa-user-plus mr-1"></i>Daftar
                        </a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </nav>

    
    <?php if(session('success')): ?>
        <div class="fixed top-24 right-4 z-50 alert-slide alert-auto-hide">
            <div class="rounded-2xl shadow-2xl px-6 py-4 flex items-center space-x-4 border-l-4 max-w-md"
                 style="background:#fff8f0; border-color:#22c55e;">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-bold" style="color:#2d1200;">Mantap! 🔥</p>
                    <p class="text-sm mt-1" style="color:#5a3a1a;"><?php echo e(session('success')); ?></p>
                </div>
                <button onclick="this.parentElement.parentElement.remove()"
                        class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    <?php endif; ?>

    
    <?php if(session('error')): ?>
        <div class="fixed top-24 right-4 z-50 alert-slide alert-auto-hide">
            <div class="rounded-2xl shadow-2xl px-6 py-4 flex items-center space-x-4 border-l-4 max-w-md"
                 style="background:#fff8f0; border-color:#D72638;">
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-exclamation-circle text-red-600 text-xl"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-bold" style="color:#2d1200;">Aduh!</p>
                    <p class="text-sm mt-1" style="color:#5a3a1a;"><?php echo e(session('error')); ?></p>
                </div>
                <button onclick="this.parentElement.parentElement.remove()"
                        class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    <?php endif; ?>

    
    <main class="py-12">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
    <footer class="footer-wave text-white py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">

                
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 gradient-bg rounded-xl flex items-center justify-center">
                            <i class="fas fa-bowl-food text-white"></i>
                        </div>
                        <h3 class="text-xl font-black" style="font-family:'Pacifico',cursive; color:#F4C430;">
                            Mamakoo
                        </h3>
                    </div>
                    <p class="text-sm" style="color:#c9a07a;">
                        Seblak & jajanan pedas khas Nusantara. Dibuat dengan cinta dan cabai pilihan Mamak.
                    </p>
                </div>

                
                <div>
                    <h4 class="text-base font-black mb-4 tracking-wide" style="color:#F4C430;">
                        <i class="fas fa-pepper-hot mr-2" style="color:#F46036;"></i>Jelajahi
                    </h4>
                    <ul class="space-y-2 text-sm" style="color:#c9a07a;">
                        <li><a href="#" class="hover:text-white transition-colors"><i class="fas fa-chevron-right mr-2 text-xs" style="color:#F46036;"></i>Tentang Mamakoo</a></li>
                        <li><a href="#" class="hover:text-white transition-colors"><i class="fas fa-chevron-right mr-2 text-xs" style="color:#F46036;"></i>Menu Seblak</a></li>
                        <li><a href="#" class="hover:text-white transition-colors"><i class="fas fa-chevron-right mr-2 text-xs" style="color:#F46036;"></i>Cara Pemesanan</a></li>
                        <li><a href="#" class="hover:text-white transition-colors"><i class="fas fa-chevron-right mr-2 text-xs" style="color:#F46036;"></i>Hubungi Kami</a></li>
                    </ul>
                </div>

                
                <div>
                    <h4 class="text-base font-black mb-4 tracking-wide" style="color:#F4C430;">
                        <i class="fas fa-location-dot mr-2" style="color:#F46036;"></i>Cari Kami
                    </h4>
                    <ul class="space-y-3 text-sm" style="color:#c9a07a;">
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-3" style="color:#F46036;"></i>Bandung, Jawa Barat
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3" style="color:#F46036;"></i>+62 812 3456 7890
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3" style="color:#F46036;"></i>mamakoo@seblak.id
                        </li>
                    </ul>
                    <div class="flex space-x-3 mt-5">
                        <a href="#" class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110"
                           style="background:rgba(244,96,54,0.2);">
                            <i class="fab fa-facebook-f" style="color:#F46036;"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110"
                           style="background:rgba(244,96,54,0.2);">
                            <i class="fab fa-instagram" style="color:#F46036;"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110"
                           style="background:rgba(244,96,54,0.2);">
                            <i class="fab fa-tiktok" style="color:#F46036;"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110"
                           style="background:rgba(244,96,54,0.2);">
                            <i class="fab fa-whatsapp" style="color:#F46036;"></i>
                        </a>
                    </div>
                </div>

            </div>

            <div class="border-t pt-8 text-center" style="border-color:rgba(244,96,54,0.25);">
                <p class="text-sm" style="color:#7a4a2a;">
                    &copy; 2024 <span style="color:#F4C430; font-weight:800;">Seblak Mamakoo</span>. All rights reserved.
                    &nbsp;|&nbsp; 🌶️ Dibuat dengan pedas &amp; cinta.
                </p>
            </div>
        </div>
    </footer>

</body>
</html><?php /**PATH C:\Users\windows\Documents\joki skripsi\joki laporan\web\e-coomerce-seblak\resources\views/layouts/app.blade.php ENDPATH**/ ?>