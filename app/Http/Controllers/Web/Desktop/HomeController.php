<?php

namespace App\Http\Controllers\Web\Desktop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        return view('web.desktop.home');
    }

    function sectionMovie($movie) {
        return view('web.desktop.section-movie');
    }

    function movie($id) {
        return view('web.desktop.movie-info');
    }
}
