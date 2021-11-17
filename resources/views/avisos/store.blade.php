@extends('layouts.app')
@section('content')
<h1 class="d-flex justify-content-center">Avisos</h1>

<div class="container">
    <form action="{{route('avisos.store')}}" method="POST">

        {{csrf_field()}}

        <p class="form-group">
            <label class="form-label">Título do Aviso</label><br>
            <input class="form-control" type="text" name="aviso" value="{{old('aviso')}}"> 
        </p>

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">        
                    <textarea name="conteudo" id="summernote" value="{{old('conteudo')}}"></textarea>
                </div>

            </div>
        </div>    

        <table class="table table-borderless" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ação</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($avisos as $aviso)
                <tr>
                    <td>{{$aviso->id}}</td>
                    <td>{{$aviso->name}}</td>

                    <td>  
                        <div class="form-check form-switch">
                            <input name="user_id" value="{{$aviso->id}}" class="form-check-input" type="checkbox"  id="flexSwitchCheckDefault">
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
  
        <div>
            <a class="btn btn-success" href="{{route('avisos.index')}}">Voltar</a>
            <input class="btn btn-success" dusk="cadastrar" type="submit" value="Cadastrar">
        </div>

    </form>
</div>
@endsection

@section('js')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 400,
            });
        });

        function toggle_check() {
            var checkboxes = document.getElementByName('user_id[]');
            var btn = document.getElementById('toggle');

            if(btn.value == 'select'){
                for(var i in checkboxes){
                    checkboxes[i].checked = 'FALSE'
                }
                btn.value = 'deselect'
            }else{
                for(var i in checkboxes){
                    checkboxes[i].checked = ''
                }
                btn.value = 'select'
            }

        }

    </script>
@endsection