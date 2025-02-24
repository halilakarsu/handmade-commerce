<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
     protected $fillable = [
        'product_id',
        'product_quantity',
        'product_price',
        'order_code',
        'product_title'
    ];



 public function products()
    {
        return $this->hasMany(Products::class, 'id'); // 'product_id' foreign key
    }
 }
