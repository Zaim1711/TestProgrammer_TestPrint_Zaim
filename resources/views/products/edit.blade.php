@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Edit Produk</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama Produk -->
        <div class="mb-4">
            <label class="block text-sm font-medium">Nama Produk</label>
            <input type="text" name="nama_produk"
                   value="{{ old('nama_produk', $product->nama_produk) }}"
                   class="w-full mt-1 border rounded px-3 py-2" required>
        </div>

        <!-- Harga -->
        <div class="mb-4">
            <label class="block text-sm font-medium">Harga</label>
            <input type="number" name="harga"
                   value="{{ old('harga', $product->harga) }}"
                   class="w-full mt-1 border rounded px-3 py-2" required>
        </div>

        <!-- Kategori -->
        <div class="mb-4">
            <label class="block text-sm font-medium">Kategori</label>
            <select name="category_id" class="w-full mt-1 border rounded px-3 py-2" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Status -->
        <div class="mb-4">
            <label class="block text-sm font-medium">Status</label>
            <select name="status_id" class="w-full mt-1 border rounded px-3 py-2" required>
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}"
                        {{ $product->status_id == $status->id ? 'selected' : '' }}>
                        {{ $status->nama_status }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Button -->
        <div class="flex justify-end gap-2">
            <a href="{{ route('products.index') }}"
               class="px-4 py-2 bg-gray-200 rounded">
                Batal
            </a>

            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
