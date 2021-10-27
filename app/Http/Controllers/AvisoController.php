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
        //$users = User::all(['id', 'name']);
        $avisos = User::all(['id', 'name']);
        return view('avisos.store', compact('avisos'));
    }



    public function store(AvisoRequest $request)
    {
    
    
        //$avisoData = request()->except(['_token']);

        //$request -> validated();

        //$aviso = new Aviso();



        $avisoData = Aviso::create($request -> all());
        $avisos = collect($request -> input('user_id', []))
            ->map(function($aviso){
                return ['aviso_user' => $aviso];
            });
        
        $avisoData -> user() -> sync(
            $avisos
        );


        return redirect() -> route('avisos.index');
        //$user = User::find($avisoData['user_id']);
        //$user -> user() -> create($avisoData)->toArray();



/*

        $avisoData= Aviso::where('user_id', (int) $idAviso)->get()->pluck('user_id', 'user_id');
        foreach ($aUsers as $aUser) {
            if (empty($avisoData[$aUser])) {

                Aviso::insert(['user_id' => $aUser]);
            }
            unset($avisoData[$aUser]);
        }
        */


   
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
        $aviso -> user() -> update($avisoData['user_id']);
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
