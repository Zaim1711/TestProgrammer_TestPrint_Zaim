@extends('layouts.app')


@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">


    <h1 class="text-2xl font-bold mb-6">📦 Data Produk Fastprint</h1>

    <x-tambah-produk />

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full table-auto divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Nama Produk</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Harga</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Kategori</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-2 font-medium">{{ $product->nama_produk }}</td>
                             <td class="p-2 whitespace-nowrap">
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <span class="px-3 py-1 rounded-full text-xs bg-blue-100 text-blue-700">
                                    {{ $product->category->nama_kategori }}
                                </span>
                            </td>
                        <td class="p-2 whitespace-nowrap">
                            <span class="px-3 py-1 rounded-full text-xs
                            {{ $product->status->nama_status === 'bisa dijual'
                                ? 'bg-green-100 text-green-700'
                                : 'bg-red-100 text-red-700' }}">
                                {{ ucfirst($product->status->nama_status) }}
                            </span>
                        </td>
                        <td class="px-20 py-2 space-x-2">
                           <div class="flex gap-2">
                             <!-- EDIT -->
                            <a href="{{ route('products.edit', $product->id) }}"
                            class="inline-flex items-center px-3 py-1 text-xs font-medium text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                Edit
                            </a>
                            
                            <x-delete-produk :productId="$product->id"/>
                           </div>
                        </td>
                        </td>
                    </tr>
                @empty
            <tr>
                <td colspan="4" class="px-6 py-6 text-center text-gray-500">Data produk kosong</td>
            </tr>
            @endforelse
            </tbody>
        </table>

<x-succes-modal /> 
<x-delete-modal />      
@endsection

