<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class DataPrestasi extends Model
{
    public $timestamps = false;
    protected $table = 'dataprestasi';
    protected $fillable = ['id', 'nama', 'nama_acara', 'tgl_acara', 'lokasi'];
}