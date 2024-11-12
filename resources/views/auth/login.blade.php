@extends('layout.app')
@section('content')

    <main class="flex-shrink-0">
        <div class="container">

            @if (Session::has('pesan'))
                <div class="alert alert-danger mt-4">{{ Session::get('pesan') }}</div>
            @endif

            <div class="card" style="margin-top: 50px">
                <div class="card-header">
                    <h5>Login</h5>
                </div>
                <div class="card-body">

                    <form action="{{ route('auth.proses') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" value="{{ old('username') }}" class="form-control">
                                @error('username')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control">
                                @error('password')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-level">Level</label>
                            <div class="col-sm-10">
                                <select name="level" id="" class="form-select">
                                    <option value="">-- PILIH LEVEL --</option>
                                    <option value="admin">Administrator</option>
                                    <option value="kasir">Kasir</option>
                                </select>
                                @error('level')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection
