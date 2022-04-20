<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class DataIuran extends Model
{
    public $timestamps = false;
    protected $table = 'dataiuran';
    protected $fillable = ['id', 'bulan', 'tgl_bayar', 'keterangan'];

    // protected $dates = ['tgl_bayar'];
}