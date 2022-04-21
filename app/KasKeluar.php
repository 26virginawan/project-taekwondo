<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KasKeluar extends Model
{
    public $timestamps = false;
    protected $table = 'kaskeluar';
    protected $fillable = ['id', 'tanggal', 'keterangan', 'jumlah'];
}