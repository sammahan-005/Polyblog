@extends('base')

@section('content')

   
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center border-bottom pb-3 mb-4 gap-2">
    <div class="d-flex align-items-center">
        <div class="bg-light rounded-3 p-2 me-3 border">
            <i class="bi bi-chat-right-quote-fill text-warning fs-4"></i>
        </div>
        <h2 class="h3 fw-bold text-dark mb-0">
            {{ __('Last Messages') }}
        </h2>
    </div>

    <div>
        <span class="badge rounded-pill bg-warning-subtle text-warning-emphasis border border-warning-subtle px-3 py-2">
            <i class="bi bi-funnel-fill me-1"></i>
            {{ trans_choice('{0} Aucun message|{1} 1 message au total|[2,*] :count messages au total', $messages->count(), ['count' => $messages->count()]) }}
        </span>
    </div>
</div>
<div class="container my-5">
    <div class="row g-4">
        @foreach ($messages as $message)
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
                                $isLong = strlen($message->content) > 120;
                                $shortText = Str::limit($message->content, 120, '');
                                $remainingText = substr($message->content, 120);
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
                        <form action="{{ route('messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Supprimer ce message ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm text-danger opacity-75 p-0 border-0 bg-transparent ms-2">
                                    <i class="bi bi-trash"></i>
                                </button>
                        </form>

                        <form action="{{ route('messages.report', ['message' => $message]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm text-secondary opacity-50 p-0 border-0 bg-transparent">
                                <i class="bi bi-flag"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{ $messages->links() }}


@endsection