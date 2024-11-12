@extends('layout.app')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <h5>Data Produk</h5>
                </div>
                <div class="card-body">
                    @php
                        $total_harga = 0;
                    @endphp
                    <table class="table table-bordered">
                        <thead>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Harga Satuan</th>
                            <th>Subtotal</th>
                            
                        </thead>
                        <tbody>
                            @forelse ( $detail as $data )
                                <tr>
                                    <td>{{ $data->nama_produk }}</td>
                                    <td>{{ $data->jumlah_produk }}</td>
                                    <td class="text-end">{{ number_format($data->harga) }}</td>
                                    <td class="text-end">{{ number_format($data->subtotal) }}</td> 
                                </tr>
                                @php
                                    $total_harga += $data->subtotal;
                                @endphp
                            @empty
                                <td colspan="8">Belum ada data produk</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('penjualan.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </main>
@endsection
