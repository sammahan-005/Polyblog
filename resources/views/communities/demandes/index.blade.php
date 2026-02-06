@extends('base')

@section('title', 'Demandes en attente')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center mb-4">
        <div class="col-lg-8">
            <div class="d-flex align-items-center gap-3">
                <div class="p-3 bg-dark rounded-4 shadow-sm">
                    <i class="bi bi-people-fill text-warning  fs-4"></i>
                </div>
                <div>
                    <h1 class="h3 fw-black text-dark mb-0 text-uppercase">Demandes d'adhésion</h1>
                    <p class="text-muted small mb-0">{{ $community->name }} • {{$community->demandes->where('status', 'pending')->count() }} en attente</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            @forelse($community->demandes->where('status', 'pending') as $request)
                <div class="card border-0 shadow-sm rounded-4 mb-3 transition-up overflow-hidden">
                    <div class="card-body p-3 p-md-4">
                        <div class="d-flex align-items-center justify-content-between">
                            
                            <div class="d-flex align-items-center">
                                <div class="avatar-placeholder rounded-circle bg-light d-flex align-items-center justify-content-center me-3 border" 
                                     style="width: 55px; height: 55px; border-color: {{ $community->color }} !important;">
                                    <i class="bi bi-person fs-3 text-secondary"></i>
                                </div>
                                <div>
                                    <h6 class="fw-black text-dark mb-1 text-uppercase">{{ $request->user->name }}</h6>
                                    <span class="text-muted" style="font-size: 0.75rem;">
                                        <i class="bi bi-clock-history me-1"></i>Il y a {{ $request->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <form action="{{ route('communities.demandes.accept', ['community' => $community, 'demande' => $request]) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-warning rounded-circle shadow-sm p-0 d-flex align-items-center justify-content-center" 
                                            style="width: 45px; height: 45px;" title="Accepter">
                                        <i class="bi bi-check-lg fs-4 fw-bold"></i>
                                    </button>
                                </form>
                                
                                <form action="{{ route('communities.demandes.refuse', ['community' => $community, 'demande' => $request]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-light text-danger border-0 rounded-circle p-0 d-flex align-items-center justify-content-center" 
                                            style="width: 45px; height: 45px;" title="Refuser">
                                        <i class="bi bi-x-lg fs-5"></i>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5 opacity-75">
                    <i class="bi bi-envelope-open display-4 text-muted mb-3"></i>
                    <h5 class="fw-bold text-secondary">Aucune demande entrante</h5>
                    <a href="{{ route('communities.show', $community) }}" class="btn btn-sm btn-dark rounded-pill mt-3 px-4">Retour à la box</a>
                </div>
            @endforelse
        </div>
    </div>
</div>

<style>
    .fw-black { font-weight: 900; }
    
    .transition-up {
        transition: transform 0.25s ease;
    }
    
    .transition-up:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 20px rgba(0,0,0,0.06) !important;
    }

    .avatar-placeholder {
        background: linear-gradient(145deg, #ffffff, #f0f0f0);
    }

    .btn-warning:hover {
        transform: scale(1.1);
        background-color: #ffc107;
    }

    .btn-outline-light:hover {
        background-color: #fff5f5 !important;
        transform: scale(1.1);
    }
</style>
@endsection