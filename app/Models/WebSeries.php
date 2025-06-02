<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class WebSeries extends Model
{

    protected $connection = 'mongodb';
    protected $table = 'webseries';

    protected $fillable = [
        'title',
        'description',
        'genre',
        'release_year',
        'image_url',
    ];

//    protected $casts = [
//        'seasonsId' => 'array', // MongoDB stores this as an array of ObjectIDs
//    ];

}
