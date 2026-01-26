@extends('base')
@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                
                <div class="bg-dark position-relative" style="height: 140px;">
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-light rounded-pill position-absolute top-0 start-0 m-3 border-0 opacity-75">
                        <i class="bi bi-arrow-left me-1"></i> Retour
                    </a>
                </div>
                
                <div class="card-body p-4 p-sm-5 text-center">
                    <div class="position-relative mb-4" style="margin-top: -90px;">
                        <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center fw-bold shadow border border-5 border-white" 
                             style="width: 120px; height: 120px; font-size: 3rem;">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    </div>

                    <h2 class="fw-bold text-dark mb-1">{{ $user->name }}</h2>
                    
                    {{-- @if ($user->id == Auth::id())
                    <p class="text-muted mb-4">{{ $user->email }}</p>
                    @endif --}}

                    <div class="row g-3 mb-5">
                        <div class="col-6">
                            <div class="p-3 bg-light rounded-4 border border-light-subtle h-100">
                                <i class="bi bi-chat-left-quote text-warning fs-3 mb-2 d-block"></i>
                                <span class="d-block fw-bold h4 mb-0 text-dark">{{ $user->messages->count() ?? 0 }}</span>
                                <small class="text-muted text-uppercase fw-semibold" style="font-size: 0.7rem;">Messages</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 bg-light rounded-4 border border-light-subtle h-100">
                                <i class="bi bi-chat-dots text-warning fs-3 mb-2 d-block"></i>
                                <span class="d-block fw-bold h4 mb-0 text-dark">{{ $user->comments->count() ?? 0 }}</span>
                                <small class="text-muted text-uppercase fw-semibold" style="font-size: 0.7rem;">Commentaires</small>
                            </div>
                        </div>
                    </div>

                    <ul class="list-group list-group-flush text-start mb-5">
                        <li class="list-group-item px-0 py-3 border-light d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-calendar-check me-3 text-secondary"></i>
                                <span class="text-secondary">Inscrit le</span>
                            </div>
                            <span class="fw-semibold text-dark">{{ $user->created_at->format('d F Y') }}</span>
                        </li>
                        <li class="list-group-item px-0 py-3 border-light d-flex justify-content-between align-items-center border-bottom-0">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-shield-lock me-3 text-secondary"></i>
                                <span class="text-secondary">Statut compte</span>
                            </div>
                            <span class="badge rounded-pill bg-dark text-warning px-3 py-2">
                                @if($user->email_verified_at)
                                    <i class="bi bi-patch-check-fill me-1"></i> Vérifié
                                @else
                                    <i class="bi bi-x-circle-fill me-1"></i> Non vérifié
                                @endif
                                
                            </span>
                        </li>
                    </ul>
                     @if ($user->id == Auth::id())
                    <div class="d-grid gap-3">
                        {{-- <a href="#" class="btn btn-warning btn-lg rounded-pill fw-bold py-3 shadow-sm">
                            <i class="bi bi-pencil-square me-2"></i> Modifier mes informations
                        </a> --}}
                        <form action="{{ route('auth.logout') }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-link text-danger text-decoration-none fw-semibold">
                                <i class="bi bi-box-arrow-right me-1"></i> Déconnexion
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>

            <div class="text-center mt-4">
                <p class="text-muted small opacity-50">ID Utilisateur : #{{ ($user->id)+500 }}</p>
            </div>
            
        </div>
    </div>
</div>

@endsection