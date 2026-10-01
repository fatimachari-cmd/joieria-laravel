@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1>{{ __('Llistat de categories') }}</h1>
        <a href="{{ route('categoria.create') }}" class="btn btn-primary">
            {{ __('Afegir categoria') }}
        </a>
    </div>

    <table class="table table-bordered mb-5 mt-5">
        <thead>
            <tr class="table-success">
                <th>{{ __('Id') }}</th>
                <th>{{ __('Nom') }}</th>
                <th>{{ __('Accions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $categoria)
            <tr>
                <th scope="row">{{ $categoria->id }}</th>
                <td>{{ $categoria->nom }}</td>
                <td>
                    <a href="{{ route('categoria.edit', $categoria->id) }}" class="btn btn-warning">{{ __('Editar') }}</a>
                    <a href="#" class="btn btn-danger" onclick="document.getElementById('delete-categoria-{{ $categoria->id }}').submit()">{{ __('Eliminar') }}</a>
                    <form id="delete-categoria-{{ $categoria->id }}" action="{{ route('categoria.destroy', ['categoria' => $categoria->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">
                    <div class="text-center" role="alert">
                        <p><strong>{{ __('No hi ha cap categoria') }}</strong></p>
                        <span>{{ __('No hi ha cap dada a mostrar') }}</span>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $categories->links() !!}
    </div>
</div>
@endsection