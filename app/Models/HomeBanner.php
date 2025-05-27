<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class HomeBanner extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'home_banner';

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'url',
        'order',
        'publication',
    ];
}
