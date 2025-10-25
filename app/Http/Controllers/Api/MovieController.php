<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function get_index(Request $request)
    {
        $category = $request->query('category');

        $query = Movie::query();

        if ($category === 'popular') {
            $query->orderByDesc('views');
        } elseif ($category) {
            $query->where('category', $category)->latest();
        } else {
            $query->latest();
        }

        $movies = $query->paginate(15);

        return response()->json($movies);
    }

    public function get_show($id)
    {
        $movie = Movie::findOrFail($id);
        return response()->json($movie);
    }
}
