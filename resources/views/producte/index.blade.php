@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1>{{ __('Llistat de productes') }}</h1>
        <a href="{{ route('producte.create') }}" class="btn btn-primary">
            {{ __('Afegir producte') }}
        </a>
    </div>

    <table class="table table-bordered mb-5 mt-5">
        <thead>
            <tr class="table-success">
                <th>{{ __('Id') }}</th>
                <th>{{ __('Nom') }}</th>
                <th>{{ __('Preu') }}</th>
                <th>{{ __('Stock') }}</th>
                <th>{{ __('Categoria') }}</th>
                <th>{{ __('Accions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productes as $producte)
            <tr>
                <th scope="row">{{ $producte->id }}</th>
                <td>{{ $producte->nom }}</td>
                <td>{{ $producte->preu }} €</td>
                <td>
                    @if($producte->stock == 0)
                        <span class="badge bg-danger">Sense stock</span>
                    @elseif($producte->stock <= 3)
                        <span class="badge bg-warning text-dark">{{ $producte->stock }} (baix)</span>
                    @else
                        <span class="badge bg-success">{{ $producte->stock }}</span>
                    @endif
                </td>
                <td>{{ $producte->categoria->nom }}</td>
                <td>
                    <a href="{{ route('producte.show', ['producte' => $producte->id]) }}" class="btn btn-info">{{ __('Veure') }}</a>
                    <a href="{{ route('producte.edit', ['producte' => $producte->id]) }}" class="btn btn-warning">{{ __('Editar') }}</a>
                    <a href="#" class="btn btn-danger" onclick="document.getElementById('delete-producte-{{ $producte->id }}').submit()">{{ __('Eliminar') }}</a>
                    <form id="delete-producte-{{ $producte->id }}" action="{{ route('producte.destroy', ['producte' => $producte->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">
                    <div class="text-center" role="alert">
                        <p><strong>{{ __('No hi ha cap producte') }}</strong></p>
                        <span>{{ __('No hi ha cap dada a mostrar') }}</span>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $productes->links() !!}
    </div>
</div>
@endsection