@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Permissões</li>
        </ol>
    </nav>

    <h1>
        <i class="fas fa-lock"></i>
        Permissões
    </h1>       
@stop

@section('content')
   <div class="card">
       <div class="card-header pb-0">
           <div class="row">
               <div class="col-6">
                    <div class="form-group">
                        <form action="{{ route('permissions.search') }}" class="form form-inline" method="POST">
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
                   <a href="{{ route('permissions.create') }}" class="btn btn-info float-right">Nova Permissão</a>
               </div>               
           </div>            
       </div>
       <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="thead-light">
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th width="100">Criado</th>
                        <th width="150" class="text-center">Ações</th>
                    </tr>                    
                </thead>
                <tbody>
                    @if (count($permissions) > 0)
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->description }}</td>
                                <td>{{ date('d/m/Y', strtotime($permission->created_at)) }}</td>
                                <td class='text-center'>
                                    <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-warning btn-sm">Ver</a>
                                    <a href="{{ route('permissions.edit', $permission->id)}}" class="btn btn-info btn-sm">Editar</a>
                                    <a href="{{ route('permissions.profiles', $permission->id)}}" class="btn btn-info btn-sm"><i class="fas fa-address-book"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else                       
                        <tr>
                            <td colspan="5">
                                <p class="mt-2 text-red">Não existem permissões cadastradas.</p>
                            </td>
                        </tr>    
                    @endif
                </tbody>
            </table>
            <div class="mt-3">
                @if (isset($filters))
                    {!! $permissions->appends($filters)->links() !!}
                @else
                    {!! $permissions->links() !!}                    
                @endif
                
            </div>           
       </div>
   </div>
@stop