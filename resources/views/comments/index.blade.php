@extends('base')

@section('content')

<div class="container py-4 py-md-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-7">
            
            <div class="mb-4">
                <a href="{{ url()->previous() }}" class="text-decoration-none text-secondary small d-flex align-items-center gap-2">
                    <i class="bi bi-chevron-left"></i>
                    Retour au message
                </a>
            </div>

            <div class="card border-0 border-start border-warning border-4 bg-light-subtle mb-4 shadow-sm">
                <div class="card-body py-2 px-3">
                    <div class="d-flex align-items-center mb-1">
                        <i class="bi bi-quote text-warning me-2"></i>
                        <span class="fw-bold small text-dark">{{ $message->user->name }} a écrit :</span>
                    </div>
                    <p class="text-muted mb-0 small text-truncate">
                        "{{ $message->content }}"
                    </p>
                </div>
            </div>

            <div class="card border border-light-subtle shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">
                    
                    <div class="text-center mb-4">
                        <div class="bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" 
                             style="width: 60px; height: 60px;">
                            <i class="bi bi-chat-right-text-fill fs-3"></i>
                        </div>
                        <h2 class="h4 fw-bold text-dark">Laisser un commentaire</h2>
                        <p class="text-muted small">Partagez votre avis sur ce message</p>
                    </div>

                    <form action="{{ route('comments.store', ['message' => $message]) }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            
                        </div>

                        <div class="mb-4">
                            <label for="content" class="form-label fw-bold text-dark small">Votre Commentaire</label>
                            
                            
                            <textarea name="content" 
                                      id="content" 
                                      rows="5" 
                                      class="form-control rounded-3 shadow-none @error('content') is-invalid @enderror" 
                                      placeholder="Qu'en pensez-vous ?" 
                                      required></textarea>
                            @error('content')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-dark btn-lg rounded-pill fw-bold text-warning shadow-sm py-3 mt-2">
                                <i class="bi bi-send-check-fill me-2"></i>
                                Publier mon commentaire
                            </button>
                            <a href="{{ route('messages.show', $message) }}" class="btn btn-link text-muted text-decoration-none small">
                                Annuler
                            </a>
                        </div>

                    </form>
                </div>
            </div>

            

        </div>
    </div>
</div>

@endsection