@extends('layout.app')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <h5>Data User</h5>
                </div>
                <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @enderror
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @enderror

                    <table class="table table-bordered">
                        <thead>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th width="180">aksi</th>
                        </thead>
                        <tbody>
                            @forelse ( $user as $data )
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->username }}</td>
                                    <td>{{ $data->level }}</td>
                                    <td class="text-center text-nowarp">
                                        <form onsubmit="return confirm('hapus data user?')" action="{{ route('user.destroy', $data->id) }}" method="post">
                                            <a href="{{ route('user.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="8">Belum ada data user</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
        </div>
    </main>
@endsection
