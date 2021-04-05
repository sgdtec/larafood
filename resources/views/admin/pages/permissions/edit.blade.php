@extends('adminlte::page')

@section('title', 'Altera Permissão')

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">Permissão</a></li>
            <li class="breadcrumb-item active">Altera Permissão</li>
        </ol>
    </nav>
    <h1>
        <i class="far fa-list-alt"></i>
        Altera Permissão
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