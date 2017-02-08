<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriteria';
    protected $fillable = ['nama', 'atribut', 'bobot'];

    public function nilai(){
        return $this->hasMany('App\Nilai','kriteria_id','id');
    }
}
