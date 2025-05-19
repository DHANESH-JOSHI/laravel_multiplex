<?php

namespace App\Models;
use MongoDB\Laravel\Eloquent\Model;

class Movie extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'videos';
    protected $fillable = ['title', 'year', 'runtime', 'imdb', 'plot'];
}
