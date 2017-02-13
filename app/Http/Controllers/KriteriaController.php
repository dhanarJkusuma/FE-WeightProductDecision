<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKriteria;
use App\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function __construct()
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
        $kriteria = Kriteria::paginate(10);

        $data = array(
            'title' => 'Kritera',
            'menu' => 'kriteria',
            'kriteria' => $kriteria
        );
        return view('kriteria.index')->with($data);
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
    public function store(StoreKriteria $request)
    {
        $kriteria = Kriteria::create($request->except(['_token']));
        if($kriteria){
            $request->session()->flash('success', 'Berhasil menambahkan data kriteria.');
        }else{
            $request->session()->flash('error', 'Gagal menambahkan data kriteria.');
        }
        return redirect()->action('KriteriaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return view('kriteria.view', ['kriteria' => $kriteria, 'menu' => 'kriteria' , 'title' => 'Detail data kriteria ' . $kriteria->nama]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return view('kriteria.update', ['kriteria' => $kriteria, 'menu' => 'kriteria' , 'title' => 'Ubah data kriteria ' . $kriteria->nama]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(StoreKriteria $request, $id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $update = $kriteria->update($request->except(['_token','_method']));
        if($update){
            $request->session()->flash('success', 'Berhasil mengubah data kriteria.');
            return redirect()->action('KriteriaController@index');
        }else{
            $request->session()->flash('error', 'Gagal mengubah data calon penerima beasiswa.');
        }
        return view('kriteria.update', ['kriteria' => $kriteria, 'menu' => 'kriteria' , 'title' => 'Ubah data kriteria' . $kriteria->nama]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $kriteria = Kriteria::findOrFail($id);
        if($kriteria->delete()){
            $request->session()->flash('success','Berhasil menghapus data kriteria.');
        }else{
            $request->session()->flash('error','Gagal menghapus data kriteria.');
        }
        return redirect()->action('KriteriaController@index');
    }
}
