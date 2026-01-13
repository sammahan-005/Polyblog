<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">   
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')|Message</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold text-warning fs-3" href="/">
      Polyblog
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        
        <li class="nav-item">
          <a class="btn btn-warning btn-sm fw-bold px-3" href="{{ route('messages.create') }}">
            + Nouveau Message
          </a>
        </li>

        @auth
          

          <li class="nav-item ms-lg-3 d-flex align-items-center">
            <span class="text-warning fw-bold me-2">{{ Auth::user()->name }}</span>
            
            <form action="{{ route('auth.logout') }}" method="post" class="d-inline">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-outline-light btn-sm">Déconnexion</button>
            </form>
          </li>
        @endauth

        @guest
          <li class="nav-item ms-lg-3">
            <a class="nav-link text-white" href="{{ route('auth.login') }}">Connexion</a>
          </li>
        @endguest

      </ul>
    </div>
  </div>
</nav>

    <div class="container mt-4">
        @yield('content')
    </div>
    <footer>
    <div class="text-center mt-4">
        <small class="text-muted opacity-50">
            <i class="bi bi-shield-check me-1"></i> Respectez la charte de la communauté.
        </small>
    </div>
    </footer>
    
</body>
</html>