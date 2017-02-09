<?php

namespace App\Http\Controllers;

use App\CPenerima;
use App\Kriteria;
use App\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $cpenerima = CPenerima::all();
        $kriteria = Kriteria::all();
        $nilai = Nilai::all();
        $data = [];
        $tmp_nilai = [];
        $penerima_id = null;
        foreach ($nilai as $n){
            if($n->cpenerima_id != $penerima_id){
                $penerima_id = $n->cpenerima_id;
                $tmp_nilai = [];
            }
            array_push($tmp_nilai, $n->nilai);
            $data[$penerima_id]= $tmp_nilai;
        }


        return view('home')->with([
            'menu' => 'dashboard',
            'cpenerima' => $cpenerima,
            'kriteria' => $kriteria,
            'data' => $data
        ]);
    }

    private function weight_product(){
        $wj = DB::table('kriteria')->sum('bobot');
        $kriteria = Kriteria::all();
        $weight = [];
        foreach ($kriteria as $k){
            $weight[$k->id] = $k->bobot/$wj;
        }

        $nilai = Nilai::all();
        $penerima = null;
        $s = [];

        $tmp_s = 1;
        foreach ($nilai as $n) {
            if($penerima!=$n->cpenerima_id){
                $penerima = $n->cpenerima_id;
                $tmp_s = 1;
            }

            if($n->kriteria->atribut == Kriteria::COST){
                $weight[$n->kriteria_id] *= -1;
            }
            $tmp_s *= pow($n->nilai,$weight[$n->kriteria_id]);
            if($penerima!=null){
                $tmp = [];
                $tmp['s'] = $tmp_s;
                $tmp['penerima'] = $penerima;
                array_push($s,$tmp);
            }
        }

        $vj=0;
        foreach ($s as $single_s){
            $vj += $single_s['s'];
        }
        $v = [];

        foreach ($s as $single_s){
            $v[$single_s['penerima']] = $single_s['s']/$vj;
        }
        return [
            'weight' => $weight,
            's' => $s,
            'v' => $v
        ];
    }

    public function calculate(){
        $data = $this->weight_product();
        $kriteria = Kriteria::all();
        $penerima = CPenerima::all();


        return view('calculate')->with([
            'menu' => 'dashboard',
            'kriteria' => $kriteria,
            'data' => $data,
            'penerima' => $penerima
        ]);
    }
}
