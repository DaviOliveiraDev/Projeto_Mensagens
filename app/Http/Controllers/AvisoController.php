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


    public function edit(Aviso $aviso)
    {
        $avisos = User::all(['id', 'name']);
        return view('avisos.edit', compact('avisos'));
    }


    public function update(AvisoRequest $request, $id)
    {
        $avisoData = $request->all();

        $request->validated();

        $aviso = Aviso::FindOrFail($id);
        $aviso->user()->update($avisoData['user_id']);
        $aviso->update($avisoData);

        return redirect()->route("avisos.index");
    }


    public function delete($id)
    {
        $aviso = Aviso::FindOrFail($id);
        $aviso->delete();

        return redirect()->route('avisos.index');
    }
}
