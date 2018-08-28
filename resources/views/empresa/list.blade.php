@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Empresas</div>

                <div class="panel-body">
                  <table class="table table-hover">
                  <thead>
                     <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Ramo</th>
                        <th>Data Cadastro</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($registros as $registro)
                     <tr>
                        <td>{{$registro->id}}</td>
                        <td>{{$registro->nome}}</td>
                        <td>{{$registro->ramo->nome}}</td>
                        <td>{{$registro->created_at}}</td>
                        <td>
                           <form class="" action="{{route('empresa.destroy',$registro->id)}}" method="post">
                              <input type="hidden" name="_method" value="delete">
                              
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <a href="{{route('empresa.edit',$registro->id)}}" class="btn btn-primary btn-sm">Editar</a>
                              
                              <input type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Você tem certeza que deseja excluir este registro?');" name="name" value="Excluir">
                           </form>
                        </td>
                     </tr>
                     @endforeach
                  
                  </tbody>
                  <tfoot>
                  </tfoot>
               </table>
               <a href="{{route('empresa.create')}}" class="btn btn-primary">Nova empresa</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
