@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Produtos</li>
        </ol>
    </nav>

    <h1>
        <i class="fas fa-hamburger"></i>
        Produtos
    </h1>       
@stop

@section('content')
   <div class="card">
       <div class="card-header pb-0">           
        @include('admin.includes.alerts')
           <div class="row">
               <div class="col-6">
                    <div class="form-group">
                        <form action="{{ route('products.search') }}" class="form form-inline" method="POST">
                            @csrf
                             <div class="form-group">
                               <input type="text" 
                                      name="filter" 
                                      class="form-control form-control-sm" 
                                      placeholder="Faça sua busca...">
                             </div>
                               <button type="submit" class="btn btn-info btn-sm ml-2">Buscar</button>
                        </form>
                    </div>
               </div>
               <div class="col-6">
                   <a href="{{ route('products.create') }}" class="btn btn-info btn-sm float-right"><i class="fas fa-plus"></i> Novo Produto</a>
               </div>               
           </div>            
       </div>
       <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="thead-light">
                    <tr>
                        <th>Imagem</th>
                        <th>Titulo</th>
                        <th>Preço</th>
                        <th width="120">Ações</th>
                    </tr>                    
                </thead>
                <tbody>
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <img src="{{ asset("storage/{$product->image}") }}" 
                                    alt="{{$product->title}}"
                                    style="max-width:80px;">
                                </td>
                                <td>{{ $product->title }}</td>
                                <td>R$ {{ number_format($product->price,2,',', '.') }}</td>
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning btn-sm">Ver</a>
                                    <a href="{{ route('products.edit', $product->id)}}" class="btn btn-info btn-sm">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    @else                       
                        <tr>
                            <td colspan="5">
                                <p class="mt-2 text-red">Não existem produtos para serem listados</p>
                            </td>
                        </tr>    
                    @endif    
                </tbody>
            </table>
            <div class="mt-3">
                @if (isset($filters))
                    {!! $products->appends($filters)->links() !!}
                @else
                    {!! $products->links() !!}                    
                @endif                
            </div>
        </div>
   </div>
@stop