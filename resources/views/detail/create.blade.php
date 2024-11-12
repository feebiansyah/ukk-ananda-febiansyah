@extends('layout.app')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <h5>Tambah Penjualan</h5>
                </div>
                <div class="card-body">

                    @if(Session::has('message'))
                        <div class="alert alert-danger">{{ Session::get('message') }}</div>
                    @endif
                    
                    <form action="{{ route('detail.store') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label">Nama Produk:</label>
                            <div class="col-sm-10">
                                <select name="produk_id" class="form-control form-select">
                                    <option value="">-- PILIH PRODUK --</option>
                                    @foreach($produk as $dp)
                                    <option value="{{ $dp->id }}">{{ $dp->nama_produk }}</option>
                                    @endforeach
                                </select>
                                @error('produk_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label  class="col-sm-2 form-label">Jumlah Beli:</label>
                            <div class="col-sm-10">
                                <input type="text" name="jumlah_produk" value="{{ old('jumlah_produk') }}" class="form-control">
                                @error('jumlah_produk')
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
