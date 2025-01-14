<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function types()
    {
        return $this->belongsTo(Types::class, 'product_type_id');
    }
}
