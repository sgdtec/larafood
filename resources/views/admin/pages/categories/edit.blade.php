@extends('adminlte::page')

@section('title', 'Altera a Categoria')

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorias</a></li>
            <li class="breadcrumb-item active">Altera a Categoria</li>
        </ol>
    </nav>
    <h1>
        <i class="far fa-category"></i>
        Altera a Categoria
    </h1>    
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.categories._partials.form')
            </form>
        </div>
   </div>
@endsection