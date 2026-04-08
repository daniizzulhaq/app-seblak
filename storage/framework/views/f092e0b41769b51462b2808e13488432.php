<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin Dashboard'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        
        <aside class="w-64 bg-gray-800 text-white">
            <div class="p-4">
                <h2 class="text-2xl font-bold">Admin Panel</h2>
            </div>
            <nav class="mt-8">
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="block py-2.5 px-4 hover:bg-gray-700">
        <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
    </a>
    <a href="<?php echo e(route('admin.level-pedas.index')); ?>" class="block py-2.5 px-4 hover:bg-gray-700">
        <i class="fas fa-map-marker-alt mr-3"></i> Level Pedas
    </a>
    <a href="<?php echo e(route('admin.kategori.index')); ?>" class="block py-2.5 px-4 hover:bg-gray-700">
        <i class="fas fa-tags mr-3"></i> Kategori
    </a>
    <a href="<?php echo e(route('admin.produk.index')); ?>" class="block py-2.5 px-4 hover:bg-gray-700">
        <i class="fas fa-guitar mr-3"></i> Produk
    </a>
    <a href="<?php echo e(route('admin.transactions.index')); ?>" class="block py-2.5 px-4 hover:bg-gray-700">
        <i class="fas fa-receipt mr-3"></i> Transaksi
    </a>

    
    <a href="<?php echo e(route('admin.payment-methods.index')); ?>" class="block py-2.5 px-4 hover:bg-gray-700">
        <i class="fas fa-credit-card mr-3"></i> Payment Methods
    </a>

    <hr class="my-4 border-gray-700">
    <a href="<?php echo e(route('home')); ?>" class="block py-2.5 px-4 hover:bg-gray-700">
        <i class="fas fa-home mr-3"></i> Ke Halaman Utama
    </a>
    <form method="POST" action="<?php echo e(route('logout')); ?>">
        <?php echo csrf_field(); ?>
        <button type="submit" class="w-full text-left py-2.5 px-4 hover:bg-gray-700">
            <i class="fas fa-sign-out-alt mr-3"></i> Logout
        </button>
    </form>
</nav>
        </aside>

        
        <div class="flex-1 overflow-auto">
            <header class="bg-white shadow-sm">
                <div class="px-8 py-4">
                    <h1 class="text-2xl font-semibold text-gray-800"><?php echo $__env->yieldContent('header', 'Dashboard'); ?></h1>
                </div>
            </header>

            <main class="p-8">
                <?php if(session('success')): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <?php if(session('error')): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\windows\Documents\joki skripsi\joki laporan\web\e-coomerce-seblak\resources\views/layouts/admin.blade.php ENDPATH**/ ?>