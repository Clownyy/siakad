<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kategori;

class Gudang extends Model
{
    public function kategoris()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
