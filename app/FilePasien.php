<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilePasien extends Model
{
    protected $fillable = [
        'dokter_id','pasien_id','filename'
    ];
}
