<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Status;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
     $products = Product::with(['category', 'status'])
        ->whereHas('status', function ($query){
            $query->where('nama_status', 'bisa dijual');
        })->get();

        return view('products.index', compact('products'));   //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'status_id' => 'required|exists:statuses,id',
        ]);
        Product::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'category_id' => $request->category_id,
            'status_id' => $request->status_id,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $statuses = Status::all();
        

        return view('products.edit', compact('product','categories','statuses'));
    }

    public function destroy(Product $product)
    {
        
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
        'nama_produk' => 'required|string|max:255',
        'harga' => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,id',
        'status_id' => 'required|exists:statuses,id',
    ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diperbarui');
    }

    public function create()
    {
        return view('products.create', [
            'categories' => Category::all(),
            'statuses'   => Status::all(),
        ]);
    }


}
