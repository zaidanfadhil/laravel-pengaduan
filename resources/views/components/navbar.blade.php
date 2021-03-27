<header id="header">
    <div class="container d-flex align-items-center">

        <div class="logo mr-auto">
          <h1 class="text-light"><a href="/"><span> laporan pengaduan<span>.</span></a></h1>
        </div>


          <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li><a href="#about">About</a></li>
              <li><a href="#features">Features</a></li>
              <li><a href="#contact">Contact</a></li>

              {{-- @if (!Auth()->guard('masyarakat')->check())

              @endif --}}
              <li class="get-started"><a href="/login">Login</a></li>
              <li class="get-started"><a href="/petugas/login">admin</a></li>


            </ul>
          </nav>


    </header>


    <section id="hero">

        <div class="container">
          <div class="row d-flex align-items-center">
          <div class=" col-lg-6 py-5 py-lg-0 order-2 order-lg-1">
            <h1>Layanan Aspirasi Pengaduan Online Masyarakat</h1>
            <h2>Ayo Laporkan Aspirasi Pengaduan Anda!!!</h2>
            <a href="/login" class="btn-get-started scrollto">Yu Lapor</a>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img">
            <img src="Bocor/assets/img/hero-img.png" class="img-fluid" alt="">
          </div>
        </div>
        </div>

      </section>
