@extends('base')



@section('title', $community->name)



@section('content')

<div class="row mb-5">

    <div class="col-12">

        <div class="card border-0 rounded-4 overflow-hidden shadow-sm">

            <div style="height: 120px; background: linear-gradient(135deg, {{ $community->color }}, #000000);"></div>

           

            <div class="card-body p-4 pt-0">

                <div class="d-flex align-items-center py-3">

    <div class="rounded-4 d-flex align-items-center justify-content-center shadow-sm me-3"

         style="width: 64px; height: 64px; background-color: {{ $community->color }}; flex-shrink: 0;">

        <i class="bi bi-box-fill text-white fs-2"></i>

    </div>

   

    <div class="overflow-hidden">

        <h1 class="h3 fw-black text-dark mb-1 text-uppercase text-truncate">{{ $community->name }}</h1>

        <div class="d-flex align-items-center gap-2">

            <span class="badge rounded-pill fw-bold" style="background-color: {{ $community->color }}15; color: {{ $community->color }}; font-size: 0.7rem; letter-spacing: 0.5px;">

                {{ $community->owner->name ?? 'Anonyme' }}

            </span>

            <small class="text-muted fw-semibold" style="font-size: 0.75rem;">

                @if($community->is_private)

                 <i class="bi bi-shield-lock-fill me-1"></i> Privée

                @else

                <i class="bi bi-people-fill me-1"></i> Public

                @endif

            </small>

            {{-- Bouton des demandes d'adhésion (Visible uniquement pour le propriétaire) --}}
            @if(Auth::id()== $community->user_id && $community->is_private) 
                <div class="d-flex justify-content-center mb-3">
                    <a href="{{ route('communities.demandes.index', $community) }}" class="btn btn-dark btn-sm rounded-pill px-3 fw-bold shadow-sm d-flex align-items-center gap-2 border-2" style="border-color: {{ $community->color }};">
                        <i class="bi bi-person-plus-fill" style="color: {{ $community->color }};"></i>
                        <span>Demandes</span>
                        @if($community->pending_requests_count > 0)
                            <span class="badge rounded-circle bg-danger p-1" style="width: 8px; height: 8px;"></span>
                        @endif
                    </a>
                </div>
             @endif 

        </div>

    </div>

</div>

               

                <div class="row align-items-center">

                    <div class="col-lg-8">

                        <p class="lead text-secondary mb-0">

                            {{ $community->description }}

                        </p>

                    </div>

                    @if($community->messages->count())

                      <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">

                        <a href="{{ route('messages.community.create', ['community' => $community]) }}"

                           class="btn btn-lg fw-bold rounded-pill px-4 shadow"

                           style="background-color: {{ $community->color }}; color: #fff;">

                            <i class="bi bi-megaphone-fill me-2"></i>Confesser

                        </a>

                    </div>  

                   

                    @endif

                   

                </div>

            </div>

        </div>

    </div>

</div>



<div class="row justify-content-center">

    <div class="col-lg-8">
        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
        @endif    

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3 class="fw-bold text-dark">Dernières entrées</h3>

        </div>



        @forelse($community->messages as $message)

            <div class="card border-0 shadow-sm rounded-4 mb-4 transition-hover">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <div class="d-flex align-items-center">

                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">

                                <i class="bi bi-person-fill text-secondary"></i>

                            </div>

                            <span class="fw-bold text-dark small">{{ $message->user->name ?? 'Anonyme' }}</span>

                        </div>

                        <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>

                    </div>

                   

                    <p class="fs-5 text-dark-emphasis mb-3">

                        {{ $message->content }}

                    </p>



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



                        <form action="{{ route('messages.report', ['message' => $message]) }}" method="POST">

                            @csrf

                            <button type="submit" class="btn btn-sm text-secondary opacity-50 p-0 border-0 bg-transparent">

                                <i class="bi bi-flag"></i>

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="card border-0 bg-light rounded-4 py-5 text-center">

                <i class="bi bi-chat-quote display-1 text-muted opacity-25"></i>

                <p class="text-muted mt-3">La boîte est vide. Soyez le premier à briser le silence.</p>

            </div>

            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">

                <a href="{{ route('messages.community.create', ['community' => $community]) }}"

                    class="btn btn-lg fw-bold rounded-pill px-4 shadow"

                    style="background-color: {{ $community->color }}; color: #fff;">

                    <i class="bi bi-megaphone-fill me-2"></i>Confesser

                </a>

            </div>

        @endforelse

    </div>

</div>



<style>

    .fw-black { font-weight: 900; }

    .transition-hover { transition: 0.3s; }

    .transition-hover:hover { transform: scale(1.01); }

</style>

@endsection