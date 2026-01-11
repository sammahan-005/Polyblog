<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Mur Anonyme ENSPY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%; border-radius: 15px;">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-dark">Bon retour ! 🕵️‍♂️</h2>
            <p class="text-muted">Connecte-toi pour publier anonymement</p>
        </div>

        <form action="{{ route('auth.login') }}" method="POST">
            @csrf
            @method('post')
            @include('shared.input', [
                'type' => 'text',
                'name' => 'name',
                'label' => 'Pseudo (Anonyme)',
                'placeholder' => 'Ex: PolyTech_Ghost'
            ])
            @include('shared.input', [
                'type' => 'password',
                'name' => 'password',
                'label' => 'Mot de passe',
                'placeholder' => 'Votre mot de passe sécurisé'
            ])

          
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-warning fw-bold text-dark">Se connecter</button>
            </div>
        </form>

        <div class="text-center mt-3">
            <small>Nouveau ici ? <a href="{{ route('inscription') }}" class="text-decoration-none text-warning fw-bold">Créer un compte</a></small>
        </div>
        
        <div class="text-center mt-2">
            <a href="/" class="btn btn-link btn-sm text-secondary text-decoration-none">← Retour à l'accueil</a>
        </div>
     @if(session("success"))
            <div class="alert alert-success">
                {{session("success")}}
            </div>
            
    @endif
    
    @if($errors->any())
        <div class="alert alert-danger mt-3">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
   

    

</body>
</html>