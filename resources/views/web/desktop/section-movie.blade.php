@extends('web.layouts.desktop')

@section('main-content')

<section class="movies-list">
    <div class="container">
    <h2 id="category-title" data-aos="fade-right"></h2>

    <div class="row" id="movie-list">
      <!-- data film akan dimasukkan lewat JS -->
    </div>
  </div>
</section>
    
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", async () => {
        const movieList = document.getElementById("movie-list");

        // ambil bagian terakhir dari path URL
        const pathParts = window.location.pathname.split("/");
        const category = pathParts[pathParts.length - 1] || "popular";

        try {
            const response = await fetch(`/api/movies?category=${category}`);
            const data = await response.json();

            if (data && data.length > 0) {
            movieList.innerHTML = data
                .map((movie) => {
                return `
                    <div class="col-6 col-md-4 col-lg-3 mb-3">
                    <div class="movie-card mv-card-h">
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
                    </div>
                `;
                })
                .join("");
            } else {
            movieList.innerHTML = `<p>Tidak ada film ditemukan untuk kategori <strong>${category}</strong>.</p>`;
            }
        } catch (error) {
            console.error("Gagal memuat data film:", error);
            movieList.innerHTML = `<p>Terjadi kesalahan saat memuat data.</p>`;
        }
        });
    </script>

@endpush