@extends('layouts.applogin')

@section('content')
<body style= "background : red">
  

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <div class="float-right">
          <a class="nav-link" href="/pengaduan">Laporkan</a>
          </div>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <div class="float-right">
          <a class="nav-link" href="/logout">Logout</a>
          </div>
            
      </div>
    </div>
  </nav>
<div class="container">
    <h2 class="text-center mt-3" style = "color : white">Laporan Pengaduan Masyarakat</h2>
    <div class="row mt-3">
        <div class="col-md-9 col-xl-12">
            @foreach($data_pengaduan as $pengaduan)
            <a href="laporan_pengaduan/detailLaporan/{{ $pengaduan->id }}">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p>{{ $pengaduan->tanggal_pengaduan }}</p>
                        <p><img src="/img/{{ $pengaduan->foto }}" width = "200"></p>
                        
                        <div>
                            <a href="{{ route('petugas.destroypengaduan',$pengaduan->id) }}" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </a>
                            <span class="font-weight-bold text-white bg-warning p-1">

                                @if($pengaduan->status == "proses")
                                <i class="fas fa-check"></i> Divalidasi
                                @elseif($pengaduan->status == "selesai")
                                <i class="fas fa-check-circle"></i> Diverifikasi
                                @else
                                belum divalidasi

                                @endif
                            </span>
                        </div>
                    </div>
                        <h4>{{ $pengaduan->isi_laporan }}</h4>
                        
                </div>
            </div>
        </a>
            @endforeach

        </div>
            
    </div>

    </div>
    </body>
@endsection

