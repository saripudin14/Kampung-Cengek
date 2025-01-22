<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'harga' => 'required|string',
        'deskripsi' => 'nullable|string',
        'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Proses input harga
    $harga = str_replace('.', '', $request->harga); // Hapus titik pemisah ribuan
    $harga = str_replace(',', '.', $harga); // Ganti koma menjadi titik untuk desimal

    // Simpan data
    Product::create([
        'nama' => $request->nama,
        'harga' => (float) $harga,
        'deskripsi' => $request->deskripsi,
        'foto' => $request->file('foto')->store('images', 'public'),
    ]);

    return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
}

public function edit(Product $product)
{
    return view('products.edit', compact('product'));
}

public function update(Request $request, Product $product)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'harga' => 'required|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'deskripsi' => 'nullable|string',
    ]);

    // Proses input harga
    $harga = str_replace('.', '', $request->harga); // Hapus titik pemisah ribuan
    $harga = str_replace(',', '.', $harga); // Ganti koma menjadi titik untuk desimal

    $product->nama = $request->nama;
    $product->harga = (float) $harga;
    $product->deskripsi = $request->deskripsi;

    if ($request->hasFile('foto')) {
        // Delete old photo if it exists
        if ($product->foto && \Illuminate\Support\Facades\Storage::exists('public/' . $product->foto)) {
            \Illuminate\Support\Facades\Storage::delete('public/' . $product->foto);
        }

        // Store new photo
        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName());
        $product->foto = $foto->hashName();
    }

    $product->save();

    return redirect()->route('products.index')->with('success', 'Berhasil Memperbarui Produk Cuy');
}

public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index')->with('success', 'Berhasil Menghapus Produk Cuy.');
}

}
