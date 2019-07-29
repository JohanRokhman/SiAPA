<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penghasilan extends Model
{
    protected $table = 'penghasilan';
    protected $fillable = ['tanggal', 'bulan', 'tahun', 'jumlah', 'penghasilan_id'];
}
