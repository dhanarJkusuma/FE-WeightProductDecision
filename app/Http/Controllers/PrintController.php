<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\WPGenerator;
use App\CPenerima;
use App\Kriteria;
class PrintController extends Controller
{

    public function __construct()
    {
    }

    public function index(){
        $data = WPGenerator::weight_product();
        $penerima = CPenerima::all();
        arsort($data['v']);

        foreach ($penerima as $p) {
            $data['v'][$p->id] = $p->nama . "|" . $data['v'][$p->id];

        }
        return view('print.print')->with([
            'menu' => 'list',
            'data' => $data,
            'penerima' => $penerima
        ]);
    }
}
