<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'title',
    //     'category',
    //     'dacast_embed',
    //     'poster',
    //     'description',
    //     'release_date',
    //     'rating',
    //     'views',
    // ];

    protected $guarded = ['id'];
}
