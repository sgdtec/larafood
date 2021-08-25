@extends('adminlte::page')

@section('title', "Detalhes do mesa - {$table->identify}")

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('tables.index')}}">Mesas</a></li>
            <li class="breadcrumb-item active">Detalhes da Mesa</li>
        </ol>
    </nav>
    <h1>
        <i class="far fa-tablet"></i>
        Detalhes da Mesa
    </h1>    
@stop

@section('content')   
   <div class="card card-outline card-primary">
        <div class="card-body">
            <div class="form-group">
                <label>Identificador da Mesa</label>
                <input type="text" 
                       class="form-control" 
                       value="{{ $table->identify }}" />
            </div>

            <div class="form-group">
                <label>Descrição</label>
                <input type="text" 
                       class="form-control" 
                       value="{{ $table->description }}" />
            </div>

            <form action="{{ route('tables.destroy', $table->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Deletar a Mesa</button>
            </form>
        <div>
    </div>
@endsection