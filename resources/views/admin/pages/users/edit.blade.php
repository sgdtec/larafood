@extends('adminlte::page')

@section('title', 'Altera o usuário')

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuários</a></li>
            <li class="breadcrumb-item active">Altera usuário</li>
        </ol>
    </nav>
    <h1>
        <i class="far fa-user"></i>
        Altera o usuário
    </h1>    
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.users._partials.form')
            </form>
        </div>
   </div>
@endsection