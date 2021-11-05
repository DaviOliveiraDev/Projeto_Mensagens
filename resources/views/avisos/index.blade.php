@extends('layouts.app')
@section('content')
<div class="container">

    <a class="btn btn-success" href="{{route('avisos.new')}}">Adicionar Novo Aviso</a>

    <h2 class="d-flex justify-content-center">Avisos</h2>
  
  
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aviso as $aviso) 
            <tr>
                <td>{{$aviso ->id}}</td>
                <td>{{$aviso ->aviso}}</td>

                <td>
                    <a class="btn btn-success" href="{{route('avisos.edit',   ['aviso' => $aviso->id])}}">Editar</a>
                    <a class="btn btn-success" href="{{route('avisos.remove', ['aviso' => $aviso->id])}}">Excluir</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </div>
</div>
@endsection
