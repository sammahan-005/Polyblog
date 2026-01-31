@extends('base')

@section('title', 'Créer une Communauté')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        
        <div class="text-center mb-5">
            <div class="d-inline-block bg-dark text-warning p-3 rounded-4 shadow-sm mb-3">
                <i class="bi bi-people-fill display-5"></i>
            </div>
            <h2 class="fw-bold text-dark">Nouvelle Communauté</h2>
            <p class="text-muted">Définissez un nouvel espace d'expression anonyme.</p>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('communities.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold text-dark small text-uppercase">Nom de la communauté</label>
                        <input type="text" name="name" id="name" 
                               class="form-control form-control-lg border-2 bg-light rounded-3" 
                               placeholder="Ex: Amphi 500, Vie de Résidence..." required>
                        <div class="form-text">Choisissez un nom percutant et reconnaissable.</div>
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label fw-bold text-dark small text-uppercase">Description</label>
                        <textarea name="description" id="description" rows="3" 
                                  class="form-control border-2 bg-light rounded-3" 
                                  placeholder="De quoi va-t-on parler ici ?">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-5">
                        <label for="color" class="form-label fw-bold text-dark small text-uppercase">Couleur d'identité (personalisable)</label>
                        <div class="d-flex align-items-center gap-3">
                            <input type="color" name="color" id="color" 
                                   class="form-control form-control-color border-0 bg-transparent" 
                                   value="#ffc107" title="Choisir une couleur">
                            <span class="text-muted small">Cette couleur sera utilisée pour les badges de la communauté.</span>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-dark btn-lg fw-bold rounded-pill py-3 shadow">
                            CRÉER L'ESPACE
                        </button>
                        <a href="{{ url()->previous() }}" class="btn btn-link text-secondary text-decoration-none fw-semibold">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-4 text-center">
            <p class="small text-muted">
                <i class="bi bi-info-circle me-1 text-warning"></i> 
                En tant que créateur, vous lancez le mouvement. Modérez avec sagesse.
            </p>
        </div>
    </div>
</div>
@endsection