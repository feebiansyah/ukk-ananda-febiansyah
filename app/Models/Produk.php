<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{

    protected $table = 'produk';
    protected $fillable = ['nama_produk', 'harga', 'stok'];

    public static function getStokProduk()
    {
        return DB::table('produk')
                    ->leftJoin('detail_penjualan', 'detail_penjualan.produk_id', '=', 'produk.id')
                    ->selectRaw('SUM(detail_penjualan.jumlah_produk) as terjual, produk.*')
                    ->groupBy('produk_id', 'produk.nama_produk')
                    ->get();
            
    }
}
