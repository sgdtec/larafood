@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Usuários</li>
        </ol>
    </nav>

    <h1>
        <i class="far fa-user"></i>
        Usuários
    </h1>       
@stop

@section('content')
   <div class="card">
       <div class="card-header pb-0">
           <div class="row">
               <div class="col-6">
                    <div class="form-group">
                        <form action="{{ route('users.search') }}" class="form form-inline" method="POST">
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
                   <a href="{{ route('users.create') }}" class="btn btn-info btn-sm float-right"><i class="fas fa-plus"></i> Novo Usuário</a>
               </div>               
           </div>            
       </div>
       <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="thead-light">
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th width="120">Ações</th>
                    </tr>                    
                </thead>
                <tbody>
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm">Ver</a>
                                    <a href="{{ route('users.edit', $user->id)}}" class="btn btn-info btn-sm">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    @else                       
                        <tr>
                            <td colspan="5">
                                <p class="mt-2 text-red">Não existem usuários para serem listados</p>
                            </td>
                        </tr>    
                    @endif    
                </tbody>
            </table>
            <div class="mt-3">
                @if (isset($filters))
                    {!! $users->appends($filters)->links() !!}
                @else
                    {!! $users->links() !!}                    
                @endif                
            </div>           
       </div>
   </div>
@stop