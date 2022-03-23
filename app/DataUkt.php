<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class DataUkt extends Model
{
    public $timestamps = false;
    protected $table = 'daftarukt';
    protected $fillable = ['id', 'tgl_buka', 'tgl_tutup', 'status'];
}