@extends('adminlte::page')

@section('title', 'Perfis disponíveis para o plano {$plan->name}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.profiles', $plan->id) }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.profiles.available', $plan->id) }}" class="active">Disponíveis</a></li>
    </ol>

    <h1>Perfis disponíveis para o plano <strong>{{ $plan->name }}</strong></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.profiles.available', $plan->id) }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr>
                        <th width="30" class="text-center">#</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('plans.profiles.attach', $plan->id) }}" method="POST">
                        @csrf
                        @if (count($profiles) > 0)
                            @foreach ($profiles as $profile)
                                <tr>
                                    <td class="text-center">
                                        <input type="checkbox" name="profiles[]" value="{{ $profile->id }}">
                                    </td>
                                    <td>
                                        {{ $profile->name }}
                                    </td>
                                    <td>
                                        {{ $profile->description }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5">
                                    <button type="submit" class="mt-2 btn btn-warning btn-sm"><i class="fas fa-bezier-curve"></i> Vincular</button>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="5">
                                    <p class="mt-2 text-red">Não existem permissões liberadas para o perfil.</p>
                                </td>
                            </tr>    
                        @endif
                    </form>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop