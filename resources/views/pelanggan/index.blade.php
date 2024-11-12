@extends('layout.app')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <h5>Data Pelanggan</h5>
                </div>
                <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @enderror
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @enderror
                    <table class="table table-bordered">
                        <thead>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th width="180">aksi</th>
                        </thead>
                        <tbody>
                            @forelse ( $pelanggan as $data )
                                <tr>
                                    <td>{{ $data->nama_pelanggan }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->nomor_telepon }}</td>
                                    <td class="text-center text-nowarp">
                                        <form onsubmit="return confirm('hapus data pelanggan?')" action="{{ route('pelanggan.destroy', $data->id) }}" method="post">
                                            <a href="{{ route('pelanggan.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="8">Belum ada data Pelanggan</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
        </div>
    </main>
@endsection
