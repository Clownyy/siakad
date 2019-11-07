<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    public function siswas()
    {
    	return $this->hasMany(Siswa::class);
    }
}
