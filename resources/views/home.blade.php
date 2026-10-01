@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4 class="mb-4">Benvinguda, {{ Auth::user()->name }}</h4>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <h5 class="card-title mb-2">Productes</h5>
                            <p class="text-muted small">Gestiona tots els productes de la botiga</p>
                            <a href="{{ url('producte') }}" class="btn btn-dark mt-2">Veure productes</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <h5 class="card-title mb-2">Categories</h5>
                            <p class="text-muted small">Gestiona les categories de la botiga</p>
                            <a href="{{ url('categoria') }}" class="btn btn-dark mt-2">Veure categories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection