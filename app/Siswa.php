<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public function jurusans() 
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}
