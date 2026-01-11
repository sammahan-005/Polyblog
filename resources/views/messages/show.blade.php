@extends('base')
@section('content')
@if(session("success"))
            <div class="alert alert-success">
                {{session("success")}}
            </div>
            
@endif 


<div class="container my-4 my-md-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center border-bottom pb-3 mb-4 gap-3">
                <div class="d-flex align-items-center">
                    <a href="{{ route('messages.index') }}" class="btn btn-light border rounded-3 me-3">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <h2 class="h4 fw-bold text-dark mb-0">Détails du message</h2>
                </div>
                <div>
                    <span class="badge rounded-pill bg-warning text-dark px-3 py-2">
                        <i class="bi bi-calendar3 me-1"></i>
                        {{ $message->created_at->diffForHumans() }}
                    </span>
                </div>
            </div>

            <div class="card shadow-sm rounded-4 border-light-subtle mb-5">
                <div class="card-body p-3 p-sm-4 p-lg-5">
                    
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-dark text-warning rounded-circle d-flex align-items-center justify-content-center fw-bold shadow-sm" 
                             style="width: 50px; height: 50px; flex-shrink: 0;">
                            {{ strtoupper(substr($message->user->name, 0, 1)) }}
                        </div>
                        <div class="ms-3">
                            <h5 class="mb-0 fw-bold">{{ $message->user->name }}</h5>
                            <small class="text-muted">{{ $message->created_at->format('d M Y') }}</small>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="card-text text-secondary fs-5 lh-base" style="white-space: pre-wrap;">
                            {{ $message->content }}
                        </p>
                    </div>

                    <div class="card-footer bg-transparent border-0 p-0 d-flex justify-content-between align-items-center">
                        <div class="d-flex gap-2">
                            <form action="{{ route('messages.like', ['message' => $message]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-light btn-sm rounded-pill px-3 border d-flex align-items-center gap-2">
                                    <i class="bi bi-heart-fill text-danger"></i>
                                    <span class="fw-bold">{{ $message->likes->count() }}</span>
                                </button>
                            </form>
                            
                            
                        </div>

                        <form action="{{ route('messages.report', ['message' => $message]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link text-decoration-none text-muted opacity-50 p-0">
                                <i class="bi bi-flag"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-warning rounded-3 p-2 me-3">
                        <i class="bi bi-chat-left-text-fill text-white"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-0">Commentaires</h3>
                </div>

                <div class="row g-3">
                    @forelse ($message->comments as $comment)
                        <div class="col-12">
                            <div class="card border-0 border-start border-warning border-4 shadow-sm bg-white">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h6 class="mb-0 fw-bold small text-dark">{{ $comment->user->name ?? 'Anonyme' }}</h6>
                                        <small class="text-muted" style="font-size: 0.7rem;">{{ $comment->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="card-text text-secondary small mb-0">
                                        {{ $comment->content }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5 border rounded-4 bg-light">
                            <i class="bi bi-chat-dots fs-1 text-muted opacity-25"></i>
                            <p class="text-muted mt-2">Aucun commentaire pour le moment.</p>
                        </div>
                    @endforelse
                </div>

                <div class="mt-4 pt-3 border-top">
                    <a href="{{ route('comments.create', $message) }}" class="btn btn-warning w-100 w-sm-auto rounded-pill px-4 fw-bold">
                        <i class="bi bi-plus-lg me-1"></i> Ajouter un commentaire
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

    
    

    
    


@endsection