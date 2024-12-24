<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    // İlişkiyi tanımlayan metod
    public function categories()
    {
        return $this->belongsTo(Categories::class, 'type_categori_id'); // kategori_id ile ilişkili
    }
}
