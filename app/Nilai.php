<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $fillable = ['cpenerima_id', 'kriteria_id', 'nilai'];

    public function kriteria(){
        return $this->belongsTo('App\Kriteria','kriteria_id','id');
    }
}
