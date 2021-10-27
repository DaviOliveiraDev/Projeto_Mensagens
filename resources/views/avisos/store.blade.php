<html>
<head>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>

<div class="container">
    <form action="{{route('avisos.store')}}" method="POST">

        {{csrf_field()}}

        <h1 class="text-center">Avisos </h1>

    
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


  <script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 400,
        });
    });
  </script>

<table class="table table-borderless" >
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($avisos as $aviso)
        <tr>
            <td>{{$aviso->id}}</td>
            <td>{{$aviso->name}}</td>
            <td>
                <div class="form-check form-switch">
                    <input name="user_id[{{$aviso->id}}]" value="{{$aviso->id}}" class="form-check-input" type="checkbox"  id="flexSwitchCheckDefault">
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>



    
    <div>
        <a class="btn btn-success" href="{{route('avisos.index')}}">Voltar</a>
        <input class="btn btn-success" type="submit" value="Cadastrar">
    </div>

</form>

</div>
</body>

</html>