@extends('adminlte::page')

@section('title', 'Altera o Perfil')

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">Perfil</a></li>
            <li class="breadcrumb-item active">Altera Perfil</li>
        </ol>
    </nav>
    <h1>
        <i class="far fa-list-alt"></i>
        Altera o Perfil
    </h1>    
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.update', $profile->id) }}" class="form" method="POST">
                @method('PUT')
                @include('admin.pages.profiles._partials.form')
            </form>
        </div>
   </div>
@endsection