@extends('adminlte::page')

@section('title', "Exibe detalhes d {$detail->name}")

@section('content_header')
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
            <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{ $plan->name }}</a></li>
            <li class="breadcrumb-item"><a href="{{route('details.plan.index', $plan->url)}}">Detalhes</a></li>
            <li class="breadcrumb-item active">Detalhes</li>
        </ol>
    </nav>

    <h1>
        <i class="far fa-list-alt"></i>
        Exibe detalhes - {{ $detail->name}}
    </h1>       
@stop

@section('content')
   <div class="card">
       <div class="card-body">
           <ul>
               <li>
                   <strong>Nome:</strong> {{ $detail->name }}
               </li>
           </ul>

           <form action="{{ route('details.plan.destroy', [$plan->url, $detail->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Deletar Detalhe</button>
            </form>
       </div>
   </div>
@endsection