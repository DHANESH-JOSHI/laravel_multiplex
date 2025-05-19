<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;


class Subscriptions extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'subscription';
    protected $fillable = [
        'user_id',
        'plan_id',
        'channel_id',
        'price_amount',
        'timestamp_from',
        'timestamp_to',
        'payment_method',
        'payment_info',
        'recurring',
        'status',
        'ispayment',
        'receipt',
        'razorpay_order_id',
        'currency',
        'amount',
        'amount_due',
        'amount_paid',
        'created_at'
    ];

    protected $casts = [
        'timestamp_from' => 'integer',
        'timestamp_to' => 'integer',
        'payment_info' => 'array',
        'recurring' => 'boolean',
        'status' => 'integer',
        'ispayment' => 'integer',
        'price_amount' => 'float',
        'amount' => 'float',
        'amount_due' => 'float',
        'amount_paid' => 'float',
        'created_at' => 'integer',
    ];

}
