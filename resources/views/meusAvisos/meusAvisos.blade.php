@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="d-flex justify-content-center">Meus Avisos</h2>
  
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($meuAviso as $a) 
            <tr>
                <td>{{$a->aviso_id}}</td>
                <td>{{$a->aviso}}</td>
                <td>
                    <button value='date' name="date" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal{{$a->pivot->id}}">
                        Ler
                    </button>
                </td>
            </tr>

        <!-- Modal -->
        <div class="modal fade" id="myModal{{$a->pivot->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="aviso">{{$a->aviso}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                        <div class="modal-body">
                            <p>{!! $a->conteudo !!}</p>
                        </div>

                    <div class="modal-footer">
                        <form action="{{route('meusAvisos.lerDepois',['aviso_id'=>$a->aviso_id ,'user_id'=>$a->user_id])}}" method="POST">
                            {{csrf_field()}}
                           <input class="btn btn-success" type="submit" name="lerDepois" value="ler Depois">
                       </form>

                        <form action="{{route('meusAvisos.update',['aviso_id'=>$a->aviso_id ,'user_id'=>$a->user_id])}}" method="POST">
                             {{csrf_field()}}
                            <input class="btn btn-success" dusk="lido" type="submit" value="Marcar Como Lido">
                        </form>

                    </div>
                </div>
            </div>
        </div>
        
        @endforeach
        </tbody>
    </div>
</div>
@endsection

