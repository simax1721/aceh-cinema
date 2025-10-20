<?php

use App\Http\Controllers\Web\Desktop\HomeController;
use App\Http\Controllers\Web\Mobile\HomeController as MobileHomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware('detect.device')->group(function () {
//     Route::auto('/', HomeController::class);
// });
Route::auto('/', HomeController::class);


Route::auto('/mobile-view', MobileHomeController::class);
