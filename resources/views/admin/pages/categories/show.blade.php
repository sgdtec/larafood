@extends('adminlte::page')

@section('title', "Detalhes do categoryo - {$category->name}")

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorias</a></li>
            <li class="breadcrumb-item active">Detalhes do Categoria</li>
        </ol>
    </nav>
    <h1>
        <i class="far fa-category"></i>
        Detalhes da Categoria
    </h1>    
@stop

@section('content')   
   <div class="card card-outline card-primary">
        <div class="card-body">
            <div class="form-group">
                <label>Nome da Categoria</label>
                <input type="text" 
                       class="form-control" 
                       value="{{ $category->name }}" />
            </div>

            <div class="form-group">
                <label>Url</label>
                <input type="text" 
                       class="form-control" 
                       value="{{ $category->url }}" />
            </div>

            <div class="form-group">
                <label>Descrição</label>
                <input type="text" 
                       class="form-control" 
                       value="{{ $category->description }}" />
            </div>

            <div class="form-group">
                <label>Data cadastro</label>
                <input type="text"
                       class="form-control" 
                       value="{{ date('d/m/Y', strtotime($category->created_at)) }}" />
            </div>

            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Deletar Categoria</button>
            </form>
        <div>
    </div>
@endsection