@extends('web.layouts.desktop')

@section('main-content')
    <section id="hero-section">
        <!-- 🔹 Video Background -->
        <div class="video-background">
            <iframe 
            id="dacast-iframe"
            src="https://iframe.dacast.com/vod/39e5d509-c095-4ec0-7b41-1b13e9383df6/455a6b63-fa01-49e1-836b-9f94847cb265?autoplay=1&muted=1&loop=1"
            frameborder="0"
            allow="autoplay; fullscreen"
            allowfullscreen
            referrerpolicy="no-referrer"
        ></iframe>
        </div>

        <!-- 🔹 Konten di atas video -->
        <div class="content-overlay ">
            <div class="row">
            <div class="col-md-6 col-sm-7 col-9">
                <img class="w-100 mt-5" src="/assets/img/hero-section-logo.png" alt="">
                <p>Aceh Film Streaming Portal</p>
                <button id="button-watch" type="button" class="button-watch">Watch Now</button>
            </div>
            </div>
        </div>
    </section>


    <!-- === MOVIES SECTION === -->
<section class="movies" id="popular">
  <div class="d-flex justify-content-between align-items-center movie-category">
    <h2 data-aos="fade-right">Popular</h2>
    <a href="{{ url('/section-movie/popular') }}"><i class="fa-solid fa-arrow-right"></i></a>
  </div>

  <div class="swiper swipers">
    <div class="swiper-wrapper" id="popular-wrapper">
      <!-- JS akan isi otomatis -->
    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</section>

{{-- <section class="movies" id="top-week">
  <div class="d-flex justify-content-between align-items-center movie-category">
    <h2 data-aos="fade-right">Top Of Week</h2>
    <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
  </div>

  <!-- Swiper Container -->
  <div class="swiper swipers">
    <div class="swiper-wrapper">

      <!-- Movie Card 1 -->
      <div class="swiper-slide movie-card mv-card-h">
        <img src="/assets/img/popular/portfolio-1.jpg" alt="Movie 1">
        <div class="movie-info">Ruang Paling Sunyi</div>
        <div class="movie-tooltip">
          <img src="/assets/img/popular/portfolio-1.jpg" alt="Movie 1">
          <div class="tooltip-content">
            <div class="tooltip-header">
              <button class="play-btn"><i class="fa-solid fa-play"></i></button>
              <button><i class="fa-solid fa-plus"></i></button>
              <button><i class="fa-solid fa-thumbs-up"></i></button>
            </div>
            <p class="movie-meta">2024 • 2h 10m</p>
            <p class="movie-genre">Drama | Indie</p>
          </div>
        </div>
      </div>
      
      <a href="{{ url('/section-movie/1') }}" class="swiper-slide movie-card mv-card-h more-movie-list" >
          <p>More +</p>
      </a>

    </div>

    <!-- Swiper Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</section> --}}



<section class="movies" id="fiction">
  <div class="d-flex justify-content-between align-items-center movie-category">
    <h2 data-aos="fade-right">Fiction</h2>
    <a href="{{ url('/section-movie/fiction') }}"><i class="fa-solid fa-arrow-right"></i></a>
  </div>

  <div class="swiper swipers">
    <div class="swiper-wrapper" id="fiction-wrapper">
      <!-- JS akan isi otomatis -->
    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</section>


<section class="movies" id="documentary">
  <div class="d-flex justify-content-between align-items-center movie-category">
    <h2 data-aos="fade-right">Documentary</h2>
    <a href="{{ url('/section-movie/documentary') }}"><i class="fa-solid fa-arrow-right"></i></a>
  </div>

  <div class="swiper swipers">
    <div class="swiper-wrapper" id="documentary-wrapper">
      <!-- JS akan isi otomatis -->
    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</section>






@endsection

@push('scripts')
    <script>
      document.addEventListener('DOMContentLoaded', async () => {
        // 🔹 Fungsi untuk ambil dan render movie berdasarkan kategori
        async function loadMovies(category) {
          try {
            const response = await fetch(`/api/movies?category=${category}`);
            const movies = await response.json();

            const wrapper = document.getElementById(`${category}-wrapper`);
            wrapper.innerHTML = ''; // kosongkan dulu

            movies.forEach(movie => {
              wrapper.innerHTML += `
                <div class="swiper-slide movie-card mv-card-h">
                  <img src="${movie.poster}" alt="${movie.title}">
                  <div class="movie-info">${movie.title}</div>
                  <div class="movie-tooltip">
                    <img src="${movie.poster}" alt="${movie.title}">
                    <div class="tooltip-content">
                      <div class="tooltip-header">
                        <a href="/movie/${movie.id}" class="play-btn"><i class="fa-solid fa-play"></i></a>
                        <a href="#"><i class="fa-solid fa-plus"></i></a>
                        <a href="#"><i class="fa-solid fa-thumbs-up"></i></a>
                      </div>
                      <p class="movie-meta">${movie.release_date}</p>
                      <p class="movie-genre">${movie.category}</p>
                    </div>
                  </div>
                </div>
              `;
            });

            // Tambahkan tombol "More +"
            wrapper.innerHTML += `
              <a href="/section-movie/${category}" class="swiper-slide movie-card mv-card-h more-movie-list">
                <p>More +</p>
              </a>
            `;

            // Reinit Swiper setelah render data
            new Swiper(`#${category} .swipers`, {
              slidesPerView: 2,
              spaceBetween: 20,
              navigation: {
                nextEl: `#${category} .swiper-button-next`,
                prevEl: `#${category} .swiper-button-prev`,
              },
              grabCursor: true,
              breakpoints: {
                576: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                992: { slidesPerView: 4 },
              },
            });

          } catch (error) {
            console.error('Gagal memuat film:', error);
          }
        }

        // 🔹 Panggil dua kategori utama
        await loadMovies('popular');
        await loadMovies('fiction');
        await loadMovies('documentary');

        // 🔹 Jalankan AOS
        AOS.init({ duration: 1000, once: true });
      });
      </script>

@endpush