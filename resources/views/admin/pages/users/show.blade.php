@extends('adminlte::page')

@section('title', "Detalhes do usero - {$user->name}")

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuário</a></li>
            <li class="breadcrumb-item active">Detalhes do Usuário</li>
        </ol>
    </nav>
    <h1>
        <i class="far fa-user"></i>
        Detalhes do usuário
    </h1>    
@stop

@section('content')
   @include('admin.includes.alerts')
   
   <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label>Nome do Usuário</label>
                <input type="text" 
                       class="form-control" 
                       value="{{ $user->name }}" />
            </div>

            <div class="form-group">
                <label>E-mail do Usuário</label>
                <input type="text" 
                       class="form-control" 
                       value="{{ $user->email }}" />
            </div>

            <div class="form-group">
                <label>Nome da Empresa</label>
                <input type="text" 
                       class="form-control" 
                       value="{{ $user->tenant->name }}" />
            </div>

            <div class="form-group">
                <label>Data cadastro</label>
                <input type="text"
                       class="form-control" 
                       value="{{ date('d/m/Y', strtotime($user->created_at)) }}" />
            </div>

            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Deletar Usuário</button>
            </form>
        <div>
    </div>
@endsection