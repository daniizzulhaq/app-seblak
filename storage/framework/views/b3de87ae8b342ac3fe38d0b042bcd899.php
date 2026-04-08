<?php $__env->startSection('title', 'Edit Produk'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    
    <div class="bg-gradient-to-r from-yellow-500 to-orange-500 rounded-2xl shadow-xl p-8 mb-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2 flex items-center">
                    <i class="fas fa-edit mr-3"></i>
                    Edit Produk
                </h1>
                <p class="text-orange-100">Perbarui informasi produk seblak</p>
            </div>
            <a href="<?php echo e(route('admin.produk.index')); ?>" 
               class="bg-white text-orange-600 px-6 py-3 rounded-xl font-semibold hover:bg-orange-50 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center gap-2">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center gap-3">
                        <div class="bg-blue-100 p-2 rounded-lg">
                            <i class="fas fa-info-circle text-blue-600"></i>
                        </div>
                        <h2 class="text-lg font-bold text-gray-800">Informasi Produk</h2>
                    </div>
                </div>

                
                <div class="p-6">
                    <form action="<?php echo e(route('admin.produk.update', $produk->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        
                        <div class="mb-6">
                            <label for="nama_produk" class="block text-sm font-bold text-gray-700 mb-2">
                                Nama Produk <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   class="w-full px-4 py-3 border-2 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all <?php $__errorArgs = ['nama_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php else: ?> border-gray-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="nama_produk" 
                                   name="nama_produk" 
                                   value="<?php echo e(old('nama_produk', $produk->nama_produk)); ?>"
                                   placeholder="Contoh: Seblak Original, Seblak Ceker, Seblak Keju"
                                   required>
                            <?php $__errorArgs = ['nama_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <?php echo e($message); ?>

                                </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="level_pedas_id" class="block text-sm font-bold text-gray-700 mb-2">
                                    <i class="fas fa-fire text-red-500"></i> Level Pedas <span class="text-red-500">*</span>
                                </label>
                                <select class="w-full px-4 py-3 border-2 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all <?php $__errorArgs = ['level_pedas_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php else: ?> border-gray-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                        id="level_pedas_id" 
                                        name="level_pedas_id"
                                        required>
                                    <option value="">-- Pilih Level Pedas --</option>
                                    <?php $__currentLoopData = $levelPedas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($level->id); ?>" 
                                            <?php echo e(old('level_pedas_id', $produk->level_pedas_id) == $level->id ? 'selected' : ''); ?>>
                                            <?php echo e($level->nama_level); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['level_pedas_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <?php echo e($message); ?>

                                    </p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div>
                                <label for="kategori_id" class="block text-sm font-bold text-gray-700 mb-2">
                                    <i class="fas fa-tag text-blue-500"></i> Kategori <span class="text-red-500">*</span>
                                </label>
                                <select class="w-full px-4 py-3 border-2 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all <?php $__errorArgs = ['kategori_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php else: ?> border-gray-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                        id="kategori_id" 
                                        name="kategori_id"
                                        required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($kategori->id); ?>" 
                                            <?php echo e(old('kategori_id', $produk->kategori_id) == $kategori->id ? 'selected' : ''); ?>>
                                            <?php echo e($kategori->nama_kategori); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['kategori_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <?php echo e($message); ?>

                                    </p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        
                        <div class="mb-6">
                            <label for="deskripsi" class="block text-sm font-bold text-gray-700 mb-2">
                                <i class="fas fa-align-left text-gray-500"></i> Deskripsi <span class="text-red-500">*</span>
                            </label>
                            <textarea class="w-full px-4 py-3 border-2 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php else: ?> border-gray-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                      id="deskripsi" 
                                      name="deskripsi" 
                                      rows="5"
                                      placeholder="Jelaskan bahan, rasa, dan keunikan produk ini..."
                                      required><?php echo e(old('deskripsi', $produk->deskripsi)); ?></textarea>
                            <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <?php echo e($message); ?>

                                </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="harga" class="block text-sm font-bold text-gray-700 mb-2">
                                    <i class="fas fa-dollar-sign text-green-500"></i> Harga <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                        <span class="text-gray-500 font-semibold">Rp</span>
                                    </div>
                                    <input type="number" 
                                           class="w-full pl-12 pr-4 py-3 border-2 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all <?php $__errorArgs = ['harga'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php else: ?> border-gray-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="harga" 
                                           name="harga" 
                                           value="<?php echo e(old('harga', $produk->harga)); ?>"
                                           min="0"
                                           step="1000"
                                           placeholder="0"
                                           required>
                                </div>
                                <?php $__errorArgs = ['harga'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <?php echo e($message); ?>

                                    </p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div>
                                <label for="stok" class="block text-sm font-bold text-gray-700 mb-2">
                                    <i class="fas fa-boxes text-blue-500"></i> Stok <span class="text-red-500">*</span>
                                </label>
                                <input type="number" 
                                       class="w-full px-4 py-3 border-2 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all <?php $__errorArgs = ['stok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php else: ?> border-gray-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       id="stok" 
                                       name="stok" 
                                       value="<?php echo e(old('stok', $produk->stok)); ?>"
                                       min="0"
                                       placeholder="0"
                                       required>
                                <?php $__errorArgs = ['stok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <?php echo e($message); ?>

                                    </p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        
                        <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-200">
                            <button type="submit" 
                                    class="flex-1 bg-gradient-to-r from-indigo-600 to-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-indigo-700 hover:to-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                                <i class="fas fa-save"></i>
                                Update Produk
                            </button>
                            <a href="<?php echo e(route('admin.produk.index')); ?>" 
                               class="flex-1 bg-gray-100 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-200 flex items-center justify-center gap-2">
                                <i class="fas fa-times"></i>
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        <div class="lg:col-span-1 space-y-6">
            
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center gap-3">
                        <div class="bg-purple-100 p-2 rounded-lg">
                            <i class="fas fa-image text-purple-600"></i>
                        </div>
                        <h2 class="text-lg font-bold text-gray-800">Gambar Produk</h2>
                    </div>
                </div>

                <div class="p-6">
                    
                    <div class="mb-4">
                        <div class="relative group">
                            <?php if($produk->gambar): ?>
                                <img src="<?php echo e(asset('storage/' . $produk->gambar)); ?>" 
                                     alt="<?php echo e($produk->nama_produk); ?>" 
                                     class="w-full h-64 object-cover rounded-xl shadow-md"
                                     id="preview-image">
                                <div class="absolute top-3 right-3 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-semibold flex items-center gap-1 shadow-lg">
                                    <i class="fas fa-check-circle"></i>
                                    Gambar Tersimpan
                                </div>
                            <?php else: ?>
                                <div class="w-full h-64 bg-gradient-to-br from-gray-200 to-gray-300 rounded-xl flex items-center justify-center" id="preview-container">
                                    <div class="text-center">
                                        <i class="fas fa-image text-gray-400 text-5xl mb-3"></i>
                                        <p class="text-gray-500 font-medium">Tidak Ada Gambar</p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    
                    <form action="<?php echo e(route('admin.produk.update', $produk->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        
                        
                        <input type="hidden" name="nama_produk" value="<?php echo e($produk->nama_produk); ?>">
                        <input type="hidden" name="level_pedas_id" value="<?php echo e($produk->level_pedas_id); ?>">
                        <input type="hidden" name="kategori_id" value="<?php echo e($produk->kategori_id); ?>">
                        <input type="hidden" name="deskripsi" value="<?php echo e($produk->deskripsi); ?>">
                        <input type="hidden" name="harga" value="<?php echo e($produk->harga); ?>">
                        <input type="hidden" name="stok" value="<?php echo e($produk->stok); ?>">
                        
                        
                        <div class="mb-4">
                            <label class="block w-full cursor-pointer">
                                <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-indigo-500 transition-colors duration-200 bg-gray-50 hover:bg-indigo-50">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                    <p class="text-sm font-medium text-gray-600 mb-1">Klik untuk pilih gambar</p>
                                    <p class="text-xs text-gray-400" id="file-name">atau drag & drop di sini</p>
                                </div>
                                <input type="file" 
                                       class="hidden" 
                                       id="gambar" 
                                       name="gambar"
                                       accept="image/jpeg,image/png,image/jpg"
                                       onchange="previewImage(this)">
                            </label>
                            <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <?php echo e($message); ?>

                                </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-3 rounded-xl font-semibold hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                            <i class="fas fa-upload"></i>
                            Upload Gambar Baru
                        </button>
                    </form>
                    
                    
                    <div class="mt-4 bg-blue-50 border-l-4 border-blue-500 rounded-lg p-4">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-info-circle text-blue-500 mt-0.5"></i>
                            <div class="text-sm text-blue-700">
                                <p class="font-semibold mb-1">Informasi Upload:</p>
                                <ul class="list-disc list-inside space-y-1 text-xs">
                                    <li>Format: JPG, PNG</li>
                                    <li>Ukuran: Maksimal 2MB</li>
                                    <li>Rasio: 1:1 atau 4:3 (disarankan)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border-l-4 border-indigo-500">
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-indigo-100 p-2 rounded-lg">
                            <i class="fas fa-clock text-indigo-600"></i>
                        </div>
                        <h3 class="font-bold text-gray-800">Informasi Waktu</h3>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-xs font-semibold text-gray-500 mb-1">Dibuat Pada:</p>
                            <p class="text-sm font-bold text-gray-800">
                                <?php echo e($produk->created_at ? $produk->created_at->format('d M Y, H:i') : '-'); ?>

                            </p>
                        </div>
                        
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-xs font-semibold text-gray-500 mb-1">Terakhir Diupdate:</p>
                            <p class="text-sm font-bold text-gray-800">
                                <?php echo e($produk->updated_at ? $produk->updated_at->format('d M Y, H:i') : '-'); ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="bg-gradient-to-br from-red-500 to-orange-500 rounded-xl shadow-lg overflow-hidden">
                <div class="p-6 text-white">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-white bg-opacity-20 p-2 rounded-lg">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="font-bold">Status Produk</h3>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-orange-100 text-sm">Harga Jual:</span>
                            <span class="font-bold">Rp <?php echo e(number_format($produk->harga, 0, ',', '.')); ?></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-orange-100 text-sm">Stok Tersedia:</span>
                            <span class="font-bold"><?php echo e($produk->stok); ?> Unit</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-orange-100 text-sm">Status:</span>
                            <?php if($produk->stok > 5): ?>
                                <span class="px-3 py-1 bg-green-500 rounded-full text-xs font-bold">Stok Aman</span>
                            <?php elseif($produk->stok > 0): ?>
                                <span class="px-3 py-1 bg-yellow-500 rounded-full text-xs font-bold">Stok Rendah</span>
                            <?php else: ?>
                                <span class="px-3 py-1 bg-red-700 rounded-full text-xs font-bold">Habis</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
function previewImage(input) {
    const file = input.files[0];
    const fileNameElement = document.getElementById('file-name');
    
    if (file) {
        fileNameElement.textContent = file.name;
        
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewImage = document.getElementById('preview-image');
            if (previewImage) {
                previewImage.src = e.target.result;
            } else {
                const container = document.getElementById('preview-container');
                if (container) {
                    container.outerHTML = `<img src="${e.target.result}" alt="Preview" class="w-full h-64 object-cover rounded-xl shadow-md" id="preview-image">`;
                }
            }
        }
        reader.readAsDataURL(file);
    } else {
        fileNameElement.textContent = 'atau drag & drop di sini';
    }
}

const dropZone = document.querySelector('label');
if (dropZone) {
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, e => { e.preventDefault(); e.stopPropagation(); }, false);
    });

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => {
            dropZone.querySelector('div').classList.add('border-indigo-500', 'bg-indigo-50');
        }, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => {
            dropZone.querySelector('div').classList.remove('border-indigo-500', 'bg-indigo-50');
        }, false);
    });

    dropZone.addEventListener('drop', e => {
        const files = e.dataTransfer.files;
        document.getElementById('gambar').files = files;
        previewImage(document.getElementById('gambar'));
    }, false);
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\windows\Documents\joki skripsi\joki laporan\web\e-coomerce-seblak\resources\views/admin/produk/edit.blade.php ENDPATH**/ ?>