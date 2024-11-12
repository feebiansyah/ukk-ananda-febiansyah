<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\Auth;

class DetailPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        if (!Auth::check()) {
            abort(404);
        }
        session(['menu' => 'penjualan']);
    }
    public function index()
    {
        $detail = DetailPenjualan::getDetailPenjualanWithProduk()->whereNull('penjualan_id');
        return view('detail.index', compact('detail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk = Produk::all();
        return view('detail.create', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
         $validate_data = $request->validate([
            'produk_id' => 'required',
            'jumlah_produk' => 'required',
        ]);
        $produk = Produk::findOrFail($request->produk_id);

        $stok = Produk::getStokProduk()->where('id', $produk->id);
        

        foreach($stok as $data){
            $produk_stok = $data;
        }

        $stok_awal = $produk_stok->stok;
        $terjual = $produk_stok->terjual;
        
        
        $stok_akhir = $stok_awal - $terjual;
        
        if($request->jumlah_produk > $stok_akhir || $request->jumlah_produk > $produk->stok)   {
            return back()->with('message', 'jumlah dibeli melebihi jumlah stok produk');
        }
        

        $validate_data['subtotal'] = $request->jumlah_produk * $produk->harga;
        

        DetailPenjualan::create($validate_data);
        return redirect()->route('detail.index')->with(['success' => 'berhasil menambahkan item produk']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::all();
        $detail = DetailPenjualan::findOrFail($id);

        return view('detail.edit', compact('produk', 'detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'produk_id' => 'required',
            'jumlah_produk' => 'required',

        ]);

        $produk = Produk::findOrFail($request->produk_id);
        $detail = DetailPenjualan::findOrFail($id);

        $detail->update([
            'produk_id' => $request->produk_id,
            'jumlah_produk' => $request->jumlah_produk,
            'subtotal' => ($request->jumlah_produk * $produk->harga)
        ]);

        return redirect()->route('detail.index')->with(['success' => 'berhasil mengubah item produk']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detail = DetailPenjualan::findOrFail($id);
        $detail->delete();
        return redirect()->route('detail.index')->with(['success' => 'berhasil menghapus item produk']);
    }
}
