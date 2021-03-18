@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos</h1>    
@stop

@section('content')
   <div class="card">
       <div class="card-header pb-0">
           <div class="row">
               <div class="col-6">
                    <div class="form-group">
                        <form class="form-inline">
                             <div class="form-group">
                               <input type="text" name="filter" class="form-control" placeholder="Faça sua busca...">
                             </div>
                               <button type="submit" class="btn btn-info ml-2">Buscar</button>
                        </form>
                    </div>
               </div>
               <div class="col-6">
                   <a href="{{ route('plans.create')}}" class="btn btn-info float-right">Novo Plano</a>
               </div>               
           </div>            
       </div>
       <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="thead-light">
                    <tr>
                        <th>Nome</th>
                        <th width="100">Preço</th>
                        <th width="100">Criado</th>
                        <th width="170">Ações</th>
                    </tr>                    
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{ $plan->name }}</td>
                            <td>{{ $plan->price }}</td>
                            <td>{{ date('d/m/Y', strtotime($plan->created_at)) }}</td>
                            <td>
                                <a href="{{ route('plans.show', ['id' => $plan->id]) }}" class="btn btn-warning btn-sm">Ver</a>
                                <a href="#" class="btn btn-info btn-sm">Editar</a>
                                <a href="#" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {!! $plans->links() !!}
            </div>           
       </div>
   </div>
@stop