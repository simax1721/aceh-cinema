<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aceh Cinema</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    {{-- css --}}
    <link rel="stylesheet" href="{{ url('/assets/css/style.css') }}">

    <!-- Optional JS libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <script src="https://kit.fontawesome.com/b69e31cf66.js" crossorigin="anonymous"></script>
    @stack('styles')
</head>
<body>

  <nav class="navbar navbar-dark navbar-expand-md nav-costum-bg sticky-top">
      <div class="w-100 d-flex justify-content-between align-items-center" id="navbarNav">
        <div class="d-flex align-items-center">
          {{-- <a class="navbar-brand desktop-logo" href="/">
            <img src="{{ url('/assets/img/nav-logo.png') }}" alt="aceh cinema logo" width="25" class="">
          </a> --}}
          <a class="navbar-brand mobile-logo" href="/">
            <img src="{{ url('/assets/img/hero-section-logo.png') }}" alt="aceh cinema logo" height="30" class="">    
          </a>

        </div>
        <div class="d-flex align-items-center">
          <ul class="navbar-nav" id="nav-left-menu" >
            <li class="nav-item">
              <a class="nav-link nav-link-costume nav-link-costume-menu" aria-current="page" href="/">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-costume nav-link-costume-menu" href="{{ url('/section-movie/fiction') }}">Fiksi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-costume nav-link-costume-menu" href="{{ url('/section-movie/documentary') }}">Dokumentari</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-costume nav-link-costume-menu" href="#">Favoritku</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-costume" href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-costume" href="#"><i class="fa-solid fa-regular fa-bell"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-costume" href="#"><i class="fa-regular fa-circle-user"></i></a>
            </li>
          </ul>
          {{-- <div class="search-box mx-3">
            <input type="text" class="w-100" id="search" name="search">
            <i class="fa-solid fa-magnifying-glass search-icon"></i>
          </div> --}}
          {{-- <a href="#" class="user-profile d-flex align-items-center" style="margin-right: 5px">
            <i class="fa-solid fa-magnifying-glass"></i>
          </a>
          <a href="#" class="user-profile d-flex align-items-center" style="margin-right: 5px">
            <i class="fa-solid fa-regular fa-bell"></i>
          </a>
          <a href="#" class="user-profile d-flex align-items-center">
            <i class="fa-regular fa-circle-user"></i> <span style="font-size: 16px; margin-left: 5px"> User</span>
          </a> --}}
        </div>
      </div>
  </nav>

  <div class="navbar-bottom">
    <div class="container-fluid d-flex justify-content-between" id="nav-bottom-menu">
      
        <a href="/" class="nav-bottom-link">
          <i class="fa-solid fa-house"></i>
          <br>
          <span>Beranda</span>
        </a>
        <a href="{{ url('/section-movie/1') }}" class="nav-bottom-link">
          <i class="fa-solid fa-film"></i>
          <br>
          <span>Fiksi</span>
        </a>
        <a href="{{ url('/section-movie/1') }}" class="nav-bottom-link">
          <i class="fa-solid fa-book"></i>
          <br>
          <span>Dokumentari</span>
        </a>
        <a href="#" class="nav-bottom-link">
          <i class="fa-solid fa-bookmark"></i>
          <br>
          <span>Favorit ku</span>
        </a>
    </div>
  </div>






@yield('main-content')

@include('web.layouts.components.movie-tooltip')


{{-- <footer>
  <h1>Footer</h1>
</footer> --}}

<!-- JS Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ url('assets/js/script.js') }}"></script>



<script>  
  AOS.init();
</script>



@stack('scripts')
</body>
</html>
