<?php

namespace App\Http\Controllers\Web\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        return view('web.mobile.home');
    }
}
