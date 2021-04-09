@extends('adminlte::page')

@section('title', "Perfis da permissão {$permission->name}")

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">Permissão</a></li>
            <li class="breadcrumb-item active">Perfil da Permissão</li>
        </ol>
    </nav>

    <h1>
        <i class="far fa-list-alt"></i>
        Perfil da permissão - <strong>{{ $permission->name}}</strong>
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
           </div>            
       </div>
       <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="thead-light">
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th width="100" class="text-center">Ações</th>
                    </tr>                    
                </thead>
                <tbody>
                    @if (count($profiles) > 0)
                        @foreach ($profiles as $profile)
                            <tr>
                                <td>{{ $profile->name }}</td>
                                <td>{{ $profile->description }}</td>
                                <td class="text-center">
                                    <a href="{{ route('profiles.permissions.detach', [$profile->id, $permission->id]) }}" class="btn btn-secondary btn-sm">Remover</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">
                                <p class="mt-2 text-red">Não existem itens para serem listados</p>
                            </td>
                        </tr>    
                    @endif
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