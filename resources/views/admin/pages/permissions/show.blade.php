@extends('adminlte::page')

@section('title', "Detalhes da permissão - {$permission->name}")

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">Permissão</a></li>
            <li class="breadcrumb-item active">Detalhes da Permissão</li>
        </ol>
    </nav>
    <h1>
        <i class="fas fa-lock"></i>
        Detalhes da Permissão
    </h1>    
@stop

@section('content')   
   <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label>Nome da Permissão</label>
                <input type="text" 
                       class="form-control" 
                       value="{{ $permission->name }}" />
            </div>

            <div class="form-group">
                <label>Descrição</label>
                <input type="text" 
                       class="form-control" 
                       value="{{ $permission->description }}" />
            </div>

            <div class="form-group">
                <label>Criação da Permissão</label>
                <input type="text"
                       class="form-control" 
                       value="{{ date('d/m/Y', strtotime($permission->created_at)) }}" />
            </div>

            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Deletar Permissão</button>
            </form>
        <div>
    </div>
@endsection