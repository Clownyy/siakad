<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    public function mapels() 
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
