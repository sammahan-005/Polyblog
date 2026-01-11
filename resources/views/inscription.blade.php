<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Mur Anonyme ENSPY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%; border-radius: 15px;">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-warning">Créer un compte</h2>
            <p class="text-muted">Rejoins le mur anonyme de l'ENSPY</p>
        </div>

        <form action="{{ route('inscription.submit') }}" method="POST">
            @csrf
            @method('post')
            @include('shared.input', [
                'type' => 'text',
                'name' => 'name',
                'label' => 'Pseudo (Anonyme)',
                'placeholder' => 'Ex: PolyTech_Ghost'
            ])
            @include('shared.input', [
                'type' => 'email',
                'name' => 'email',
                'label' => 'Adresse Email',
                'placeholder' => 'nom@exemple.com'
            ])

            @include('shared.input', [
                'type' => 'password',
                'name' => 'password',
                'label' => 'Mot de passe',
                'placeholder' => 'Votre mot de passe sécurisé'
            ])
            
            <div class="d-grid gap-2 mt-4">
                <button class="btn btn-warning fw-bold text-dark">S'inscrire</button>
            </div>
        </form>

        <div class="text-center mt-3">
            <small>Déjà inscrit ? <a href="{{ route('connexion') }}" class="text-decoration-none text-dark fw-bold">Se connecter</a></small>
        </div>
    </div>

</body>
</html>