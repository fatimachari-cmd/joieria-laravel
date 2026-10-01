<div class="w-full">
    <div class="flex flex-wrap">
        <h1 class="mb-5">{{ $title }}</h1>
    </div>
</div>

<form method="POST" action="{{ $route }}" class="needs-validation" enctype="multipart/form-data">
    @csrf
    @isset($update)
        @method('PUT')
    @endisset

    <div class="mb-3">
        <label for="nom" class="form-label">{{ __('Nom') }}</label>
        <input name="nom" type="text" class="form-control" value="{{ old('nom', $producte->nom) }}">
        @error('nom')
            <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="descripcio" class="form-label">{{ __('Descripció') }}</label>
        <textarea name="descripcio" class="form-control">{{ old('descripcio', $producte->descripcio) }}</textarea>
        @error('descripcio')
            <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="preu" class="form-label">{{ __('Preu') }}</label>
        <input name="preu" type="number" step="0.01" min="0" class="form-control" value="{{ old('preu', $producte->preu) }}">
        @error('preu')
            <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label">{{ __('Stock') }}</label>
        <input name="stock" type="number" min="0" class="form-control" value="{{ old('stock', $producte->stock) }}">
        @error('stock')
            <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="categoria_id" class="form-label">{{ __('Categoria') }}</label>
        <select class="form-select" name="categoria_id">
            @foreach($categories as $categoria)
                <option value="{{ $categoria->id }}" {{ $categoria->id == old('categoria_id', $producte->categoria_id) ? 'selected' : '' }}>
                    {{ $categoria->nom }}
                </option>
            @endforeach
        </select>
        @error('categoria_id')
            <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
    <label for="foto" class="form-label">{{ __('Foto (URL)') }}</label>
    <input name="foto" type="text" class="form-control" placeholder="https://..." value="{{ old('foto', $producte->foto) }}">
    @error('foto')
        <div class="fs-6 text-danger">{{ $message }}</div>
    @enderror
    </div>

    <div class="mb-3">
        <button class="btn btn-primary" type="submit">
            {{ $textButton }}
        </button>
    </div>
</form>