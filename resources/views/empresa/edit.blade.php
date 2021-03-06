@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nova Empresa</div>

                <div class="panel-body">
                    
                   <form role="form" action="{{route('empresa.update', $registro->id)}}" method="post">
                     <div class="box-body">
                  <input name="_method" type="hidden" value="PATCH">
                        {{csrf_field()}}

                        <div class="form-group col-sm-8">
                           <label for="nome">Nome</label>
                           <input type="text" class="form-control" name="nome" placeholder="Informe o nome da empresa" value="{{$registro->nome}}" required>
                        </div>
                        <div class="form-group col-sm-4">
                           <label for="ramo">Ramo de Atuação</label>
                           <select class="form-control" name="ramo" required>
                              @foreach($ramos as $ramo)
                                 @if ($ramo->id == $registro->ramo_id)
                                 <option value="{{$ramo->id}}" selected>{{$ramo->nome}}</option>
                                 @else
                                 <option value="{{$ramo->id}}">{{$ramo->nome}}</option>
                                 @endif
                              @endforeach
                           </select>
                        </div>
                         <!-- /.input group -->
                     </div>
                     <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Salvar</button>
                       <a href="{{route('empresa.index')}}" class="btn btn-default pull-right">Cancelar</a>
                    </div>
                  </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
