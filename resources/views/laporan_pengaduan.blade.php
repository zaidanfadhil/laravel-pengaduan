@extends('layouts.applogin')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout">Pricing</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown link
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<div class="container">
    <h2 class="text-center mt-3">Laporan Pengaduan Masyarakat</h2>
    <div class="row mt-3">
        <div class="col-md-9 col-xl-12">
            @foreach($data_pengaduan as $pengaduan)
            <a href="laporan_pengaduan/detailLaporan/{{ $pengaduan->id }}">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p>{{ $pengaduan->tanggal_pengaduan }}</p>
                        <p><img src="/img/{{ $pengaduan->foto }}"></p>
                        <p class="font-weight-bold text-white bg-warning p-1">

                            @if($pengaduan->status == "proses")
                            <i class="fas fa-check"></i> Divalidasi
                            @elseif($pengaduan->status == "selesai")
                            <i class="fas fa-check-circle"></i> Diverifikasi
                            @else
                            belum divalidasi

                            @endif
                        </p>

                    </div>
                        <h4>{{ $pengaduan->isi_laporan }}</h4>
                </div>
            </div>
        </a>
            @endforeach

        </div>

    </div>

    </div>
@endsection

