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
        //$aviso->aviso()->sync($avisoData['user_id']);
        $aviso->update($avisoData);

        return redirect()->route("avisos.index");
    }


    /*public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }


    public function update(UserRequest $request, $id)
    {
        $userData = ($request -> all());

        $user = User::findOrFail($id);
        $user->update($userData);

        return redirect()->route('users.index');
    }*/


    public function delete($id)
    {
        $aviso = Aviso::FindOrFail($id);
        $aviso->delete();

        return redirect()->route('avisos.index');
    }


    public function meusAvisos(Request $request)
    {
        $avisos = Auth::user()->aviso()
                              ->select('user_id', 'aviso')
                              ->get();

        $date = Carbon::now()->toDateTimeString();
        return view('meusAvisos', compact('avisos', 'date'));
    }
}
