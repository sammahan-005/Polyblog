@extends('base')

@section('title', 'Accès Privé')

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-12 col-md-8 col-lg-5 text-center">
        
        <div class="mb-4">
            <div class="d-inline-block position-relative">
                <div class="rounded-circle shadow-lg d-flex align-items-center justify-content-center mx-auto" 
                     style="width: 100px; height: 100px; background-color: {{ $community->color }};">
                    <i class="bi bi-shield-lock-fill text-white display-4"></i>
                </div>
                <span class="position-absolute top-0 end-0 badge rounded-pill bg-dark border border-white">
                    PRIVÉ
                </span>
            </div>
        </div>

        <h1 class="fw-black text-dark text-uppercase mb-2" style="letter-spacing: -1px;">
            {{ $community->name }}
        </h1>
        
        

        <div class="card border-0 shadow-sm rounded-5 overflow-hidden bg-light">
    <div class="card-body p-5 text-center">
        <div class="mb-4">
            <div class="spinner-grow text-warning" role="status" style="width: 1.5rem; height: 1.5rem;">
                <span class="visually-hidden">En attente...</span>
            </div>
        </div>

        <h5 class="fw-black text-dark text-uppercase mb-2" style="letter-spacing: 1px;">
            Demande déjà soumise
        </h5>
        
        <p class="text-muted small mb-4 px-lg-3">
            Votre demande d'adhésion est actuellement entre les mains du modérateur. 
            Vous devez attendre sa validation avant de pouvoir accéder au contenu de cette box.
        </p>

        <div class="d-grid gap-3">
            <span class="btn btn-outline-dark rounded-pill py-2 fw-bold disabled opacity-50" style="border-style: dashed;">
                <i class="bi bi-hourglass-split me-2"></i>EXAMEN EN COURS
            </span>
            
            <a href="{{ route('communities.index') }}" class="btn btn-link text-secondary text-decoration-none small fw-bold">
                <i class="bi bi-arrow-left me-1"></i> Retour à l'exploration
            </a>
        </div>
    </div>
</div>

        
    </div>
</div>

<style>
    .fw-black { font-weight: 900; }
    
    .transition-up {
        transition: all 0.3s ease;
    }
    
    .transition-up:hover {
        transform: translateY(-3px);
        background-color: {{ $community->color }} !important;
        border-color: {{ $community->color }} !important;
        color: white !important;
    }

    body {
        background: radial-gradient(circle at center, #ffffff 0%, #f8f9fa 100%);
    }
</style>
@endsection