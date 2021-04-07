@extends('adminlte::page')

@section('title', "Permissões disponiveis para o perfil {$profile->name}")

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">Perfil</a></li>
            <li class="breadcrumb-item"><a href="{{route('profiles.permissions', $profile->id)}}">Permissões</a></li>
            <li class="breadcrumb-item active">Permissões do Perfil</li>
        </ol>
    </nav>

    <h1>
        <i class="far fa-list-alt"></i>
        Permissões do perfil - <strong>{{ $profile->name}}</strong>
    </h1>       
@stop

@section('content')
   <div class="card">
       <div class="card-header pb-0">
           <div class="row">
               <div class="col-6">
                    <div class="form-group">
                        <form action="{{ route('profiles.permissions.available', $profile->id) }}" class="form form-inline" method="POST">
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
                        <th class="text-center" width="30">#</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                    </tr>                    
                </thead>
                <tbody>
                    @include('admin.includes.alerts')
                    <form action="{{ route('profiles.permissions.attach', $profile->id)}}" method="post">
                        @csrf
                        @if (count($permissions) > 0)
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td class="text-center">
                                        <input type="checkbox" 
                                            name="permissions[]"
                                            value="{{ $permission->id}}">
                                    </td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->description }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5">
                                    <button type="submit" class="mt-2 btn btn-warning btn-sm"><i class="fas fa-bezier-curve"></i> Vincular</button>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="5">
                                    <p class="mt-2 text-red">Não existem permissões liberadas para o perfil.</p>
                                </td>
                            </tr>    
                        @endif
                    </form>
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