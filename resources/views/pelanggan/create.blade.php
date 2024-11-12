@extends('layout.app')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <h5>Data Pelanggan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('pelanggan.store') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label">Nama Pelanggan:</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}" class="form-control">
                                @error('nama_pelanggan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label  class="col-sm-2 form-label">Alamat:</label>
                            <div class="col-sm-10">
                                <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control">
                                @error('alamat')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label  class="col-sm-2 form-label">Nomor Telepon:</label>
                            <div class="col-sm-10">
                                <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon') }}" class="form-control">
                                @error('nomor_telepon')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </div>
    </main>
@endsection
