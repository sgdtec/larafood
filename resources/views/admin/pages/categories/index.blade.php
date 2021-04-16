@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Categorias</li>
        </ol>
    </nav>

    <h1>
        <i class="fas fa-layer-group"></i>
        Categorias
    </h1>       
@stop

@section('content')
   <div class="card">
       <div class="card-header pb-0">           
        @include('admin.includes.alerts')
           <div class="row">
               <div class="col-6">
                    <div class="form-group">
                        <form action="{{ route('categories.search') }}" class="form form-inline" method="POST">
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
                   <a href="{{ route('categories.create') }}" class="btn btn-info btn-sm float-right"><i class="fas fa-plus"></i> Nova Categoria</a>
               </div>               
           </div>            
       </div>
       <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="thead-light">
                    <tr>
                        <th>Nome</th>
                        <th>Description</th>
                        <th width="120">Ações</th>
                    </tr>                    
                </thead>
                <tbody>
                    @if (count($categories) > 0)
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-warning btn-sm">Ver</a>
                                    <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-info btn-sm">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    @else                       
                        <tr>
                            <td colspan="5">
                                <p class="mt-2 text-red">Não existem categorias para serem listados</p>
                            </td>
                        </tr>    
                    @endif    
                </tbody>
            </table>
            <div class="mt-3">
                @if (isset($filters))
                    {!! $categories->appends($filters)->links() !!}
                @else
                    {!! $categories->links() !!}                    
                @endif                
            </div>
        </div>
   </div>
@stop