@extends('layout.app')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <h5>Data Produk</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('produk.update', $produk->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label">Nama Produk:</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" class="form-control">
                                @error('nama_produk')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label  class="col-sm-2 form-label">Harga:</label>
                            <div class="col-sm-10">
                                <input type="text" name="harga" value="{{ old('harga', $produk->harga) }}" class="form-control">
                                @error('harga')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label  class="col-sm-2 form-label">Stok:</label>
                            <div class="col-sm-10">
                                <input type="text" name="stok" value="{{ old('stok', $produk->stok) }}" class="form-control">
                                @error('stok')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    <a href="{{ route('produk.index') }}" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </div>
    </main>
@endsection
