@extends('adminlte::page')

@section('title', 'Peris')

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Perfis</li>
        </ol>
    </nav>

    <h1>
        <i class="far fa-list-alt"></i>
        Perfis
    </h1>       
@stop

@section('content')
   <div class="card">
       <div class="card-header pb-0">
           @include('admin.includes.alerts')

           <div class="row">
               <div class="col-6">
                    <div class="form-group">
                        <form action="{{ route('profiles.search') }}" class="form form-inline" method="POST">
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
                   <a href="{{ route('profiles.create') }}" class="btn btn-info float-right">Novo Perfil</a>
               </div>               
           </div>            
       </div>
       <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="thead-light">
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Criado</th>
                        <th width="140" class="text-center">Ações</th>
                    </tr>                    
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{ $profile->name }}</td>
                            <td>{{ $profile->description }}</td>
                            <td>{{ date('d/m/Y', strtotime($profile->created_at)) }}</td>
                            <td class="text-center">
                                <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-warning btn-sm">Ver</a>
                                <a href="{{ route('profiles.edit', $profile->id)}}" class="btn btn-info btn-sm">Editar</a>
                                <a href="{{ route('profiles.permissions', $profile->id)}}" class="btn btn-secondary btn-sm"><i class="fas fa-lock"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                @if (isset($filters))
                    {!! $profiles->appends($filters)->links() !!}
                @else
                    {!! $profiles->links() !!}                    
                @endif
                
            </div>           
       </div>
   </div>
@stop