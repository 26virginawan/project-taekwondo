<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KasMasuk extends Model
{
    public $timestamps = false;
    protected $table = 'kasmasuk';
    protected $fillable = ['id', 'tanggal', 'keterangan', 'jumlah'];
}