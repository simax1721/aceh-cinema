<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');

        $query = Movie::query();

        // Jika kategori = "popular", ambil berdasarkan jumlah view terbanyak
        if ($category === 'popular') {
            $query->orderByDesc('views'); // pastikan kolom 'views' ada di tabel
        } 
        // Jika kategori lain (fiction, documentary, dll)
        elseif ($category) {
            $query->where('category', $category)->latest();
        } 
        // Jika tanpa kategori, default ambil terbaru
        else {
            $query->latest();
        }

        // Ambil 15 data teratas
        $movies = $query->take(15)->get();

        return response()->json($movies);
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return response()->json($movie);
    }
}
