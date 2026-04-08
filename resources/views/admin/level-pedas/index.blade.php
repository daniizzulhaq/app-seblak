{{-- resources/views/admin/level-pedas/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Kelola Level Pedas - Mamakoo')

@section('content')
<div class="container-fluid">
    {{-- Header Section --}}
    <div class="bg-gradient-to-r from-red-500 to-orange-500 rounded-2xl shadow-xl p-8 mb-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2 flex items-center">
                    🌶️ Kelola Level Pedas
                </h1>
                <p class="text-orange-100">Kelola tingkat kepedasan produk seblak <span class="font-bold">Mamakoo</span></p>
            </div>
            <a href="{{ route('admin.level-pedas.create') }}" 
               class="bg-white text-red-600 px-6 py-3 rounded-xl font-semibold hover:bg-red-50 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center gap-2">
                <i class="fas fa-plus"></i>
                <span>Tambah Level Pedas</span>
            </a>
        </div>
    </div>

    {{-- Success Alert --}}
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 rounded-lg p-4 mb-6 shadow-md animate-fade-in">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="bg-green-500 rounded-full p-2">
                        <i class="fas fa-check text-white"></i>
                    </div>
                    <div>
                        <p class="text-green-800 font-semibold">Berhasil!</p>
                        <p class="text-green-700 text-sm">{{ session('success') }}</p>
                    </div>
                </div>
                <button type="button" class="text-green-500 hover:text-green-700" 
                        onclick="this.parentElement.parentElement.remove()">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>
    @endif

    {{-- Error Alert --}}
    @if(session('error'))
        <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-4 mb-6 shadow-md animate-fade-in">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="bg-red-500 rounded-full p-2">
                        <i class="fas fa-times text-white"></i>
                    </div>
                    <div>
                        <p class="text-red-800 font-semibold">Gagal!</p>
                        <p class="text-red-700 text-sm">{{ session('error') }}</p>
                    </div>
                </div>
                <button type="button" class="text-red-500 hover:text-red-700" 
                        onclick="this.parentElement.parentElement.remove()">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>
    @endif

    {{-- Main Card --}}
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        {{-- Card Header --}}
        <div class="bg-gradient-to-r from-gray-50 to-orange-50 px-6 py-4 border-b border-gray-200">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="flex items-center gap-3">
                    <div class="bg-red-100 p-2 rounded-lg">
                        <i class="fas fa-list text-red-600"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-gray-800">Data Level Pedas</h2>
                        <p class="text-sm text-gray-500">Total: {{ $levelPedas->total() }} level</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium text-gray-700">
                        <i class="fas fa-filter mr-2"></i>Filter
                    </button>
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium text-gray-700">
                        <i class="fas fa-download mr-2"></i>Export
                    </button>
                </div>
            </div>
        </div>

        {{-- Table Section --}}
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">No</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Level Pedas</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Jumlah Produk</th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($levelPedas as $index => $level)
                        <tr class="hover:bg-orange-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-900">{{ $levelPedas->firstItem() + $index }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    {{-- Icon berubah warna sesuai urutan --}}
                                    <div class="bg-gradient-to-br from-red-100 to-orange-100 w-12 h-12 rounded-lg flex items-center justify-center shadow-md text-2xl">
                                        @if($index === 0) 😊
                                        @elseif($index === 1) 🌶️
                                        @elseif($index === 2) 🔥
                                        @else 💀
                                        @endif
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">{{ $level->nama_level }}</p>
                                        <p class="text-xs text-gray-500">ID: #{{ $level->id }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-2">
                                    <span class="text-lg">🍜</span>
                                    <span class="px-3 py-1 text-sm font-bold rounded-full bg-orange-100 text-orange-700">
                                        {{ $level->produks_count }} Produk
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    {{-- Detail Button --}}
                                    <button class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors duration-200 group" title="Detail">
                                        <i class="fas fa-eye group-hover:scale-110 transition-transform"></i>
                                    </button>

                                    {{-- Edit Button --}}
                                    <a href="{{ route('admin.level-pedas.edit', $level) }}" 
                                       class="p-2 bg-yellow-50 text-yellow-600 rounded-lg hover:bg-yellow-100 transition-colors duration-200 group"
                                       title="Edit">
                                        <i class="fas fa-edit group-hover:scale-110 transition-transform"></i>
                                    </a>

                                    {{-- Delete Button --}}
                                    <form action="{{ route('admin.level-pedas.destroy', $level) }}" 
                                          method="POST" 
                                          class="inline"
                                          onsubmit="return confirm('⚠️ Yakin ingin menghapus level ini?\n\nNama: {{ $level->nama_level }}\nJumlah Produk: {{ $level->produks_count }}\n\nData yang dihapus tidak dapat dikembalikan!')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors duration-200 group"
                                                title="Hapus">
                                            <i class="fas fa-trash group-hover:scale-110 transition-transform"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12">
                                <div class="text-center">
                                    <div class="text-6xl mb-4">🌶️</div>
                                    <p class="text-gray-600 font-semibold mb-2">Belum ada level pedas</p>
                                    <p class="text-gray-400 text-sm mb-4">Mulai tambahkan level pedas untuk produk Mamakoo</p>
                                    <a href="{{ route('admin.level-pedas.create') }}" 
                                       class="inline-flex items-center gap-2 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                                        <i class="fas fa-plus"></i>
                                        Tambah Level Pedas
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($levelPedas->hasPages())
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="text-sm text-gray-600">
                    Menampilkan <span class="font-semibold text-gray-900">{{ $levelPedas->firstItem() }}</span> 
                    sampai <span class="font-semibold text-gray-900">{{ $levelPedas->lastItem() }}</span> 
                    dari <span class="font-semibold text-gray-900">{{ $levelPedas->total() }}</span> data
                </div>
                <div>
                    {{ $levelPedas->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<style>
@keyframes fade-in {
    from { opacity: 0; transform: translateY(-10px); }
    to   { opacity: 1; transform: translateY(0); }
}
.animate-fade-in { animation: fade-in 0.3s ease-out; }
</style>
@endsection