@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{ $plan->name }}</a></li>
            <li class="breadcrumb-item active"><a href="{{route('details.plan.index', $plan->url)}}">Detalhes</a></li>
        </ol>
    </nav>

    <h1>
        <i class="far fa-list-alt"></i>
        Detalhes do Plano
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
                   <a href="{{ route('details.plan.create', $plan->url) }}" class="btn btn-info float-right">Novo Detalhe</a>
               </div>               
           </div>            
       </div>
       <div class="card-body">
            @include('admin.includes.alerts')

            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="thead-light">
                    <tr>
                        <th>Nome</th>
                        <th width="170">Ações</th>
                    </tr>                    
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>{{ $detail->name }}</td>
                            <td>
                                <a href="{{ route('details.plan.show', [$plan->url, $detail->id]) }}" class="btn btn-warning btn-sm">Ver</a>
                                <a href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}" class="btn btn-info btn-sm">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                @if (isset($filters))
                    {!! $details->appends($filters)->links() !!}
                @else
                    {!! $details->links() !!}                    
                @endif
                
            </div>           
       </div>
   </div>
@stop