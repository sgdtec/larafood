@extends('adminlte::page')

@section('title', 'Nova Mesa')

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('tables.index')}}">Mesas</a></li>
            <li class="breadcrumb-item active">Nova Mesa</li>
        </ol>
    </nav>
    <h1>
        <i class="fas fa-tablet"></i>
        Nova Mesa
    </h1>    
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            <form action="{{ route('tables.store') }}" class="form" method="POST">                
                @include('admin.pages.tables._partials.form')
            </form>
        </div>
   </div>
@endsection