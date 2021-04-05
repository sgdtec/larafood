@extends('adminlte::page')

@section('title', 'Novo Perfil')

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">Perfil</a></li>
            <li class="breadcrumb-item active">Novo Plano</li>
        </ol>
    </nav>
    <h1>
        <i class="far fa-list-alt"></i>
        Novo Perfil
    </h1>    
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.store') }}" class="form" method="POST">                
                @include('admin.pages.profiles._partials.form')
            </form>
        </div>
   </div>
@endsection