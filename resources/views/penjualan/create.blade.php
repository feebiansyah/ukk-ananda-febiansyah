@extends('layout.app')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <h5>Detail Produk</h5>
                </div>
                <div class="card-body">
                    @php
                        $total_harga = 0;
                    @endphp
                    <table class="table table-bordered">
                        <thead>
                            <th>Produk</th>
                            <th width="150">Jumlah</th>
                            <th width="150">Harga Satuan</th>
                            <th width="150">Subtotal</th>
                        </thead>
                        <tbody>
                            @forelse ($detail as $dt)
                                <tr>
                                    <td>{{ $dt->nama_produk }}</td>
                                    <td>{{ $dt->jumlah_produk }}</td>
                                    <td class="text-end">{{ number_format($dt->harga) }}</td>
                                    <td class="text-end">{{ number_format($dt->subtotal) }}</td>
                                </tr>
                                @php
                                    $total_harga += $dt->subtotal;
                                @endphp
                            @empty
                                <td colspan="8">Data detail masih kosong</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="card" style="margin-top: 10px;">
                <div class="card-header">
                    <h5>Simpan Penjualan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('penjualan.store') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label  class="col-sm-2 form-label">Nama Pelanggan:</label>
                            <div class="col-sm-10">
                                <select name="pelanggan_id" class="form-select">
                                    <option value="">-- PILIH PELANGGAN --</option>
                                    @foreach ($pelanggan as $dp )
                                    <option value="{{ $dp->id }}">{{ $dp->nama_pelanggan }}</option>
                                    @endforeach
                                </select>
                                @error('pelanggan_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 form-label">Total Harga:</label>
                            <div class="col-sm-10">
                                <input type="number" name="total_harga" value="{{ old('total_harga', round($total_harga)) }}" class="form-control" readonly>
                                @error('total_harga')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 form-label">
                                Tanggal Penjualan:</label>
                            <div class="col-sm-10">
                                <input type="date" name="tanggal_penjualan" value="{{ old('tanggal_penjualan') }}" class="form-control ">
                                @error('tanggal_penjualan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                <a href="{{ route('detail.index') }}" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </div>
    </main>
@endsection
