@extends('adminlte::page')

@section('title', "Detalhes do producto - {$product->name}")

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('products.index')}}">Produto</a></li>
            <li class="breadcrumb-item active">Detalhes do Produto</li>
        </ol>
    </nav>
    <h1>
        <i class="fas fa-hamburger"></i>
        Detalhes da Produto
    </h1>    
@stop

@section('content')   
   <div class="card card-outline card-primary">
        <div class="card-body">
            <ul>
                <li>
                    <img src="{{ asset("storage/{$product->image}") }}"
                         alt="{{$product->title}}"
                         style="max-width:80px;">
                </li>
                <li>
                    <strong>Produto:</strong> {{ $product->title }}
                </li>
                <li>
                    <strong>Flag:</strong> {{ $product->flag }}
                </li>
                <li>
                    <strong>Descrição:</strong> {{ $product->description }}
                </li>
            </ul>

            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Deletar o Produto</button>
            </form>
        <div>
    </div>
@endsection