@extends('base')

@section('title', 'Toutes les Communautés')

@section('content')
<div class="container py-5">
    
    <div class="text-center mb-5 pb-4">
        <h1 class="display-2 fw-black text-dark mb-0" style="letter-spacing: -3px;">EXPLORER LES COMMUNAUTÉS</h1>
        <p class="text-secondary lead fw-bold text-uppercase" style="letter-spacing: 3px; font-size: 0.9rem;">
            Entrez dans les sphères de la <span class="text-warning">Black Box</span>
        </p>
        @if($communities->isNotEmpty())
            <div class="mt-4">
                <a href="{{ route('communities.create') }}" class="btn btn-dark btn-lg rounded-pill px-5 py-3 shadow-lg border-2 border-warning transition-up">
                    <i class="bi bi-patch-plus-fill me-2 text-warning"></i> CRÉER UN NOUVEL ESPACE
                </a>
            </div> 
        
        @endif
        
    </div>

    <div class="row g-4">
        @foreach($communities as $community)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-lg rounded-5 overflow-hidden transition-up community-card">
                    
                    <div class="p-4 pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="rounded-circle shadow-sm d-flex align-items-center justify-content-center" 
                                 style="width: 45px; height: 45px; background-color: {{ $community->color }}; color: white;">
                                <i class="bi bi-box-fill fs-5"></i>
                            </div>
                            <div class="px-3 py-1 rounded-pill fw-bold small shadow-sm" 
                                 style="background-color: white; color: {{ $community->color }}; border: 1px solid {{ $community->color }}40;">
                                @if($community->is_private)
                                    <i class="bi bi-lock-fill me-1"></i> Privé
                                @else
                                    <i class="bi bi-globe-americas me-1"></i> Public
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <h3 class="fw-black text-dark mb-2 text-uppercase" style="font-size: 1.4rem;">
                            {{ $community->name }}
                        </h3>
                        
                        <p class="card-text text-muted mb-4 lh-sm">
                            {{ Str::limit($community->description, 85, '...') }}
                        </p>

                        <div class="d-flex justify-content-between align-items-center mt-auto border-top pt-3" style="border-color: #f1f1f1 !important;">
                            <div class="text-dark fw-bold small">
                                <i class="bi bi-chat-right-text-fill text-warning me-1"></i> 
                                {{ $community->messages->count() ?? 0 }} <span class="text-muted fw-normal">posts</span>
                            </div>
                            <a href="{{ route('communities.show', $community) }}" class="btn btn-dark btn-sm rounded-pill px-4 fw-bold shadow-sm">
                                Entrer <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>

                    <div style="height: 5px; background-color: {{ $community->color }};"></div>
                </div>
            </div>
        @endforeach
    </div>

    @if($communities->isEmpty())
        <div class="text-center py-5">
            <div class="bg-light d-inline-block p-5 rounded-circle mb-4">
                <i class="bi bi-inboxes display-1 text-muted"></i>
            </div>
            <h2 class="fw-black text-dark">LA BOÎTE EST VIDE</h2>
            <p class="lead text-muted">Soyez celui qui allume la mèche.</p>
            <a href="{{ route('communities.create') }}" class="btn btn-warning btn-lg rounded-pill fw-bold mt-3 px-5">CRÉER LE PREMIER ESPACE</a>
        </div>
    @endif
</div>

<style>
    .fw-black { font-weight: 900; }
    
    .community-card {
        background: linear-gradient(145deg, #ffffff, #f9f9f9);
        border: 1px solid rgba(0,0,0,0.05) !important;
    }

    .transition-up {
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
    }

    .transition-up:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.12) !important;
    }

    /* Animation subtile pour le bouton créer */
    .btn-warning:hover {
        filter: brightness(1.05);
        letter-spacing: 0.5px;
    }

    /* Style pour le texte de description */
    .card-text {
        min-height: 3rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection