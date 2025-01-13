<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Types;
class Categories extends Model
{
    public function types()
    {
        return $this->hasMany(Types::class, 'type_categori_id', 'id'); // Kategorinin id'si ile ilişki kuruyoruz
    }
}
