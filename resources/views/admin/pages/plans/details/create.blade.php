@extends('adminlte::page')

@section('title', "Adicionar novo detalhe ao plano {$plan->name}")

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{ $plan->name }}</a></li>
            <li class="breadcrumb-item"><a href="{{route('details.plan.index', $plan->url)}}">Detalhes</a></li>
            <li class="breadcrumb-item active">Novo Detalhes</li>
        </ol>
    </nav>

    <h1>
        <i class="far fa-list-alt"></i>
        Adiciona detalhe ao plano {{ $plan->name}}
    </h1>       
@stop

@section('content')
   <div class="card">
       <div class="card-body">
            <form action="{{route('details.plan.store', $plan->url)}}" method="POST">
                @include('admin.pages.plans.details._partials.form')     
            </form>
       </div>
   </div>
@endsection