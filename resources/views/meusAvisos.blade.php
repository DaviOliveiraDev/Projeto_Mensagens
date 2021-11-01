@extends('layouts.app')
@section('content')
<div>

    <h2 class="d-flex justify-content-center">Meus Avisos</h2>
  
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($avisos as $aviso) 
            <tr>

                <td>{{$aviso->pivot->id}}</td>
                <td>{{$aviso->aviso}}</td>
                <td>{{$aviso->conteudo}}</td>

                <td>
                    <button value='date' type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal{{$aviso->pivot->id}}">
                        Ler
                      </button>

                    <a class="btn btn-info">Ler depois</a>
                </td>
            </tr>
        </tbody>
          
          <!-- Modal -->
          <div class="modal fade" id="myModal{{$aviso->pivot->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-header">
                  <h5 class="modal-title" id="aviso">{{$aviso->aviso}}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    {{$aviso->conteudo}}
                </div>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
              </div>
            </div>
          </div>

          @endforeach
        </table>
    </div>
</div>
@endsection

