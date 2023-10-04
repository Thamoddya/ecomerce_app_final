<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable=[
        'name'
    ];

    public function invoice():BelongsTo
    {
        return $this->belongsTo(Invoice::class,'payment_methods_id');
    }
}
