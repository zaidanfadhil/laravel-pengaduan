
<header id="header" class="fixed-top">
    <div class="container">
      <div class="row">
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
          </div>
    </div>
  </header><!-- #header -->

  <section id="intro" class="clearfix">
    <div class="container" data-aos="fade-up">

      <div class="intro-img" data-aos="zoom-out" data-aos-delay="200">
        <img src="{{ asset('img/logopengaduan.png')}}" alt="" height="500px" class="img-fluid">
      </div>

      <div class="intro-info" data-aos="zoom-in" data-aos-delay="100">
        <h2>We provide<br><span>solutions</span><br>for your business!</h2>
        <div>
          <a href="#about" class="btn-get-started scrollto">Get Started</a>
          <a href="#services" class="btn-services scrollto">Our Services</a>
        </div>
      </div>

    </div>
    <!-- <img src="{{ asset('img/kisspng-product-design-brand-logo-font-claim-rade-garage-5b7fa9d62ab7f8.318210391535093206175.png')}}" alt="" height="300px"> -->
  </section><!-- End Intro Section -->



