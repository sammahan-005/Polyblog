@extends('base')

@section('title', 'Demande envoyée')

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-12 col-md-8 col-lg-5 text-center">
        
        <div class="mb-5">
            <div class="d-inline-block position-relative">
                <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto pulse-animation" 
                     style="width: 120px; height: 120px; background-color: {{ $community->color }}15;">
                    <div class="rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                         style="width: 80px; height: 80px; background-color: {{ $community->color }};">
                        <i class="bi bi-send-check-fill text-white display-5"></i>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="fw-black text-dark text-uppercase mb-3" style="letter-spacing: -1px;">
            DEMANDE ENVOYÉE
        </h1>
        
        <div class="bg-light p-4 rounded-4 mb-5 border-start border-4" style="border-color: {{ $community->color }} !important;">
            <p class="text-secondary mb-0">
                Votre requête pour intégrer la communauté <span class="fw-black text-dark text-uppercase mb-3">{{ $community->name }}</span> a été transmise au modérateur.
            </p>
        </div>

        <p class="text-muted small mb-5">
            Revenez regulierement pour verifier que votre accès a été validé. <br>
            En attendant,<span class="fw-black text-dark text-uppercase mb-3"> la discrétion reste de mise.</span>
        </p>

        <div class="d-grid gap-2 col-md-8 mx-auto">
            <a href="{{ route('communities.index') }}" class="btn btn-dark btn-lg fw-black rounded-pill py-3 shadow-sm transition-up">
                RETOUR À L'INDEX
            </a>
            <a href="/" class="btn btn-link text-warning fw-bold text-decoration-none small">
                Aller à l'accueil
            </a>
        </div>

    </div>
</div>

<style>
    .fw-black { font-weight: 900; }
    
    /* Animation de pulsation pour le succès */
    .pulse-animation {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 {{ $community->color }}30; }
        70% { transform: scale(1); box-shadow: 0 0 0 20px {{ $community->color }}00; }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 {{ $community->color }}00; }
    }

    .transition-up {
        transition: all 0.3s ease;
    }
    
    .transition-up:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
</style>
@endsection