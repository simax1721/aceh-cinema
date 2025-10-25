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
                <img class="w-100" src="/assets/img/hero-section-logo.png" alt="">
                <p>Aceh Film Streaming Portal</p>
                <button id="button-watch" type="button" class="button-watch">Tonton Sekarang</button>
            </div>
            </div>
        </div>
    </section>

    <section class="movies" id="popular" data-category="popular">
      <div class="d-flex justify-content-between align-items-center movie-category">
        <h2>Popular</h2>
        <a href="{{ url('/section-movie/popular') }}"><i class="fa-solid fa-arrow-right"></i></a>
      </div>

      <div class="swiper swipers">
        <div class="swiper-wrapper">
          <!-- AJAX akan isi di sini -->
        </div>
      </div>
      <div class="swipper-button-costume">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </section>

    <section class="movies" id="fiction" data-category="fiction">
      <div class="d-flex justify-content-between align-items-center movie-category">
        <h2>Fiksi</h2>
        <a href="{{ url('/section-movie/fiction') }}"><i class="fa-solid fa-arrow-right"></i></a>
      </div>

      <div class="swiper swipers">
        <div class="swiper-wrapper"></div>
      </div>
      <div class="swipper-button-costume">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </section>

    <section class="movies" id="documentary" data-category="documentary">
      <div class="d-flex justify-content-between align-items-center movie-category">
        <h2>Dokumentari</h2>
        <a href="{{ url('/section-movie/documentary') }}"><i class="fa-solid fa-arrow-right"></i></a>
      </div>

      <div class="swiper swipers">
        <div class="swiper-wrapper"></div>
      </div>
      <div class="swipper-button-costume">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </section>

    

    
    
@endsection

@push('scripts')
<script>
  
  $(document).ready(function () {
    // === Load Movie Data per Section ===
    $('.movies').each(function () {
      const section = $(this);
      const category = section.data('category');
      const swiperWrapper = section.find('.swiper-wrapper');

      $.ajax({
        url: `/api/movies?category=${category}`,
        method: 'GET',
        dataType: 'json',
        success: function (response) {
          swiperWrapper.empty();

          response.data.forEach(movie => {
            const slide = `
              <div class="swiper-slide">
                <div class="movie-card"
                  data-id="${movie.id}"
                  data-title="${movie.title}"
                  data-category="${movie.category}"
                  data-date="${movie.release_date}"
                  data-poster="${movie.poster}"
                  data-trailer='${movie.trailer_dacast_embed}'>
                  <img src="${movie.poster}" alt="${movie.title}">
                </div>
              </div>`;
            swiperWrapper.append(slide);
          });

          swiperWrapper.append(`<a href="/section-movie/${category}" class="swiper-slide more-movie-list">
                <p>More +</p>
              </a>`);

          

          // Inisialisasi swiper setelah isi konten
          new Swiper(section.find('.swiper')[0], {
            slidesPerView: 'auto',
            spaceBetween: 20,
            navigation: {
              nextEl: section.find('.swiper-button-next')[0],
              prevEl: section.find('.swiper-button-prev')[0],
            },
          });

          $('.swipper-button-costume').addClass('show');


        },
        error: function () {
          swiperWrapper.html('<p style="color:#aaa;">Gagal memuat data.</p>');
        }
      });
    });

    // === Tooltip Logic ===
    let tooltipTimeout;

    $(document).on('mouseenter', '.movie-card', function () {
      clearTimeout(tooltipTimeout);
      const card = $(this);
      const tooltip = $('#movie-tooltip');

      // ambil iframe embed dari data
      const dacastEmbed = card.data('trailer');

      // ganti isi video container dengan iframe dacast
      tooltip.find('.tooltip-video').html(dacastEmbed);

      tooltip.find('.movie-meta').text(card.data('date'));
      tooltip.find('.movie-genre').text(card.data('category'));
      tooltip.find('.play-btn').attr('href', '/movie/' + card.data('id'));

      const offset = card.offset();
      tooltip.css({
        top: offset.top + card.height() / 2 - tooltip.outerHeight() / 2,
        left: offset.left + card.width() / 2 - tooltip.outerWidth() / 2,
      }).addClass('show');
    });

    $(document).on('mouseleave', '.movie-card', function () {
      tooltipTimeout = setTimeout(() => {
        $('#movie-tooltip').removeClass('show');
        $('#movie-tooltip .tooltip-video').empty(); // hapus iframe agar tidak tetap main
      }, 200);
    });

    $('#movie-tooltip').hover(
      function () {
        clearTimeout(tooltipTimeout);
      },
      function () {
        $(this).removeClass('show');
        $(this).find('.tooltip-video').empty(); // hapus iframe saat tooltip hilang
      }
    );
  });

  
</script>

@endpush