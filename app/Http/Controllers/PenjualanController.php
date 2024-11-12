<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    public function __construct()
    {
        if(!Auth::check()){
            abort(404);
        }
        session(['menu' => 'penjualan']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::getPenjualanWithPelanggan();
        return view('penjualan.index', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        $detail = DetailPenjualan::getDetailPenjualanWithProduk()->whereNull('penjualan_id');
        return view('penjualan.create', compact('pelanggan', 'detail'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validate_data = $request->validate([
            'pelanggan_id' => 'required',
            'total_harga' => 'required',
            'tanggal_penjualan' => 'required',
        ]);

        $penjualan = Penjualan::create($validate_data);

        $penjualan_id = $penjualan->id;
        $pdetail = DetailPenjualan::getDetailPenjualanWithProduk()->whereNull('penjualan_id');

        foreach($pdetail as $pd){
            $detail = DetailPenjualan::findOrFail($pd->id);
            $detail->update(['penjualan_id' => $penjualan_id]);
        }

        return redirect()->route('penjualan.index')->with(['success' => 'Berhasil menyimpan data penjualan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detail = DetailPenjualan::getDetailPenjualanWithProduk()->where('penjualan_id', '=', $id);
        return view('penjualan.show', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DetailPenjualan::deleteDetailPenjualanById($id);
        Penjualan::findOrFail($id)->delete();
        return redirect()->route('penjualan.index')->with(['success' => 'Berhasil menghapus data penjualan']);
    }
}
