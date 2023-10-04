<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory;

    public $fillable = [
    'order_id',
    'invoice_id',
    'items',
    'amount',
    'currency',
    'hash',
    'first_name',
    'last_name',
    'email',
    'phone',
    'address',
    'city',
    'country',
    'delivery_address',
    'delivery_city',
    'delivery_country',
    'estimated_delivery_date',
    'status',
    ];

}
