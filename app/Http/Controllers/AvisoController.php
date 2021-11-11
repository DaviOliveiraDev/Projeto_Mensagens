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
        $users = User::all();
        return view('avisos.edit', compact('aviso', 'users'));
    }


    public function update(AvisoRequest $request, $id)
    {
        $avisoData = $request->all();
        $user_id = $request->user_id;

        $request->validated();

        $aviso = Aviso::FindOrFail($id);
        $aviso->update($avisoData);
        $aviso->user()->sync($user_id);

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
        $meuAviso = Auth::user()->aviso()->select('user_id', 'aviso', 'conteudo', 'aviso_id', 'dt_lido')->get();

        return view('meusAvisos.meusAvisos', compact('meuAviso'));
    }

    public function marcarComoLido(Request $request)
    {
        date_default_timezone_set('America/Sao_Paulo');

        $user_id = $request->user_id;
        $aviso_id = $request->aviso_id;

        $data = Aviso::FindOrFail($aviso_id);
        $data->dt_lido = date('Y-m-d H:i:s');
        $data->user()->updateExistingPivot($user_id, ['dt_lido' => date('Y-m-d H:i:s')]);

        return redirect()->route('meusAvisos.meusAvisos');
    }

    public function lerDepois(Request $request)
    {
        $user_id = $request->user_id;
        $aviso_id = $request->aviso_id;

        $data = Aviso::FindOrFail($aviso_id);
        $data->dt_lido = date('Y-m-d H:i:s');
        $data->user()->updateExistingPivot($user_id, ['dt_lido' => null]);

        return redirect()->route('meusAvisos.meusAvisos');
    }
}
