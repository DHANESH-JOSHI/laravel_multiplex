<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;


class Channel extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'channel';
    protected $fillable = [
        'channel_name',
        'user_id',
        'mobile_number',
        'address',
        'organization_name',
        'organization_address',
        'status',
        'join_date',
        'last_login'
    ];

}
