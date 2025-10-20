@extends('web.layouts.desktop')

@section('main-content')
    <section class="play">
        <div class="video-container">
            <iframe
            id="movie-frame"
            src=""
            frameborder="0"
            allow="autoplay; encrypted-media"
            allowfullscreen
            webkitallowfullscreen
            mozallowfullscreen
            oallowfullscreen
            msallowfullscreen
            ></iframe>
        </div>
    </section>

    <section class="movie-detail">
        <div class="row">
            <div class="col-md-9">
            <h2 id="movie-title"></h2>
            <div class="">
                <ul id="movie-meta">
                    {{-- <li><a href="#">Fiction</a></li>
                    <li><a href="#">2000</a></li> --}}
                </ul>
            </div>
            <p id="movie-description"></p>
            <hr>
        </div>
        <div class="col-md-3">
            <div class="row" id="movie-list">
            <!-- data film akan dimasukkan lewat JS -->
            </div>
        </div>
        </div>
    </section>

    {{-- <section class="movie-info">
    <div class="container">
        <h1>Judul Film</h1>
        <p><strong>Genre:</strong> Drama, Budaya</p>
        <p><strong>Tahun:</strong> 2024</p>
        <p><strong>Sinopsis:</strong> Kisah perjuangan masyarakat Aceh dalam mempertahankan nilai-nilai budaya dan kemanusiaan...</p>
    </div>
    </section> --}}
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", async () => {
            const movieId = window.location.pathname.split("/").pop(); // ambil ID dari URL, contoh /movie/15
            try {
                const response = await fetch(`/api/movies/show/${movieId}`);
                const movie = await response.json();

                console.log(movie);
                

                // Isi elemen
                // document.getElementById("movie-frame").src = movie.dacast_embed;
                document.getElementById("movie-frame").src = 'https://iframe.dacast.com/vod/39e5d509-c095-4ec0-7b41-1b13e9383df6/455a6b63-fa01-49e1-836b-9f94847cb265';
                document.getElementById("movie-title").textContent = movie.title;
                document.getElementById("movie-description").textContent = movie.description;

                // tahun dari release_date
                const year = new Date(movie.release_date).getFullYear();

                document.getElementById("movie-meta").innerHTML = `
                <li><a href="#">${movie.category}</a></li>
                <li><a href="#">${year}</a></li>
                `;
            } catch (error) {
                console.error("Gagal memuat detail film:", error);
            }



            const movieList = document.getElementById("movie-list");

            try {
                const response = await fetch(`/api/movies`);
                const data = await response.json();

                if (data && data.length > 0) {
                movieList.innerHTML = data
                    .map((movie) => {
                    return `
                        <div class="col-6 mb-3">
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