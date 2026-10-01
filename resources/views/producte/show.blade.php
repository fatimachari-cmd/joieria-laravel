@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>{{ $producte->nom }}</h1>
        </div>
        <div class="card-body">
            @if($producte->foto)
                <img src="{{ $producte->foto }}" class="img-fluid mb-3" alt="{{ $producte->nom }}" style="max-height: 300px;">
            @endif
            <p><strong>{{ __('Descripció') }}:</strong> {{ $producte->descripcio }}</p>
            <p><strong>{{ __('Preu') }}:</strong> {{ $producte->preu }} €</p>
            <p>
                <strong>{{ __('Stock') }}:</strong>
                @if($producte->stock == 0)
                    <span class="badge bg-danger">Sense stock</span>
                @elseif($producte->stock <= 3)
                    <span class="badge bg-warning text-dark">{{ $producte->stock }} (baix)</span>
                @else
                    <span class="badge bg-success">{{ $producte->stock }}</span>
                @endif
            </p>
            <p><strong>{{ __('Categoria') }}:</strong> {{ $producte->categoria->nom }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('producte.index') }}" class="btn btn-secondary">{{ __('Tornar') }}</a>
            <a href="{{ route('producte.edit', $producte->id) }}" class="btn btn-warning">{{ __('Editar') }}</a>
            <a href="#" class="btn btn-danger" onclick="document.getElementById('delete-producte-{{ $producte->id }}').submit()">{{ __('Eliminar') }}</a>
            <form id="delete-producte-{{ $producte->id }}" action="{{ route('producte.destroy', $producte->id) }}" method="POST">
                @method('DELETE')
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection