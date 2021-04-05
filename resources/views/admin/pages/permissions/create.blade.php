@extends('adminlte::page')

@section('title', 'Novo Perfil')

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">Permissões</a></li>
            <li class="breadcrumb-item active">Nova Permissão</li>
        </ol>
    </nav>
    <h1>
        <i class="far fa-list-alt"></i>
        Nova Permissão
    </h1>    
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.store') }}" class="form" method="POST">                
                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
   </div>
@endsection