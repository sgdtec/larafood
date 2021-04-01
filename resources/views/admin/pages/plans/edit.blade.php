@extends('adminlte::page')

@section('title', 'Altera o plano')

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
            <li class="breadcrumb-item active">Altera Plano</li>
        </ol>
    </nav>
    <h1>
        <i class="far fa-list-alt"></i>
        Altera o Plano
    </h1>    
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.update', $plan->url) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.plans._partials.form')
            </form>
        </div>
   </div>
@endsection