<header>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Aplikasi Kasir</a>



            @if(Auth::check())
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}"  href="/dashboard">Dashboard</a>
                    </li>

                    @if(Auth::user()->level == "admin")

                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('user*') ? 'active' : '' }}" href="/user">Data User</a>
                    </li>

                    @endif

                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('pelanggan*') ? 'active' : '' }}" href="/pelanggan">Data Pelanggan</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('produk*') ? 'active' : '' }}" href="/produk">Data Produk</a>
                    </li>

                    @if(Auth::user()->level == "kasir")
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('penjualan*') ? 'active' : '' }}" href="/penjualan">Data Penjualan</a>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('stok*') ? 'active' : '' }}" href="/stok">Stok Produk</a>
                    </li>

                </ul>
            </div>
            @endif
        </div>
    </nav>
</header>

