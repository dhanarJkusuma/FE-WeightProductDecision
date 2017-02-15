<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    const BENEFIT = 'benefit';
    const COST = 'cost';
    protected $table = 'kriteria';
    protected $fillable = ['nama', 'atribut', 'bobot','description'];

    public function nilai(){
        return $this->hasMany('App\Nilai','kriteria_id','id');
    }
}
