<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePasswordUser;
use App\Http\Requests\StoreUser;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index(){
        $users = User::where('level','<>','admin')->paginate(10);

        $data = array(
            'title' => 'User',
            'menu' => 'user',
            'users' => $users
        );
        return view('user.index')->with($data);
    }

    public function create(){

    }

    public function store(StoreUser $request){

        $user = new User;
        $user->username = $request->input('username');
        $user->nama = $request->input('nama');
        $user->password = bcrypt($request->input('password'));
        $user->level = 'user';

        if($user->save()){
            $request->session()->flash('success', 'Berhasil menambahkan data user.');
        }else{
            $request->session()->flash('error', 'Gagal menambahkan data user.');
        }

        return redirect()->action('UserController@index');
    }

    public function show($id){
        $user = User::findOrFail($id);
        if($user->level=='admin'){
            $user = null;
        }
        return view('user.view', ['user' => $user, 'menu' => 'user' , 'title' => 'Detail User' . $user->nama]);
    }

    public function edit($id){
        $user = User::findOrFail($id);
        if($user->level=='admin'){
            $user = null;
        }
        return view('user.update',['user' => $user, 'menu' => 'user' , 'title' => 'Update User' . $user->nama]);
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $update = $user->update($request->except(['_token']));
        if($update){
            $request->session()->flash('success', 'Berhasil mengubah data user.');
            return redirect()->action('UserController@index');
        }else{
            $request->session()->flash('error', 'Gagal mengubah data data user.');
        }
        return view('user.update', ['user' => $user, 'menu' => 'user' , 'title' => 'Ubah data ' . $user->nama]);
    }

    public function destroy(Request $request, $id){
        $user = User::findOrFail($id);
        if($user->level!='admin'){
            if($user->delete()){
                $request->session()->flash('success','Berhasil menghapus data user.');
            }else{
                $request->session()->flash('error','Gagal menghapus data user.');
            }
        }
        return redirect()->action('UserController@index');
    }

    public function chpassword(StorePasswordUser $request, $id){
        $user = User::findOrFail($id);
        $user->password = bcrypt($request->input('password'));
        if($user->save()){
            $request->session()->flash('success','Berhasil mengganti password data user.');
        }else{
            $request->session()->flash('error','Gagal mengganti password data user.');
        }
        return redirect()->action('UserController@index');
    }
}
