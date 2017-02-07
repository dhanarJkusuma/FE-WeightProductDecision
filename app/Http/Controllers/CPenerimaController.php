<?php

namespace App\Http\Controllers;

use App\CPenerima;
use App\Http\Requests\StoreCPenerima;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CPenerimaController extends Controller
{
    public  function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calon = CPenerima::paginate(10);

        $data = array(
            'title' => 'Calon Penerima',
            'menu' => 'cpenerima',
            'calon' => $calon
        );
        return view('cpenerima.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCPenerima $request)
    {
        $penerima = CPenerima::create($request->except(['_token']));
        if($penerima){
            $request->session()->flash('success', 'Berhasil menambahkan data calon penerima beasiswa.');
        }else{
            $request->session()->flash('error', 'Gagal menambahkan data calon.');
        }
        return redirect()->action('CPenerimaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CPenerima  $cPenerima
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penerima = CPenerima::findOrFail($id);
        return view('cpenerima.view', ['penerima' => $penerima, 'menu' => 'cpenerima' , 'title' => 'Detail data ' . $penerima->nama]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CPenerima  $cPenerima
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penerima = CPenerima::findOrFail($id);
        return view('cpenerima.update', ['penerima' => $penerima, 'menu' => 'cpenerima' , 'title' => 'Ubah data ' . $penerima->nama]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CPenerima  $cPenerima
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCPenerima $request, $id)
    {
        $penerima = CPenerima::findOrFail($id);
        $update = $penerima->update($request->except(['_token','_method']));
        if($update){
            $request->session()->flash('success', 'Berhasil mengubah data calon penerima beasiswa.');
            return redirect()->action('CPenerimaController@index');
        }else{
            $request->session()->flash('success', 'Berhasil mengubah data calon penerima beasiswa.');
        }
        return view('cpenerima.update', ['penerima' => $penerima, 'menu' => 'cpenerima' , 'title' => 'Ubah data ' . $penerima->nama]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CPenerima  $cPenerima
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $penerima = CPenerima::findOrFail($id);
        if($penerima->delete()){
            $request->session()->flash('success','Berhasil menghapus data calon penerima beasiswa.');
        }else{
            $request->session()->flash('error','Gagal menghapus data calon penerima beasiswa.');
        }
        return redirect()->action('CPenerimaController@index');
    }
}
