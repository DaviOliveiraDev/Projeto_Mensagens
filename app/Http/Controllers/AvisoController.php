<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvisoRequest;
use App\Models\Aviso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvisoController extends Controller
{
    public function index(Request $request)
    {
        $aviso = Aviso::all();
        return view('avisos.index', compact('aviso'));
    }



    public function new(){
        
        //$aviso = Aviso::all();
        $users = User::all(['id', 'name']);
        return view('avisos.store', compact('users'));
    }



    public function store(AvisoRequest $request)
    {
        $avisoData = $request -> all();

        //$user = $avisoData['user_id'];

        $request -> validated();

        //$aviso = new Aviso();
        //$aviso -> create($avisoData);

        $user = User::find($avisoData['user_id']);
        $user -> aviso() -> create($avisoData);

        
        return redirect() -> route('avisos.index');
    }



    public function edit(Aviso $aviso)
    {
        $user = User::all(['id', 'name']);
        return view('avisos.edit', compact('aviso', 'user'));
    }



    public function update(AvisoRequest $request, $id)
    {
        $avisoData = $request -> all();

        $request -> validated();




        $aviso = Aviso::FindOrFail($id);
        $aviso -> user() -> associate($avisoData['user_id']);
        $aviso->update($avisoData);

        return redirect() -> route("avisos.index");
    }



    public function delete($id)
    {
        $aviso = Aviso::FindOrFail($id);
        $aviso -> delete();

        return redirect() -> route('avisos.index');
    }
}
