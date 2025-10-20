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
    <div class="container-fluid">
    
      <div class="w-100 d-flex justify-content-between align-items-center" id="navbarNav">
        <div class="d-flex  align-items-center">
          <a class="navbar-brand desktop-logo" href="/">
            <img src="{{ url('/assets/img/nav-logo.png') }}" alt="aceh cinema logo" width="25" class="">
          </a>
          <a class="navbar-brand mobile-logo" href="/">
            <img src="{{ url('/assets/img/hero-section-logo.png') }}" alt="aceh cinema logo" height="30" class="">    
          </a>

          <ul class="navbar-nav" id="nav-left-menu" style="margin-left: 5px">
            <li class="nav-item">
              <a class="nav-link nav-link-costume" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-costume" href="{{ url('/section-movie/fiction') }}">Fiction</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-costume" href="{{ url('/section-movie/documentary') }}">Documentary</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link nav-link-costume" href="{{ url('/section-movie/1') }}">Series</a>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link nav-link-costume" href="#">My List</a>
            </li>
          </ul>
        </div>
        <div class="d-flex align-items-center">
          <div class="search-box mx-3">
            <input type="text" class="w-100" id="search" name="search">
            <i class="fa-solid fa-magnifying-glass search-icon"></i>
          </div>
          <a href="#" class="user-profile d-flex align-items-center">
            <i class="fa-regular fa-circle-user"></i> <span style="font-size: 16px; margin-left: 5px"> User</span>
          </a>
        </div>
      </div>
    </div>
  </nav>

  <div class="navbar-bottom fixed-bottom">
    <div class="container-fluid d-flex justify-content-between" id="nav-bottom-menu">
      
        <a href="/" class="nav-bottom-link">
          <i class="fa-solid fa-house"></i>
          <br>
          <span>Home</span>
        </a>
        <a href="{{ url('/section-movie/1') }}" class="nav-bottom-link">
          <i class="fa-solid fa-film"></i>
          <br>
          <span>Fiction</span>
        </a>
        <a href="{{ url('/section-movie/1') }}" class="nav-bottom-link">
          <i class="fa-solid fa-book"></i>
          <br>
          <span>Documentary</span>
        </a>
        <a href="#" class="nav-bottom-link">
          <i class="fa-solid fa-bookmark"></i>
          <br>
          <span>My List</span>
        </a>
    </div>
  </div>






@yield('main-content')


{{-- <footer>
  <h1>Footer</h1>
</footer> --}}

<!-- JS Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>



<script>  
  AOS.init();
</script>



@stack('scripts')
</body>
</html>
