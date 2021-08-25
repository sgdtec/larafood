@extends('adminlte::page')

@section('title', 'Altera a Mesa')

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('tables.index')}}">Mesas</a></li>
            <li class="breadcrumb-item active">Alterar a Mesa</li>
        </ol>
    </nav>
    <h1>
        <i class="fas fa-tablet"></i>
        Altera a Mesa
    </h1>    
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            <form action="{{ route('tables.update', $table->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.tables._partials.form')
            </form>
        </div>
   </div>
@endsection