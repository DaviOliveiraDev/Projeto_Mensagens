@extends('layouts.app')
@section('content')

<h1 class="d-flex justify-content-center">Editar Usuário</h1>
<hr>

<div class="container">
    <form action="{{route('users.update',  ['user'=> $user->id])}}" method="POST">

        {{csrf_field()}}

            
                <p class="form-group">
                    <label class="form-label">Nome do Usuário</label><br>
                    <input class="form-control" type="text"  name="name" value="{{$user->name}}"> 

            <div class="">
                <a class="btn btn-success" href="{{route('users.index')}}">Voltar</a>
                <input  class="btn btn-success" type="submit" name="" id="" value="Atualizar">
            </div>  
        </div> 
    </form>
</div>

@endsection