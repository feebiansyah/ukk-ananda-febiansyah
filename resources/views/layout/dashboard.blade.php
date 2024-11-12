@extends('layout.app')
@section('content')


<main class="flex-shrink-0">
    <div class="container">
        <div class="card" style="margin-top:100px">
            <div class="card-header">
                <h5>Dashboard {{ Auth::user()->level == 'admin' ? 'Administrator' : 'kasir' }}</h5>
            </div>
            <div class="card-body">

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                    Selamat datang, {{ Auth::user()->name }}<br />
                    Anda Login Sebagai {{ Auth::user()->level }}

                    <form class="mt-3" action="{{ route('auth.logout') }}" method="post">
                        @csrf
                        <button class="btn btn-danger" type="submit">Logout</button>
                    </form>
            </div>
        </div>
    </div>
</main>

@endsection
