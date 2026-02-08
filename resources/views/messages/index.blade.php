@extends('base')

@section('content')

   
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center border-bottom pb-3 mb-4 gap-2">
    <div class="d-flex align-items-center">
        <div class="bg-light rounded-3 p-2 me-3 border">
            <i class="bi bi-chat-right-quote-fill text-warning fs-4"></i>
        </div>
        <h2 class="h3 fw-bold text-dark mb-0">
            {{ __('Derniers messages publiques') }}
        </h2>
    </div>

    <div>
        <span class="badge rounded-pill bg-warning-subtle text-warning-emphasis border border-warning-subtle px-3 py-2">
            <i class="bi bi-funnel-fill me-1"></i>
            {{ trans_choice('{0} Aucun message|{1} 1 message au total|[2,*] :count messages au total', $messages->where('community_id', null)->count(), ['count' => $messages->where('community_id', null)->count()]) }}
        </span>
    </div>
</div>
<div class="container my-5">
    <div class="row g-4">
        <div class="row justify-content-center mb-5 mt-n2">
    <div class="col-lg-11">
        <div class="card border-0 shadow-lg rounded-5 overflow-hidden contest-card">
            <div class="card-body p-4 p-md-5 position-relative">
                
                <div class="floating-heart opacity-25 position-absolute top-0 end-0 m-4 d-none d-md-block">
                    <i class="bi bi-heart-fill text-white" style="font-size: 8rem;"></i>
                </div>
                
                <div class="position-relative" style="z-index: 2;">
                    <div class="text-center text-md-start mb-4">
                        <span class="badge bg-white text-danger fw-black px-3 py-2 rounded-pill shadow-sm mb-3">
                            <i class="bi bi-trophy-fill me-1"></i> CONCOURS SPÉCIAL SV
                        </span>
                        <h2 class="display-4 fw-black text-white ls-tight">
                            GAGNE JUSQU'À <span class="text-warning">5 000 FCFA</span> / JOUR
                        </h2>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="bg-white bg-opacity-10 border border-white border-opacity-25 rounded-4 p-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="badge rounded-circle bg-warning text-dark fw-black p-0 d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;">1</span>
                                    <p class="text-white small mb-0 fw-bold">Poste un message <span class="text-warning">public</span> dans une box.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bg-white bg-opacity-10 border border-white border-opacity-25 rounded-4 p-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="badge rounded-circle bg-warning text-dark fw-black p-0 d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;">2</span>
                                    <p class="text-white small mb-0 fw-bold">Partage le lien dans <span class="text-warning">5 groupes</span> WhatsApp.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bg-white bg-opacity-10 border border-white border-opacity-25 rounded-4 p-3 h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="badge rounded-circle bg-warning text-dark fw-black p-0 d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;">3</span>
                                    <p class="text-white small mb-0 fw-bold">Envoie les preuves au <span class="text-warning">693756039</span>.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column flex-md-row gap-3 justify-content-center justify-content-md-start">
    <a href="https://wa.me/237693756039?text=Salut!%20Voici%20la%20preuve%20pour%20le%20concours%20Saint%20Valentin" 
       class="btn btn-warning btn-lg rounded-pill px-4 py-3 fw-black shadow-lg hover-scale text-dark flex-grow-1">
        <i class="bi bi-whatsapp me-2"></i>ENVOYER MA PREUVE
    </a>

    <a href="{{ route('concours.share') }}" class="btn btn-outline-light btn-lg rounded-pill px-4 py-3 fw-black shadow-sm hover-scale flex-grow-1">
    <i class="bi bi-share-fill me-2"></i>PARTAGER LE LIEN
    </a>
</div>


                </div>
            </div>
        </div>
    </div>
</div>



<style>
    .fw-black { font-weight: 950; }
    .ls-tight { letter-spacing: -2px; }

    .contest-card {
        background: linear-gradient(135deg, #d31027 0%, #ea384d 100%);
        border: 4px solid #fff !important;
    }

    .floating-heart {
        animation: float 4s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); opacity: 0.2; }
        50% { transform: translateY(-15px); opacity: 0.4; }
    }

    .hover-scale {
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .hover-scale:hover {
        transform: scale(1.05);
        background-color: #ffffff !important;
        border-color: #ffffff !important;
    }

    /* Animation d'entrée */
    .contest-card {
        animation: heartBeat 1.5s ease-in-out;
    }

    @keyframes heartBeat {
        0% { transform: scale(0.95); }
        5% { transform: scale(1.05); }
        10% { transform: scale(0.95); }
        15% { transform: scale(1.05); }
        20% { transform: scale(1); }
    }
</style>
        @foreach ($messages as $message)
        @if(!($message->community_id))
            
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border border-light-subtle shadow-sm rounded-4">
                    
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-dark text-warning rounded-circle d-flex align-items-center justify-content-center fw-bold shadow-sm" 
                                 style="width: 42px; height: 42px; flex-shrink: 0;">
                                {{ strtoupper(substr($message->user->name, 0, 1)) }}
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 fw-semibold text-dark">{{ $message->user->name }}</h6>
                                <div class="text-muted small opacity-75" style="font-size: 0.75rem;">
                                    {{ $message->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            @php
                                $isLong = strlen($message->content) > 200;
                                $shortText = Str::limit($message->content, 200, '');
                                $remainingText = substr($message->content, 200);
                            @endphp

                            <p class="card-text text-secondary lh-base mb-0" style="font-size: 0.95rem;">
                                {{ $shortText }}<span class="collapse" id="collapseMsg{{ $message->id }}">{{ $remainingText }}</span>
                            </p>

                            @if($isLong)
                                <button class="btn btn-sm btn-link text-warning fw-bold p-0 text-decoration-none border-0" 
                                        type="button" 
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#collapseMsg{{ $message->id }}">
                                    Pour lire la suite appuyer sur commentaire
                                </button>
                            @endif
                        </div>
                    </div>

                    <div class="card-footer bg-transparent border-0 px-4 pb-4 pt-0 d-flex justify-content-between align-items-center">
                        <form action="{{ route('messages.like', ['message' => $message]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 border-0 bg-light-subtle d-flex align-items-center gap-2">
                                <i class="bi bi-heart-fill"></i>
                                <span class="fw-bold">{{ $message->likes->count() ?? 0 }}</span>
                            </button>
                        </form>

                        <a href="{{ route('messages.show', $message) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3 border-0 bg-light-subtle d-flex align-items-center gap-2 text-decoration-none">
                            <i class="bi bi-chat-dots"></i>
                            <span class="fw-bold">{{ $message->comments->count() ?? 0 }}</span>
                        </a>
                        {{-- <form action="{{ route('messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Supprimer ce message ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm text-danger opacity-75 p-0 border-0 bg-transparent ms-2">
                                    <i class="bi bi-trash"></i>
                                </button>
                        </form> --}}

                        <form action="{{ route('messages.report', ['message' => $message]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm text-secondary opacity-50 p-0 border-0 bg-transparent">
                                <i class="bi bi-flag"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endif    
        @endforeach
    </div>
</div>

{{ $messages->links() }}


@endsection