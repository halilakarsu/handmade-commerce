<?php

// app/Models/Checkout.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_name',
        'order_lastname',
        'order_email',
        'order_phone',
        'order_il',
        'order_ilce',
        'order_adres',
        'order_cargo',
        'order_type',
        'order_code',
        'order_read',
        'order_price',
        'cargo_price',
        'total_price'
    ];
}
