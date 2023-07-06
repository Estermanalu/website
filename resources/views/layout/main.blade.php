<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SiAP - Sistem Absensi Pegawai</title>
  <link href="{{ asset('/') }}assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('/') }}assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-info navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Website</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ (request()->segment('1')=='' || request()->segment('1')== 'home') ? 'active' : '' }}" aria-current="page" href="{{ url('home') }}">
              <i class="fas fa-tachometer-alt"></i> HOME
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->segment('1')== 'mahasiswa' ? 'active' : '' }}" aria-current="page" href="{{ url('mahasiswas') }}">
              <i class="fas fa-user"></i> Pegawai
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <script src="{{ asset('/') }}assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>