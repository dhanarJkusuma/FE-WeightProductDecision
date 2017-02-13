<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CPenerima extends Model
{
    protected $table = 'cpenerima';
    protected $fillable = ['nis', 'nama','alamat','jenis_kelamin','tgl_lahir','telp'];

    public function nilai(){
        return $this->hasMany('App\Nilai','cpenerima_id','id');
    }
}
