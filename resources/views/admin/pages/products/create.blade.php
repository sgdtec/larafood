@extends('adminlte::page')

@section('title', 'Novo Produto')

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('products.index')}}">Produtos</a></li>
            <li class="breadcrumb-item active">Novo Produto</li>
        </ol>
    </nav>
    <h1>
        <i class="fas fa-hamburger"></i>
        Novo Produto
    </h1>    
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            <form action="{{ route('products.store') }}" class="form" method="POST" enctype="multipart/form-data">                
                @include('admin.pages.products._partials.form')
            </form>
        </div>
   </div>
@endsection