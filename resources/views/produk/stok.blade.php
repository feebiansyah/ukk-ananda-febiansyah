@extends('layout.app')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <h5>Stok Produk</h5>
                </div>
                <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @enderror
                    <table class="table table-bordered">
                        <thead>
                            <th>Nama Produk</th>
                            <th width="200">Harga Satuan</th>
                            <th width="120">Stok Awal</th>
                            <th width="120">Terjual</th>
                            <th width="120">Stok Akhir</th>
                            <th width="180">aksi</th>
                        </thead>
                        <tbody>
                            @forelse ( $stok as $data )
                                <tr>
                                    <td>{{ $data->nama_produk }}</td>
                                    <td class="text-end">{{ number_format($data->harga) }}</td>
                                    <td class="text-end">{{ number_format($data->stok) }}</td>
                                    <td class="text-end">{{ number_format($data->terjual) }}</td>
                                    <td class="text-end">{{ number_format($data->stok - $data->terjual ) }}</td>
                                    <td class="text-center text-nowarp">
                                        <form onsubmit="return confirm('hapus data produk ini?')" action="{{ route('produk.destroy', $data->id) }}" method="post">
                                            <a href="{{ route('produk.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="8">Belum ada data</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
        </div>
    </main>
@endsection
