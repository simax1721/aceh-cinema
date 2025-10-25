@extends('web.layouts.desktop')

@section('main-content')

<section class="movies-list">
    {{-- <div class="container"> --}}
        {{-- </div> --}}
    <h2 id="category-title"></h2>

    <div class="row justify-content-center" id="movie-list">
      <!-- data film akan dimasukkan lewat JS -->
    </div>

    <div class="text-center mt-4 load-movie-btn">
        <button id="load-more" class="">TAMPILKAN LAINNYA</button>
    </div>
</section>
    
@endsection

@push('scripts')
    
<script>
    // loadMoreBtn.hide();
    
    
    $(document).ready(function () {
        const loadMoreBtn = $('#load-more');

        const pathParts = window.location.pathname.split("/");
        const category = pathParts[pathParts.length - 1] || "popular";
        const movieList = $('#movie-list');

        $('#category-title').html(ucwords(category));

        let currentPage = 1; // halaman awal
        let lastPage = 1; // akan diupdate dari response

        function loadMovies(page = 1) {
            $.ajax({
                type: "GET",
                url: `/api/movies?category=${category}&page=${page}`,
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