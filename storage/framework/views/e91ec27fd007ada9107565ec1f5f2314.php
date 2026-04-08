<?php $__env->startSection('title', 'Detail Transaksi'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="mb-8">
        <a href="<?php echo e(route('transactions.index')); ?>" class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-700 font-semibold group transition-all duration-300">
            <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center group-hover:bg-indigo-200 transition-colors">
                <i class="fas fa-arrow-left"></i>
            </div>
            Kembali ke Daftar Transaksi
        </a>
    </div>

    
    
    
    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
        
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-6 text-white">
            <div class="flex flex-wrap items-start justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold mb-2">Detail Transaksi</h1>
                    <div class="flex items-center gap-3">
                        <p class="text-xl font-mono bg-white/20 px-4 py-2 rounded-lg backdrop-blur-sm">
                            <?php echo e($transaction->transaction_code); ?>

                        </p>
                        <button onclick="copyToClipboard('<?php echo e($transaction->transaction_code); ?>')" 
                                class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-lg hover:bg-white/30 transition-all duration-300 flex items-center justify-center" 
                                title="Salin kode">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>
                <span class="px-6 py-3 rounded-xl text-sm font-bold flex items-center gap-2 shadow-lg
                    <?php if($transaction->status == 'pending'): ?> bg-yellow-500 text-white
                    <?php elseif($transaction->status == 'confirmed'): ?> bg-blue-500 text-white
                    <?php elseif($transaction->status == 'processing'): ?> bg-purple-500 text-white
                    <?php elseif($transaction->status == 'shipped'): ?> bg-indigo-500 text-white
                    <?php elseif($transaction->status == 'completed'): ?> bg-green-500 text-white
                    <?php else: ?> bg-red-500 text-white
                    <?php endif; ?>">
                    <?php if($transaction->status == 'pending'): ?>
                        <i class="fas fa-clock"></i>
                        <?php if($transaction->payment_proof): ?> Menunggu Konfirmasi <?php else: ?> Menunggu Pembayaran <?php endif; ?>
                    <?php elseif($transaction->status == 'confirmed'): ?>
                        <i class="fas fa-check-circle"></i> Dikonfirmasi
                    <?php elseif($transaction->status == 'processing'): ?>
                        <i class="fas fa-cog fa-spin"></i> Diproses
                    <?php elseif($transaction->status == 'shipped'): ?>
                        <i class="fas fa-shipping-fast"></i> Dikirim
                    <?php elseif($transaction->status == 'completed'): ?>
                        <i class="fas fa-check-double"></i> Selesai
                    <?php else: ?>
                        <i class="fas fa-times-circle"></i> Dibatalkan
                    <?php endif; ?>
                </span>
            </div>
        </div>

        <div class="p-8">
            
            <?php if($transaction->status == 'pending' && $transaction->payment_proof): ?>
            <div class="bg-gradient-to-r from-yellow-50 to-orange-50 border-l-4 border-yellow-400 p-6 mb-8 rounded-xl">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-clock text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-yellow-900 mb-1">Sedang Diverifikasi</h4>
                        <p class="text-sm text-yellow-800">
                            Bukti pembayaran Anda sedang diverifikasi oleh admin. Mohon tunggu konfirmasi (maksimal 1x24 jam).
                        </p>
                    </div>
                </div>
            </div>
            <?php elseif($transaction->status == 'pending' && !$transaction->payment_proof): ?>
            <div class="bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-400 p-6 mb-8 rounded-xl">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-exclamation-triangle text-white text-xl"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-bold text-red-900 mb-2">Menunggu Pembayaran</h4>
                        <p class="text-sm text-red-800 mb-4">
                            Anda belum melakukan pembayaran. Silakan upload bukti transfer untuk melanjutkan pesanan.
                        </p>
                        <a href="<?php echo e(route('checkout.payment', $transaction)); ?>" 
                           class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-pink-600 text-white px-6 py-3 rounded-xl hover:shadow-xl transform hover:scale-105 transition-all duration-300 font-bold">
                            <i class="fas fa-upload"></i>
                            Upload Bukti Pembayaran
                        </a>
                    </div>
                </div>
            </div>
            <?php elseif($transaction->status == 'confirmed'): ?>
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-400 p-6 mb-8 rounded-xl">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-check-circle text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-green-900 mb-1">Pembayaran Dikonfirmasi</h4>
                        <p class="text-sm text-green-800">
                            Pembayaran Anda telah dikonfirmasi! Pesanan sedang dalam proses pengemasan.
                        </p>
                    </div>
                </div>
            </div>
            <?php elseif($transaction->status == 'shipped'): ?>
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-l-4 border-blue-400 p-6 mb-8 rounded-xl">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-truck text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-blue-900 mb-1">Pesanan Dalam Pengiriman</h4>
                        <p class="text-sm text-blue-800">
                            Pesanan Anda sedang dalam perjalanan. Mohon tunggu hingga pesanan sampai di alamat tujuan.
                        </p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-2xl border border-blue-200">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg">Informasi Pembeli</h3>
                    </div>
                    <div class="space-y-2">
                        <p class="text-gray-700 flex items-center gap-2">
                            <i class="fas fa-user-circle text-blue-600 w-5"></i>
                            <span class="font-semibold"><?php echo e($transaction->user->name); ?></span>
                        </p>
                        <p class="text-gray-700 flex items-center gap-2">
                            <i class="fas fa-envelope text-blue-600 w-5"></i>
                            <span><?php echo e($transaction->user->email); ?></span>
                        </p>
                    </div>
                </div>

                
                <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-2xl border border-green-200">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-shipping-fast text-white"></i>
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg">Informasi Pengiriman</h3>
                    </div>
                    <div class="space-y-2">
                        <p class="text-gray-700">
                            <span class="font-semibold">Penerima:</span><br>
                            <span class="ml-6"><?php echo e($transaction->recipient_name); ?></span>
                        </p>
                        <p class="text-gray-700">
                            <span class="font-semibold">Alamat:</span><br>
                            <span class="ml-6 text-sm"><?php echo e($transaction->deliver_to); ?></span>
                        </p>
                    </div>
                </div>
            </div>

            
            <?php if($transaction->payment_code): ?>
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-6 rounded-2xl border border-purple-200 mb-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-ticket-alt text-white"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Kode Pembayaran</p>
                        <p class="font-mono font-bold text-gray-900 text-lg"><?php echo e($transaction->payment_code); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            
            <?php if($transaction->payment_proof): ?>
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-file-image text-white"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 text-xl">Bukti Pembayaran</h3>
                </div>
                <div class="bg-gray-50 rounded-2xl p-6 border-2 border-dashed border-gray-300">
                    <img src="<?php echo e(asset('storage/' . $transaction->payment_proof)); ?>" 
                         alt="Bukti Pembayaran" 
                         class="max-w-md mx-auto rounded-xl shadow-lg cursor-pointer hover:shadow-2xl transition-shadow duration-300"
                         onclick="openImageModal('<?php echo e(asset('storage/' . $transaction->payment_proof)); ?>')">
                    <p class="text-center text-sm text-gray-500 mt-4 flex items-center justify-center gap-2">
                        <i class="fas fa-search-plus"></i>
                        Klik gambar untuk memperbesar
                    </p>
                </div>
            </div>
            <?php endif; ?>

            
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-gradient-to-r from-orange-600 to-red-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-shopping-bag text-white"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 text-xl">Detail Pesanan</h3>
                </div>
                
                <div class="space-y-4">
                    <?php $__currentLoopData = $transaction->transactionDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-all duration-300">
                        <div class="relative flex-shrink-0">
                            <img src="<?php echo e($detail->produk && $detail->produk->gambar ? asset('storage/' . $detail->produk->gambar) : 'https://via.placeholder.com/100'); ?>" 
     alt="<?php echo e($detail->produk ? $detail->produk->nama : 'Produk'); ?>" 
     class="w-24 h-24 object-cover rounded-xl">

<h4 class="font-bold text-gray-900 mb-2 truncate">
    <?php echo e($detail->produk ? $detail->produk->nama : 'Produk'); ?>

</h4>

<p class="text-sm text-gray-600 flex items-center gap-2 mb-1">
    <i class="fas fa-map-marker-alt text-blue-500"></i>
    <?php echo e($detail->produk && $detail->produk->daerah ? $detail->produk->daerah->nama_daerah : '-'); ?>

</p>

<p class="text-sm text-gray-600">
    <?php echo e($detail->quantity); ?> x Rp <?php echo e(number_format($detail->price, 0, ',', '.')); ?>

</p>
                        </div>
                        <div class="text-right flex-shrink-0">
                            <p class="text-xs text-gray-500 mb-1">Subtotal</p>
                            <p class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                                Rp <?php echo e(number_format($detail->subtotal, 0, ',', '.')); ?>

                            </p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl p-8 text-white mb-6">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-white/80 mb-1">Total Pembayaran</p>
                        <p class="text-4xl font-bold">Rp <?php echo e(number_format($transaction->total_amount, 0, ',', '.')); ?></p>
                    </div>
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center">
                        <i class="fas fa-receipt text-5xl"></i>
                    </div>
                </div>
            </div>

            
            <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600">
                    <p class="flex items-center gap-2">
                        <i class="fas fa-calendar-plus text-indigo-600"></i>
                        <span>Tanggal Pemesanan: <span class="font-semibold text-gray-900"><?php echo e($transaction->created_at->format('d F Y, H:i')); ?></span></span>
                    </p>
                    <p class="flex items-center gap-2">
                        <i class="fas fa-calendar-check text-purple-600"></i>
                        <span>Terakhir Diupdate: <span class="font-semibold text-gray-900"><?php echo e($transaction->updated_at->format('d F Y, H:i')); ?></span></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center p-4 backdrop-blur-sm" onclick="closeImageModal()">
    <div class="relative max-w-5xl w-full" onclick="event.stopPropagation()">
        <button onclick="closeImageModal()" class="absolute -top-12 right-0 text-white hover:text-gray-300 transition-colors">
            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white/30 transition-all duration-300">
                <i class="fas fa-times text-2xl"></i>
            </div>
        </button>
        <img id="modalImage" src="" alt="Bukti Pembayaran" class="w-full rounded-2xl shadow-2xl">
    </div>
</div>

<script>
function openImageModal(imageSrc) {
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('imageModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    document.getElementById('imageModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        const temp = document.createElement('div');
        temp.className = 'fixed top-24 right-4 bg-green-500 text-white px-6 py-3 rounded-xl shadow-xl z-50 animate-slide-in';
        temp.innerHTML = '<i class="fas fa-check mr-2"></i>Kode berhasil disalin!';
        document.body.appendChild(temp);
        setTimeout(() => temp.remove(), 2000);
    });
}

// Close modal with ESC key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeImageModal();
    }
});
</script>

<style>
@keyframes slide-in {
    from {
        opacity: 0;
        transform: translateX(100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.animate-slide-in {
    animation: slide-in 0.3s ease;
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\windows\Documents\joki skripsi\joki laporan\web\e-coomerce-seblak\resources\views/transactions/show.blade.php ENDPATH**/ ?>