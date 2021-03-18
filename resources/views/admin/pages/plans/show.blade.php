@extends('adminlte::page')

@section('title', "Detalhes do plano - {$plan->name}")

@section('content_header')
    <h1>Detalhes do Plano</h1>    
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label>Nome do Plano</label>
                <input type="text" class="form-control" value="{{ $plan->name }}" />
            </div>

            <div class="form-group">
                <label>Url do Plano</label>
                <input type="text" class="form-control" value="{{ $plan->url }}" />
            </div>

            <div class="form-group">
                <label>Preço do Plano</label>
                <input type="text" class="form-control" value="R$ {{ number_format($plan->price,2,",",".") }}" />
            </div>

            <div class="form-group">
                <label>Descrição do Plano</label>
                <input type="text" class="form-control" value="{{ $plan->description }}" />
            </div>

            <div class="form-group">
                <label>Criação do Plano</label>
                <input type="text" class="form-control" value="{{ date('d/m/Y', strtotime($plan->created_at)) }}" />
            </div>

            <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Deletar Plano</button>
            </form>
        <div>
    </div>
@endsection
