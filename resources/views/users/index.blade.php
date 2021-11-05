@extends('layouts.app')
@section('content')
<div class="container">

    <a class="btn btn-success" href="{{route('users.new')}}">Adicionar Novo Usuário</a>

    <h2 class="d-flex justify-content-center">Usuários</h2>

  
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $u)
            <tr>
                
                <td>{{$u->id}}</td>
                <td>{{$u->name}}</td>

                <td>
                <a  class="btn btn-success" href="{{route('users.edit',   ['user' => $u->id])}}">Editar</a>
                
                <a  class="btn btn-success" href="{{route('users.remove', ['user' => $u->id])}}">Excluir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </div>
</div>

@endsection

