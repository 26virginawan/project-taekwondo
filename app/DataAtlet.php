<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataAtlet extends Model
{
    public $timestamps = false;
    protected $table = 'atlet';
    protected $fillable = [
        'id',
        'name',
        'email',
        'tgl_registrasi',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'bb',
        'tb',
        'no_hp',
        'tingkat_sabuk',
        'kelas',
    ];
}