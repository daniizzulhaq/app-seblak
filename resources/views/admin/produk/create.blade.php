@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
<div class="container-fluid">
    {{-- Header Section --}}
    <div class="bg-gradient-to-r from-red-500 to-orange-500 rounded-2xl shadow-xl p-8 mb-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2 flex items-center">
                    <i class="fas fa-plus-circle mr-3"></i>
                    Tambah Produk
                </h1>
                <p class="text-orange-100">Tambahkan produk seblak baru ke <span class="font-bold">Mamakoo</span></p>
            </div>
            <a href="{{ route('admin.produk.index') }}" 
               class="bg-white text-red-600 px-6 py-3 rounded-xl font-semibold hover:bg-red-50 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center gap-2">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Form Section --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                {{-- Card Header --}}
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center gap-3">
                        <div class="bg-blue-100 p-2 rounded-lg">
                            <i class="fas fa-info-circle text-blue-600"></i>
                        </div>
                        <h2 class="text-lg font-bold text-gray-800">Informasi Produk</h2>
                    </div>
                </div>

                {{-- Form Body --}}
                <div class="p-6">
                    <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Nama Produk --}}
                        <div class="mb-6">
                            <label for="nama_produk" class="block text-sm font-bold text-gray-700 mb-2">
                                Nama Produk <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   class="w-full px-4 py-3 border-2 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all @error('nama_produk') border-red-500 @else border-gray-300 @enderror" 
                                   id="nama_produk" 
                                   name="nama_produk" 
                                   value="{{ old('nama_produk') }}"
                                   placeholder="Contoh: Seblak Original, Seblak Ceker, Seblak Keju"
                                   required>
                            @error('nama_produk')
                                <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Level Pedas & Kategori --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="level_pedas_id" class="block text-sm font-bold text-gray-700 mb-2">
                                    <i class="fas fa-fire text-red-500"></i> Level Pedas <span class="text-red-500">*</span>
                                </label>
                                <select class="w-full px-4 py-3 border-2 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all @error('level_pedas_id') border-red-500 @else border-gray-300 @enderror" 
                                        id="level_pedas_id" 
                                        name="level_pedas_id"
                                        required>
                                    <option value="">-- Pilih Level Pedas --</option>
                                    @foreach($levelPedas as $level)
                                        <option value="{{ $level->id }}" {{ old('level_pedas_id') == $level->id ? 'selected' : '' }}>
                                            {{ $level->nama_level }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('level_pedas_id')
                                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="kategori_id" class="block text-sm font-bold text-gray-700 mb-2">
                                    <i class="fas fa-tag text-blue-500"></i> Kategori <span class="text-red-500">*</span>
                                </label>
                                <select class="w-full px-4 py-3 border-2 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all @error('kategori_id') border-red-500 @else border-gray-300 @enderror" 
                                        id="kategori_id" 
                                        name="kategori_id"
                                        required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                            {{ $kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-6">
                            <label for="deskripsi" class="block text-sm font-bold text-gray-700 mb-2">
                                <i class="fas fa-align-left text-gray-500"></i> Deskripsi <span class="text-red-500">*</span>
                            </label>
                            <textarea class="w-full px-4 py-3 border-2 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all @error('deskripsi') border-red-500 @else border-gray-300 @enderror" 
                                      id="deskripsi" 
                                      name="deskripsi" 
                                      rows="5"
                                      placeholder="Jelaskan bahan, rasa, dan keunikan produk ini..."
                                      required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Harga & Stok --}}
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
                                           class="w-full pl-12 pr-4 py-3 border-2 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all @error('harga') border-red-500 @else border-gray-300 @enderror" 
                                           id="harga" 
                                           name="harga" 
                                           value="{{ old('harga') }}"
                                           min="0"
                                           step="1000"
                                           placeholder="0"
                                           required>
                                </div>
                                @error('harga')
                                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="stok" class="block text-sm font-bold text-gray-700 mb-2">
                                    <i class="fas fa-boxes text-blue-500"></i> Stok <span class="text-red-500">*</span>
                                </label>
                                <input type="number" 
                                       class="w-full px-4 py-3 border-2 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all @error('stok') border-red-500 @else border-gray-300 @enderror" 
                                       id="stok" 
                                       name="stok" 
                                       value="{{ old('stok') }}"
                                       min="0"
                                       placeholder="0"
                                       required>
                                @error('stok')
                                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-200">
                            <button type="submit" 
                                    class="flex-1 bg-gradient-to-r from-red-500 to-orange-500 text-white px-6 py-3 rounded-xl font-semibold hover:from-red-600 hover:to-orange-600 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                                <i class="fas fa-save"></i>
                                Simpan Produk
                            </button>
                            <a href="{{ route('admin.produk.index') }}" 
                               class="flex-1 bg-gray-100 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-200 flex items-center justify-center gap-2">
                                <i class="fas fa-times"></i>
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Sidebar Section --}}
        <div class="lg:col-span-1 space-y-6">
            {{-- Image Upload Card --}}
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
                    {{-- Image Preview --}}
                    <div class="mb-4">
                        <div id="preview-container" class="w-full h-64 bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl flex items-center justify-center">
                            <div class="text-center" id="preview-placeholder">
                                <div class="text-5xl mb-3">🍜</div>
                                <p class="text-gray-500 font-medium text-sm">Preview gambar</p>
                            </div>
                            <img src="" alt="Preview" 
                                 class="w-full h-64 object-cover rounded-xl shadow-md hidden" 
                                 id="preview-image">
                        </div>
                    </div>

                    {{-- File Input --}}
                    <div class="mb-4">
                        <label class="block w-full cursor-pointer">
                            <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-red-400 transition-colors duration-200 bg-gray-50 hover:bg-red-50" id="drop-zone">
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
                        @error('gambar')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Info Alert --}}
                    <div class="bg-blue-50 border-l-4 border-blue-500 rounded-lg p-4">
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

            {{-- Tips Card --}}
            <div class="bg-gradient-to-br from-red-500 to-orange-500 rounded-xl shadow-lg overflow-hidden">
                <div class="p-6 text-white">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-white bg-opacity-20 p-2 rounded-lg">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3 class="font-bold">Tips Pengisian</h3>
                    </div>
                    <ul class="space-y-2 text-sm text-orange-100">
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-white mt-0.5"></i>
                            Nama produk singkat & mudah diingat
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-white mt-0.5"></i>
                            Deskripsi mencakup bahan & keunikan
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-white mt-0.5"></i>
                            Foto produk yang menarik & terang
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-white mt-0.5"></i>
                            Pastikan harga & stok sudah benar
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Image Preview Script --}}
<script>
function previewImage(input) {
    const file = input.files[0];
    const fileNameElement = document.getElementById('file-name');
    const previewImage = document.getElementById('preview-image');
    const previewPlaceholder = document.getElementById('preview-placeholder');

    if (file) {
        fileNameElement.textContent = file.name;

        const reader = new FileReader();
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            previewImage.classList.remove('hidden');
            previewPlaceholder.classList.add('hidden');
        }
        reader.readAsDataURL(file);
    } else {
        fileNameElement.textContent = 'atau drag & drop di sini';
        previewImage.classList.add('hidden');
        previewPlaceholder.classList.remove('hidden');
    }
}

// Drag & drop
const dropZone = document.getElementById('drop-zone');
if (dropZone) {
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, e => { e.preventDefault(); e.stopPropagation(); }, false);
    });

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => {
            dropZone.classList.add('border-red-400', 'bg-red-50');
        }, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => {
            dropZone.classList.remove('border-red-400', 'bg-red-50');
        }, false);
    });

    dropZone.addEventListener('drop', e => {
        const files = e.dataTransfer.files;
        const input = document.getElementById('gambar');
        input.files = files;
        previewImage(input);
    }, false);
}
</script>
@endsection