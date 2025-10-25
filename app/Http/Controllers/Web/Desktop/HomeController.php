<?php

namespace App\Http\Controllers\Web\Desktop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function get_index() {
        return view('web.desktop.home');
    }

    function get_sectionMovie($movie) {
        return view('web.desktop.section-movie');
    }

    function get_movie($id) {
        return view('web.desktop.movie-info');
    }

    function get_watch($id) {
        return view('web.desktop.movie-watch');
    }
}
