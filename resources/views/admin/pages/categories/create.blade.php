@extends('adminlte::page')

@section('title', 'Nova Categoria')

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorias</a></li>
            <li class="breadcrumb-item active">Nova Catgegoria</li>
        </ol>
    </nav>
    <h1>
        <i class="fas fa-layer-group"></i>
        Nova Categoria
    </h1>    
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.store') }}" class="form" method="POST">                
                @include('admin.pages.categories._partials.form')
            </form>
        </div>
   </div>
@endsection