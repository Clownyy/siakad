<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'alamat',
        'email',
        'notelp',
        'fax',
    ];
}
