<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CPenerima extends Model
{
    protected $table = 'cpenerima';
    protected $fillable = ['nama','alamat','jenis_kelamin','tgl_lahir','telp'];
}
