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
    <style>
        
        body { padding-bottom: 80px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold text-warning fs-3 d-flex align-items-center" href="/" style="letter-spacing: 1px;">
      <i class="bi bi-box-seam me-2"></i>
      <span class="text-white">Black</span>
      <span class="text-warning ms-2" style="border-bottom: 3px solid #ffc107;">BOX</span>
    </a>

    @auth
          <li class="nav-item ms-lg-3 d-flex align-items-center list-unstyled">
            <a href="{{ route('user.show') }}" class="text-decoration-none">
              <span class="text-warning fw-bold me-2">{{ Auth::user()->name }}</span>
            </a>

            <form action="{{ route('auth.logout') }}" method="post" class="d-inline">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-outline-light btn-sm">Déconnexion</button>
            </form>
          </li>
    @endauth

    @guest
          <li class="nav-item ms-lg-3 list-unstyled">
            <a class="nav-link text-white" href="{{ route('auth.login') }}">Connexion</a>
          </li>
    @endguest

    
  </div>
</nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <div class="fixed-bottom bg-dark border-top border-secondary border-opacity-25 py-2 shadow-lg">
        <div class="container">
            <div class="d-flex justify-content-around align-items-center">
                
                <a href="{{ route('communities.index') }}" class="btn btn-outline-warning border-0 d-flex flex-column align-items-center fw-bold small">
                    <i class="bi bi-people-fill fs-4"></i>
                    <span style="font-size: 0.75rem;">Communautés</span>
                </a>

                <a href="{{ route('messages.create') }}" class="btn btn-warning rounded-pill px-4 fw-bold shadow d-flex align-items-center gap-2">
                    <i class="bi bi-plus-lg"></i>
                    <span>Poster publiquement</span>
                </a>

                {{-- <a href="#" class="btn btn-outline-light border-0 d-flex flex-column align-items-center fw-bold small position-relative">
                    <i class="bi bi-bell-fill fs-4"></i>
                    <span style="font-size: 0.75rem;">Notifs</span>
                    <span class="position-absolute top-0 start-50 translate-middle-x ms-2 p-1 bg-danger rounded-circle border border-dark" style="width: 8px; height: 8px;"></span>
                </a>

                <a href="#" class="btn btn-outline-light border-0 d-flex flex-column align-items-center fw-bold small">
                    <i class="bi bi-bell fs-4"></i>
                    <span style="font-size: 0.75rem;">Notifs</span>
                </a> --}}

            </div>
        </div>
    </div>

    <footer>
    <div class="text-center mt-4 mb-5">
        <small class="text-muted opacity-50">
            <i class="bi bi-shield-check me-1"></i> Respectez la charte de la communauté.
        </small>
    </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>