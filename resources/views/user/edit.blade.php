@extends('layout.app')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <h5>Data User</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label">Nama:</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label  class="col-sm-2 form-label">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label  class="col-sm-2 form-label">Username:</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" value="{{ old('username', $user->username) }}" class="form-control">
                                @error('username')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label  class="col-sm-2 form-label">Password:</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label  class="col-sm-2 form-label">Level:</label>
                            <div class="col-sm-10">
                                <select name="level" class="form-select">
                                    <option value="">-- PILIH LEVEL --</option>
                                    <option @if($user->level == 'admin') selected @endif value="admin">Administrator</option>
                                    <option @if($user->level == 'kasir') selected @endif value="kasir">Kasir</option>
                                </select>
                                @error('level')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    <a href="{{ route('user.index') }}" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </div>
    </main>
@endsection
