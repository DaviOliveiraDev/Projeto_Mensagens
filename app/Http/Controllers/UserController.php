<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = User::all();
        return view('users.index', compact('user'));
    }

    
    public function new(){

        return view('users.store');

    }

    public function store(UserRequest $request)
    {

        $userData = ($request -> all());


        $user = new User();
        $user ->create($userData);

        
        return redirect() -> route('users.index');
    }

    public function edit(User $user){
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $userData = ($request -> all());

        $user = User::findOrFail($id);
        $user -> update($userData);

        return redirect() -> route('users.index');
    }

    public function delete($id)
    {    

    $user =  User::findOrFail($id);
    $user -> delete();

    return redirect() -> route('users.index');
    }
}
