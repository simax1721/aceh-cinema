@extends('web.layouts.desktop')

@section('main-content')
    <section class="movie-about">
        
    </section>

    {{-- <section style="">
        test
    </section> --}}
@endsection

@push('scripts')
    <script>
        const movieId = window.location.pathname.split("/").pop();
        const movieAbout = $('.movie-about');
        

        $(document).ready(function () {
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

                    const content = `<div class="thumbnail">
                        <img  src="${response.thumbnail}" alt="">
                        <div class="thumbnail-gradiend"></div>
                    </div>
                    <div class="detail">
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
                                    <a href="/watch/${response.id}" class="active"><i class="fa-solid fa-play"></i> Tonton</a>
                                    <a href="#"><i class="fa-solid fa-plus"></i> Favorit</a>
                                    <a href="#"><i class="fa-solid fa-thumbs-up"></i> Suka</a>
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
        });
    </script>
@endpush