<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPelakuUsaha extends Model
{
    //
    protected $table = 'data_pelaku_usaha';
    protected $fillable = ['nama', 'alamat', 'kecamatan', 'kelurahan', 'jenis_usaha', 'jenis_pkl', 'foto', 'data_id'];
}
