@extends('web.layouts.desktop')

@push('css') 
    
@endpush

@section('main-content')
    <section class="movie-watch">
        <div class="play-movie">
        </div>

        <div class="row more-watch">
            <div class="col-md-8 description-movie mb-5">
                
            </div>

            <div class="col-md-4 more-movie">
                <div class="row justify-content-center" id="movie-list">
                <!-- data film akan dimasukkan lewat JS -->
                </div>
                <div class="text-center mt-4 load-movie-btn">
                    <button id="load-more" class="">TAMPILKAN LAINNYA</button>
                </div>
            </div>
        </div>


    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {

            const movieId = window.location.pathname.split("/").pop();
            
            const movieAbout = $('.description-movie');

            $.ajax({
                type: "get",
                url: `/api/movies/show/${movieId}`,
                dataType: "json",
                success: function (response) {
                    movieAbout.empty();

                    const durationMinutes = response.duration; // misalnya 182 menit
                    const hours = Math.floor(durationMinutes / 60);
                    const minutes = durationMinutes % 60;
                    const formattedDuration = `${hours > 0 ? hours + ' Jam ' : ''}${minutes} Menit`;
                    const year = new Date(response.release_date).getFullYear();

                    $('.play-movie').html(response.dacast_embed);

                    const content = `<div class="detail">
                        <div class="detail-start">
                            <img class="poster" src="${response.poster}" alt="">
                            <div class="detail-info">
                                <h3 class="title text-uppercase">${response.title}</h3>
                                <ul class="">
                                    <li class="category">${response.category}</li>
                                    <li class="age">${response.age}</li>
                                    <li class="duration">${formattedDuration}</li>
                                </ul>
                                <div class="btn-detail">
                                    <a href="#"><i class="fa-solid fa-plus"></i> Favorit</a>
                                    <a href="#" class="active"><i class="fa-solid fa-thumbs-up"></i> Suka</a>
                                </div>
                            </div>
                        </div>
                        <div class="detail-end">
                            <p class="description">${response.description}</p>
                            <p class="desc-title">Pemeran</p>
                            <p class="desc-content actor">${response.actor}</p>
                            <p class="desc-title">Rilis</p>
                            <p class="desc-content year">${year}</p>
                            <p class="desc-title">Penulis</p>
                            <p class="desc-content writter">${response.writter}</p>
                            <p class="desc-title">Sutradara</p>
                            <p class="desc-content producer">${response.producer}</p>
                            <p class="desc-title">Produksi</p>
                            <p class="desc-content production">${response.production}</p>
                        </div>
                    </div>`;
                    movieAbout.append(content);
                }
            });
        


        const loadMoreBtn = $('#load-more');

        const movieList = $('#movie-list');


        let currentPage = 1; // halaman awal
        let lastPage = 1; // akan diupdate dari response

        function loadMovies(page = 1) {
            $.ajax({
                type: "GET",
                url: `/api/movies`,
                dataType: "json",
                success: function (response) {
                    const movies = response.data; // ambil dari objek paginate
                    lastPage = response.last_page;

                    movies.forEach(movie => {
                        const card = `
                            <div class="col-auto mb-3">
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
                        movieList.append(card);
                    });

                    $('.load-movie-btn').addClass('show');

                    // sembunyikan tombol jika sudah halaman terakhir
                    if (currentPage >= lastPage) {
                        loadMoreBtn.hide();
                    } else {
                        loadMoreBtn.show();
                    }
                },
                error: function () {
                    movieList.html('<p style="color:#aaa;">Gagal memuat data.</p>');
                }
            });
        }

        // muat halaman pertama
        loadMovies(currentPage);

        // load halaman berikutnya
        loadMoreBtn.on('click', function () {
            if (currentPage < lastPage) {
                currentPage++;
                loadMovies(currentPage);
            }
        });

        // Tooltip Logic (tetap sama)
        let tooltipTimeout;

        $(document).on('mouseenter', '.movie-card', function () {
            clearTimeout(tooltipTimeout);
            const card = $(this);
            const tooltip = $('#movie-tooltip');
            const dacastEmbed = card.data('trailer');

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
                $('#movie-tooltip .tooltip-video').empty();
            }, 200);
        });

        $('#movie-tooltip').hover(
            function () { clearTimeout(tooltipTimeout); },
            function () {
                $(this).removeClass('show');
                $(this).find('.tooltip-video').empty();
            }
        );

    });
    </script>
@endpush