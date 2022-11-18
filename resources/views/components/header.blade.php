<nav class="navbar navbar-dark bg-green">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">{{Auth::user()->name ?? "Home Page"}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/obat">Obat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/supplier">Data Supplier</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/user">Data Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/transaksi">Transaksi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ Auth::user() ? '/logout':'/login'}}" class="nav-link active" aria-current="page">{{ Auth::user() ? 'Logout' :'Login'}}</a></li>
        </li>
    </div>
  </div>
</nav>