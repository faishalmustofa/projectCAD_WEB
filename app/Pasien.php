<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = "pasien";
 
    protected $fillable = [
        'dokter_id','name','tanggal_lahir','no_telp','jeniskelamin','alamat','label','file','hasilproses','status'
    ];
}
