<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    protected $fillable = [
        'id_pasien','nama','pathdata', 'gambar'
    ];
}
