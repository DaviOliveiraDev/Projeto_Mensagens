<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvisoRequest;
use App\Models\Aviso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AvisoController extends Controller
{
    public function index(Request $request)
    {
        $aviso = Aviso::all();
        return view('avisos.index', compact('aviso'));
    }


    public function new()
    {
        $avisos = User::all(['id', 'name']);
        return view('avisos.store', compact('avisos'));
    }


    public function store(AvisoRequest $request)
    {
        $avisoData = Aviso::create($request->all());

        $avisos = collect($request->input('user_id', []))
                ->map(function ($aviso) {
                    return ['user_id' => $aviso];
                });
        
        $avisoData->user()->sync($avisos);
        return redirect()->route('avisos.index');
    }


    public function edit(Aviso $aviso, User $user)
    {
        $user = User::all(['id', 'name']);
        return view('avisos.edit', compact('aviso', 'user'));
    }


    public function update(AvisoRequest $request, $id)
    {
        $avisoData = $request->all();

        $request->validated();

        $aviso = Aviso::Find($id);
        $aviso->user()->sync($avisoData['user_id']);
        $aviso->update($avisoData);
        return redirect()->route("avisos.index");
    }

    
    public function delete($id)
    {
        $aviso = Aviso::FindOrFail($id);
        $aviso->delete();
        return redirect()->route('avisos.index');
    }


    public function meusAvisos(Request $request)
    {
        $meuAviso = Auth::user()->aviso()->select('user_id', 'aviso', 'conteudo', 'aviso_id')->get();

        return view('meusAvisos.meusAvisos', compact('meuAviso'));
    }

    public function marcarComoLido(Request $request, int $aviso_id, int $user_id)
    {
        $avisoData = $request->except(['_token']);

        $data = Aviso::FindOrFail($aviso_id, $user_id);
        $data->dt_lido = date('Y-m-d H:i:s');
        $data->user()->updateExistingPivot($avisoData)->save();

        /*
        $data->user()->save($avisoData);
        $data->update($avisoData);
*/

        return redirect()->route('meusAvisos.meusAvisos');
    }
}
