@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Mesas</li>
        </ol>
    </nav>

    <h1>
        <i class="fas fa-tablet"></i>
        Mesas
    </h1>       
@stop

@section('content')
   <div class="card">
       <div class="card-header pb-0">           
        @include('admin.includes.alerts')
           <div class="row">
               <div class="col-6">
                    <div class="form-group">
                        <form action="{{ route('tables.search') }}" class="form form-inline" method="POST">
                            @csrf
                             <div class="form-group">
                               <input type="text" 
                                      name="filter" 
                                      class="form-control form-control-sm" 
                                      placeholder="Faça sua busca...">
                             </div>
                               <button type="submit" class="btn btn-info btn-sm ml-2">Buscar</button>
                        </form>
                    </div>
               </div>
               <div class="col-6">
                   <a href="{{ route('tables.create') }}" class="btn btn-info btn-sm float-right"><i class="fas fa-plus"></i> Nova Mesa</a>
               </div>               
           </div>            
       </div>
       <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="thead-light">
                    <tr>
                        <th>Nome</th>
                        <th>Description</th>
                        <th width="120">Ações</th>
                    </tr>                    
                </thead>
                <tbody>
                    @if (count($tables) > 0)
                        @foreach ($tables as $table)
                            <tr>
                                <td>{{ $table->identify }}</td>
                                <td>{{ $table->description }}</td>
                                <td>
                                    <a href="{{ route('tables.show', $table->id) }}" class="btn btn-warning btn-sm">Ver</a>
                                    <a href="{{ route('tables.edit', $table->id)}}" class="btn btn-info btn-sm">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    @else                       
                        <tr>
                            <td colspan="5">
                                <p class="mt-2 text-red">Não existem Mesas para serem listadas</p>
                            </td>
                        </tr>    
                    @endif    
                </tbody>
            </table>
            <div class="mt-3">
                @if (isset($filters))
                    {!! $tables->appends($filters)->links() !!}
                @else
                    {!! $tables->links() !!}                    
                @endif                
            </div>
        </div>
   </div>
@stop