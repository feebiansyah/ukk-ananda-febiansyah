<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index',compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
        ]);

        Pelanggan::create($validate_data);
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil di tambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate_data = $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required'
        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($validate_data);
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil di hapus');
    }
}
