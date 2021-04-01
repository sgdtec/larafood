@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Planos</li>
        </ol>
    </nav>

    <h1>
        <i class="far fa-list-alt"></i>
        Planos
    </h1>       
@stop

@section('content')
   <div class="card">
       <div class="card-header pb-0">
           <div class="row">
               <div class="col-6">
                    <div class="form-group">
                        <form action="{{ route('plans.search') }}" class="form form-inline" method="POST">
                            @csrf
                             <div class="form-group">
                               <input type="text" 
                                      name="filter" 
                                      class="form-control" 
                                      placeholder="Faça sua busca...">
                             </div>
                               <button type="submit" class="btn btn-info ml-3">Buscar</button>
                        </form>
                    </div>
               </div>
               <div class="col-6">
                   <a href="{{ route('plans.create') }}" class="btn btn-info float-right">Novo Plano</a>
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
                            <td>R$ {{ number_format($plan->price,2,",",".") }}</td>
                            <td>{{ date('d/m/Y', strtotime($plan->created_at)) }}</td>
                            <td>
                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning btn-sm">Ver</a>
                                <a href="{{ route('plans.edit', $plan->url)}}" class="btn btn-info btn-sm">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                @if (isset($filters))
                    {!! $plans->appends($filters)->links() !!}
                @else
                    {!! $plans->links() !!}                    
                @endif
                
            </div>           
       </div>
   </div>
@stop