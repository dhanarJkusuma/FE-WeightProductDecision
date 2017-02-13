<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CPenerima;
class GuestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cpeserta(){
        $calon = CPenerima::paginate(10);

        $data = array(
            'title' => 'Calon Penerima',
            'menu' => 'cpenerima',
            'calon' => $calon
        );
        return view('cpenerima.gindex')->with($data);
    }

    public function detailcpeserta($id){
        $penerima = CPenerima::findOrFail($id);
        return view('cpenerima.gview', ['penerima' => $penerima, 'menu' => 'cpenerima' , 'title' => 'Detail data ' . $penerima->nama]);
    }
}
