<?php $__env->startSection('title', 'Transaksi Saya'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="mb-10">
        <div class="flex items-center gap-3 mb-3">
            <div class="w-12 h-12 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-receipt text-white text-xl"></i>
            </div>
            <h1 class="text-4xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                Riwayat Transaksi
            </h1>
        </div>
        <p class="text-gray-600 ml-15">Pantau semua pesanan dan transaksi Anda</p>
    </div>

    <?php if($transactions->count() > 0): ?>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl p-6 text-white">
                <i class="fas fa-clock text-3xl mb-2 opacity-80"></i>
                <p class="text-2xl font-bold"><?php echo e($transactions->where('status', 'pending')->count()); ?></p>
                <p class="text-sm text-yellow-100">Menunggu</p>
            </div>
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white">
                <i class="fas fa-check-circle text-3xl mb-2 opacity-80"></i>
                <p class="text-2xl font-bold"><?php echo e($transactions->where('status', 'confirmed')->count()); ?></p>
                <p class="text-sm text-blue-100">Dikonfirmasi</p>
            </div>
            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white">
                <i class="fas fa-truck text-3xl mb-2 opacity-80"></i>
                <p class="text-2xl font-bold"><?php echo e($transactions->where('status', 'shipped')->count()); ?></p>
                <p class="text-sm text-purple-100">Dikirim</p>
            </div>
            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 text-white">
                <i class="fas fa-check-double text-3xl mb-2 opacity-80"></i>
                <p class="text-2xl font-bold"><?php echo e($transactions->where('status', 'completed')->count()); ?></p>
                <p class="text-sm text-green-100">Selesai</p>
            </div>
        </div>

        
        <div class="space-y-6">
            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-300">
                
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-file-invoice text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                                    <?php echo e($transaction->transaction_code); ?>

                                    <button onclick="copyToClipboard('<?php echo e($transaction->transaction_code); ?>')" class="text-gray-400 hover:text-indigo-600 transition-colors" title="Salin kode">
                                        <i class="fas fa-copy text-sm"></i>
                                    </button>
                                </h3>
                                <p class="text-sm text-gray-600 flex items-center gap-2">
                                    <i class="far fa-calendar-alt"></i>
                                    <?php echo e($transaction->created_at->format('d M Y, H:i')); ?>

                                </p>
                            </div>
                        </div>
                        
                        
                        <span class="px-4 py-2 rounded-xl text-sm font-bold flex items-center gap-2 shadow-sm
                            <?php if($transaction->status == 'pending'): ?> bg-yellow-100 text-yellow-800
                            <?php elseif($transaction->status == 'confirmed'): ?> bg-blue-100 text-blue-800
                            <?php elseif($transaction->status == 'processing'): ?> bg-purple-100 text-purple-800
                            <?php elseif($transaction->status == 'shipped'): ?> bg-indigo-100 text-indigo-800
                            <?php elseif($transaction->status == 'completed'): ?> bg-green-100 text-green-800
                            <?php else: ?> bg-red-100 text-red-800
                            <?php endif; ?>">
                            <?php if($transaction->status == 'pending'): ?>
                                <i class="fas fa-clock"></i>
                            <?php elseif($transaction->status == 'confirmed'): ?>
                                <i class="fas fa-check-circle"></i>
                            <?php elseif($transaction->status == 'processing'): ?>
                                <i class="fas fa-cog fa-spin"></i>
                            <?php elseif($transaction->status == 'shipped'): ?>
                                <i class="fas fa-shipping-fast"></i>
                            <?php elseif($transaction->status == 'completed'): ?>
                                <i class="fas fa-check-double"></i>
                            <?php else: ?>
                                <i class="fas fa-times-circle"></i>
                            <?php endif; ?>
                            <?php echo e(ucfirst($transaction->status)); ?>

                        </span>
                    </div>
                </div>

                
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-xl border border-blue-200">
                            <h4 class="font-bold text-gray-900 mb-3 flex items-center">
                                <i class="fas fa-user mr-2 text-blue-600"></i>
                                Informasi Penerima
                            </h4>
                            <div class="space-y-2 text-sm">
                                <p class="text-gray-700">
                                    <span class="font-semibold">Nama:</span> <?php echo e($transaction->recipient_name); ?>

                                </p>
                                <p class="text-gray-700">
                                    <span class="font-semibold">Alamat:</span><br>
                                    <span class="text-gray-600"><?php echo e($transaction->deliver_to); ?></span>
                                </p>
                            </div>
                        </div>

                        
                        <div class="bg-gradient-to-br from-green-50 to-green-100 p-4 rounded-xl border border-green-200">
                            <h4 class="font-bold text-gray-900 mb-3 flex items-center">
                                <i class="fas fa-money-bill-wave mr-2 text-green-600"></i>
                                Informasi Pembayaran
                            </h4>
                            <div class="space-y-2">
                                <?php if($transaction->payment_code): ?>
                                <p class="text-sm text-gray-700">
                                    <span class="font-semibold">Kode Pembayaran:</span>
                                    <span class="bg-white px-2 py-1 rounded text-xs font-mono"><?php echo e($transaction->payment_code); ?></span>
                                </p>
                                <?php endif; ?>
                                <div class="pt-2 border-t border-green-200">
                                    <p class="text-sm text-gray-600 mb-1">Total Pembayaran:</p>
                                    <p class="text-3xl font-bold bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">
                                        Rp <?php echo e(number_format($transaction->total_amount, 0, ',', '.')); ?>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="flex flex-wrap gap-3">
                        <a href="<?php echo e(route('transactions.show', $transaction)); ?>" 
                           class="flex-1 md:flex-none bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-xl hover:shadow-xl transform hover:scale-105 transition-all duration-300 font-semibold text-center flex items-center justify-center gap-2">
                            <i class="fas fa-eye"></i>
                            Lihat Detail
                        </a>

                        <?php if($transaction->status == 'pending'): ?>
                            <button class="bg-yellow-100 text-yellow-700 px-6 py-3 rounded-xl hover:bg-yellow-200 transition-all duration-300 font-semibold flex items-center gap-2">
                                <i class="fas fa-clock"></i>
                                Menunggu Konfirmasi
                            </button>
                        <?php elseif($transaction->status == 'shipped'): ?>
                            <button class="bg-blue-100 text-blue-700 px-6 py-3 rounded-xl hover:bg-blue-200 transition-all duration-300 font-semibold flex items-center gap-2">
                                <i class="fas fa-map-marked-alt"></i>
                                Lacak Pesanan
                            </button>
                        <?php elseif($transaction->status == 'completed'): ?>
                            <button class="bg-green-100 text-green-700 px-6 py-3 rounded-xl hover:bg-green-200 transition-all duration-300 font-semibold flex items-center gap-2">
                                <i class="fas fa-star"></i>
                                Beri Ulasan
                            </button>
                        <?php endif; ?>

                        <button class="bg-gray-100 text-gray-700 px-6 py-3 rounded-xl hover:bg-gray-200 transition-all duration-300 font-semibold flex items-center gap-2">
                            <i class="fas fa-download"></i>
                            Invoice
                        </button>
                    </div>
                </div>

                
                <?php if(in_array($transaction->status, ['confirmed', 'processing', 'shipped', 'completed'])): ?>
                <div class="px-6 pb-6">
                    <div class="bg-gray-50 rounded-xl p-4">
                        <div class="flex items-center justify-between">
                            <div class="flex-1 text-center">
                                <div class="w-10 h-10 mx-auto rounded-full flex items-center justify-center mb-2
                                    <?php echo e(in_array($transaction->status, ['confirmed', 'processing', 'shipped', 'completed']) ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-600'); ?>">
                                    <i class="fas fa-check"></i>
                                </div>
                                <p class="text-xs font-semibold text-gray-700">Dikonfirmasi</p>
                            </div>
                            <div class="flex-1 h-1 <?php echo e(in_array($transaction->status, ['processing', 'shipped', 'completed']) ? 'bg-green-500' : 'bg-gray-300'); ?>"></div>
                            <div class="flex-1 text-center">
                                <div class="w-10 h-10 mx-auto rounded-full flex items-center justify-center mb-2
                                    <?php echo e(in_array($transaction->status, ['processing', 'shipped', 'completed']) ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-600'); ?>">
                                    <i class="fas fa-box"></i>
                                </div>
                                <p class="text-xs font-semibold text-gray-700">Diproses</p>
                            </div>
                            <div class="flex-1 h-1 <?php echo e(in_array($transaction->status, ['shipped', 'completed']) ? 'bg-green-500' : 'bg-gray-300'); ?>"></div>
                            <div class="flex-1 text-center">
                                <div class="w-10 h-10 mx-auto rounded-full flex items-center justify-center mb-2
                                    <?php echo e(in_array($transaction->status, ['shipped', 'completed']) ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-600'); ?>">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <p class="text-xs font-semibold text-gray-700">Dikirim</p>
                            </div>
                            <div class="flex-1 h-1 <?php echo e($transaction->status == 'completed' ? 'bg-green-500' : 'bg-gray-300'); ?>"></div>
                            <div class="flex-1 text-center">
                                <div class="w-10 h-10 mx-auto rounded-full flex items-center justify-center mb-2
                                    <?php echo e($transaction->status == 'completed' ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-600'); ?>">
                                    <i class="fas fa-check-double"></i>
                                </div>
                                <p class="text-xs font-semibold text-gray-700">Selesai</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <div class="mt-8">
            <?php echo e($transactions->links()); ?>

        </div>
    <?php else: ?>
        
        <div class="text-center py-20 bg-white rounded-2xl shadow-xl border border-gray-100">
            <div class="inline-block p-8 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full mb-6">
                <i class="fas fa-receipt text-6xl text-gray-400"></i>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-3">Belum Ada Transaksi</h3>
            <p class="text-gray-600 mb-8 max-w-md mx-auto">
                Anda belum memiliki riwayat transaksi. Mulai belanja sekarang dan temukan alat musik impian Anda!
            </p>
            <a href="<?php echo e(route('catalog.index')); ?>" 
               class="inline-block bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-4 rounded-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 font-bold text-lg">
                <i class="fas fa-store mr-2"></i>
                Mulai Belanja
            </a>
        </div>
    <?php endif; ?>
</div>

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        // Show a temporary success message
        const temp = document.createElement('div');
        temp.className = 'fixed top-24 right-4 bg-green-500 text-white px-6 py-3 rounded-xl shadow-xl z-50';
        temp.innerHTML = '<i class="fas fa-check mr-2"></i>Kode berhasil disalin!';
        document.body.appendChild(temp);
        setTimeout(() => temp.remove(), 2000);
    });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\windows\Documents\joki skripsi\joki laporan\web\e-coomerce-seblak\resources\views/transactions/index.blade.php ENDPATH**/ ?>