<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\WPGenerator;
use App\CPenerima;
use App\Kriteria;
use Vsmoraes\Pdf\Pdf;
class PrintController extends Controller
{
    private $pdf;
    public function __construct(Pdf $pdf)
    {
        $this->pdf = $pdf;
    }

    public function index(){
        $data = WPGenerator::weight_product();
        $penerima = CPenerima::all();

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
