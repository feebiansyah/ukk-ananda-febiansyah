<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        Produk::create($validate_data);
        return redirect()->route('produk.index')->with(['success' => 'Data produk berhsil disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id0)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produk = Produk::findOrFail($id);
        $validate_data = $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        $produk->update($validate_data);
        return redirect()->route('produk.index')->with(['success' => 'Data produk berhsil diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk.index')->with(['success' => 'Data produk berhsil dihapus']);
    }

}
