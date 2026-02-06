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
        <p class="text-muted mb-5 px-lg-4">
            Cet espace est une boîte privée. Pour lire les secrets qui s'y cachent et partager les vôtres, vous devez d'abord rejoindre la communauté.
        </p>
        

        <div class="card border-0 shadow-sm rounded-5 overflow-hidden bg-light">
            <div class="card-body p-4">
                <form action="{{ route('communities.joinrequest', $community) }}" method="POST">
                    @csrf
                    <div class="d-grid gap-3">
                        <button type="submit" class="btn btn-dark btn-lg fw-black rounded-pill py-3 shadow transition-up">
                            DEMANDER L'ACCÈS
                        </button>
                        
                        <a href="{{ route('communities.index') }}" class="btn btn-link text-secondary text-decoration-none small fw-bold">
                            <i class="bi bi-arrow-left me-1"></i> Retour à l'exploration
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <p class="mt-4 small text-muted opacity-50">
            <i class="bi bi-info-circle me-1"></i> Votre demande sera soumise au modérateur de cette box.
        </p>
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