@extends('adminlte::page')

@section('title', 'Cadastrar Novo plano')

@section('content_header')
    <h1>Cadastra Novo Plano</h1>    
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.store') }}" class="form" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nome do Plano</label>
                    <input type="text" 
                           name="name"
                           class="form-control" 
                           placeholder="Nome do plano..." >
                </div>
                <div class="form-group">
                    <label>Preço do Plano</label>
                    <input type="text" 
                           name="price"
                           class="form-control" 
                           placeholder="Preço do plano..." >
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <textarea cols="30" rows="3" 
                           name="description"
                           class="form-control" 
                           placeholder="Descrição do plano...">
                    </textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Enviar</button>
                </div>


            </form>
        </div>
   </div>
@endsection