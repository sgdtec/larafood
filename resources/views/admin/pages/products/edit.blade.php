@extends('adminlte::page')

@section('title', 'Altera a Categoria')

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('products.index')}}">Produtos</a></li>
            <li class="breadcrumb-item active">Altera o Produto</li>
        </ol>
    </nav>
    <h1>
        <i class="fas fa-hamburger"></i>
        Altera o Produto
    </h1>    
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('admin.pages.products._partials.form')
            </form>
        </div>
   </div>
@endsection