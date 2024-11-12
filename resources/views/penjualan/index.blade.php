@extends('layout.app')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <h5>Data Penjualan</h5>
                </div>
                <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @enderror
                    <table class="table table-bordered">
                        <thead>
                            <th width="150">Tanggal</th>
                            <th width="200">Nama Pelanggan</th>
                            <th width="150">Total Harga</th>
                            <th width="120">aksi</th>
                        </thead>
                        <tbody>
                            @forelse ( $penjualan as $data )
                                <tr>
                                    <td>{{ $data->tanggal_penjualan }}</td>
                                    <td>{{ $data->nama_pelanggan }}</td>
                                    <td class="text-end">Rp.{{ number_format($data->total_harga) }}</td>
                                    <td class="text-center text-nowarp">
                                        <form onsubmit="return confirm('hapus data penjualan ini?')" action="{{ route('penjualan.destroy', $data->id) }}" method="post">
                                            <a href="{{ route('penjualan.show', $data->id) }}" class="btn btn-primary btn-sm">detail</a>
                                          
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="8">Data penjualan masih kosong</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('detail.index') }}" class="btn btn-primary">penjualan baru</a>
                </div>
            </div>
        </div>
    </main>
@endsection
