@extends('base')

@section('title', 'Create')
@section('content')
    <h1>Créer un nouveau message</h1>

    <form action="{{ route('messages.community.store', $community) }}" method="POST">
        @csrf
        @method('POST')
        
        @include('shared.input', [
            'type' => 'textarea',
            'name' => 'content',
            'label' => 'Contenu',
            'placeholder' => 'Entrez le contenu du message',
        ])
        <button class="btn btn-warning btn-sm fw-bold px-3">Envoyer</button>
    </form>


@endsection