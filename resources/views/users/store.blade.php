@extends('layouts.app')
@section('content')
<h1 class="d-flex justify-content-center">Novo Usuário</h1>

<div class="container">
    <form action="{{route('users.store')}}" method="POST">

        {{csrf_field()}}
            
        <p class="form-group">
            <label class="form-label">Nome do Usuário</label><br>
            <input class="form-control" type="text" name="name" value="{{old('name')}}"> 
        </p>

        <p class="form-group">
            <label class="form-label" for="">E-mail</label><br>
            <input class="form-control @if ($errors->has('email')) is-invalid @endif" type="email" name="email" value="{{old('email')}}">
        
            @if ($errors->has('email'))
                <span class="invalid-feedback">

                  <strong>{{($errors->First('email'))}}</strong>

                </span>
            @endif
        </p>


        <p class="form-group">
            <label class="form-label" for="">Senha</label><br>
            <input class="form-control @if ($errors->has('password')) is-invalid @endif" type="password" name="password" value="{{old('password')}}">
        
            @if ($errors->has('password'))
                <span class="invalid-feedback">

                  <strong>{{($errors->First('password'))}}</strong>

                </span>
            @endif
        </p>


        <p class="form-group">
            <label class="form-label" for="">Confirmar Senha</label><br>
            <input class="form-control @if ($errors->has('password_confirmation')) is-invalid @endif" type="password" name="password_confirmation" value="{{old('password_confirmation')}}">
        
            @if ($errors->has('password_confirmation'))
                <span class="invalid-feedback">

                  <strong>{{($errors->First('password_confirmation'))}}</strong>

                </span>
            @endif
        </p>


        <div>
            <a class="btn btn-success" href="{{route('users.index')}}">Voltar</a>
            <input  class="btn btn-success" type="submit" name="" id="" value="Cadastrar">
        </div>  
        
    </form>
</div>

@endsection