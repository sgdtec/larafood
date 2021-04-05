@extends('adminlte::page')

@section('title', "Detalhes do plano - {$profile->name}")

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">Perfil</a></li>
            <li class="breadcrumb-item active">Detalhes do Perfil</li>
        </ol>
    </nav>
    <h1>
        <i class="far fa-list-alt"></i>
        Detalhes do Perfil
    </h1>    
@stop

@section('content')
   @include('admin.includes.alerts')
   
   <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label>Nome do Perfil</label>
                <input type="text" 
                       class="form-control" 
                       value="{{ $profile->name }}" />
            </div>

            <div class="form-group">
                <label>Descrição</label>
                <input type="text" 
                       class="form-control" 
                       value="{{ $profile->description }}" />
            </div>

            <div class="form-group">
                <label>Criação do Perfil</label>
                <input type="text"
                       class="form-control" 
                       value="{{ date('d/m/Y', strtotime($profile->created_at)) }}" />
            </div>

            <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Deletar Perfil</button>
            </form>
        <div>
    </div>
@endsection