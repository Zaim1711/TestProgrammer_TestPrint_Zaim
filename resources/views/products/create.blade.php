@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
    <h1 class="text-xl font-semibold mb-4">Tambah Produk</h1>

    <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Nama Produk -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nama Produk</label>
            <input type="text" name="nama_produk"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        <!-- Harga -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Harga</label>
            <input type="number" name="harga"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        <!-- Kategori -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Kategori</label>
            <select name="category_id" class="w-full border rounded px-3 py-2" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Status -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Status</label>
            <select name="status_id" class="w-full border rounded px-3 py-2" required>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}">
                        {{ ucfirst($status->nama_status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Button -->
        <div class="flex justify-end gap-2">
            <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Simpan
            </button>

            <a href="{{ route('products.index') }}"
               class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
