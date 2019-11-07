<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    public function gurus()
    {
    	return $this->hasMany(Siswa::class);
    }
}
