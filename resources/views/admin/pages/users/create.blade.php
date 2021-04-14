@extends('adminlte::page')

@section('title', 'Novo Usuário')

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuários</a></li>
            <li class="breadcrumb-item active">Novo Usuário</li>
        </ol>
    </nav>
    <h1>
        <i class="far fa-user"></i>
        Novo Usuário
    </h1>    
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" class="form" method="POST">                
                @include('admin.pages.users._partials.form')
            </form>
        </div>
   </div>
@endsection