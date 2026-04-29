<!DOCTYPE html>
<html lang="fr" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Covoiturage Local')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
    :root {
        --primary: #4361ee;
        --primary-light: rgba(67, 97, 238, 0.1);
        --secondary: #7209b7;
        --dark: #1a1a2e;
        --light: #f8f9fa;
    }
    
    body {
        font-family: 'Inter', sans-serif;
        background-color: #fff;
        color: var(--dark);
    }
    
    h1, h2, h3, h4, h5, h6 {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
    }
    
    /* Navigation premium */
    .navbar-premium {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(0,0,0,0.1);
        padding: 1rem 0;
        transition: all 0.3s ease;
    }
    
    .navbar-premium.scrolled {
        padding: 0.5rem 0;
        box-shadow: 0 2px 20px rgba(0,0,0,0.1);
    }
    
    .navbar-brand {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 1.5rem;
        color: var(--primary) !important;
    }
    
    .nav-link {
        font-weight: 500;
        color: var(--dark) !important;
        margin: 0 0.5rem;
        transition: all 0.3s ease;
    }
    
    .nav-link:hover {
        color: var(--primary) !important;
    }
    
    .btn-primary {
        background: linear-gradient(45deg, var(--primary), var(--secondary));
        border: none;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(67, 97, 238, 0.3);
    }
    
    /* Footer premium */
    .footer-premium {
        background: var(--dark);
        color: white;
        padding: 4rem 0 2rem;
        margin-top: 4rem;
    }
    
    .footer-links a {
        color: rgba(255,255,255,0.7);
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .footer-links a:hover {
        color: white;
    }
    
    .social-icons a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        color: white;
        margin-right: 0.5rem;
        transition: all 0.3s ease;
    }
    
    .social-icons a:hover {
        background: var(--primary);
        transform: translateY(-3px);
    }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-premium fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-car me-2"></i>Covoiturage<span class="text-secondary">Local</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('trajets.index') }}">
                            <i class="fas fa-search me-1"></i> Trouver un trajet
                        </a>
                    </li>
                    
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-1"></i> {{ auth()->user()->first_name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        <i class="fas fa-home me-2"></i> Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('trajets.mes-trajets') }}">
                                        <i class="fas fa-route me-2"></i> Mes trajets
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="fas fa-user me-2"></i> Mon profil
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="fas fa-sign-out-alt me-2"></i> Déconnexion
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i> Connexion
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary ms-2" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-1"></i> S'inscrire
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main class="pt-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-premium">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h3 class="mb-3">
                        <i class="fas fa-car me-2"></i>Covoiturage Local
                    </h3>
                    <p class="text-muted">
                        La plateforme de covoiturage préférée des Togolais. 
                        Voyagez malin, dépensez moins.
                    </p>
                    <div class="social-icons mt-4">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="mb-3">Plateforme</h5>
                    <div class="footer-links">
                        <a href="{{ route('trajets.index') }}" class="d-block mb-2">Trouver un trajet</a>
                        <a href="{{ route('trajets.create') }}" class="d-block mb-2">Proposer un trajet</a>
                        <a href="#" class="d-block mb-2">Comment ça marche</a>
                        <a href="#" class="d-block mb-2">Tarifs</a>
                    </div>
                </div>
                
               
                
                <div class="col-lg-4 mb-4">
                    <h5 class="mb-3">Contact</h5>
                    <div class="footer-links">
                        <p class="mb-2">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            Lomé, Togo
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-phone me-2"></i>
                            +228 90890387
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-envelope me-2"></i>
                            contact@covoiturage.local
                        </p>
                    </div>
                </div>
            </div>
            
            <hr class="my-4" style="border-color: rgba(255,255,255,0.1);">
            
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0 text-muted">
                        &copy; {{ date('Y') }} Covoiturage Local. Tous droits réservés.
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="text-muted me-3">Conditions d'utilisation</a>
                    <a href="#" class="text-muted">Politique de confidentialité</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script pour navbar scroll -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.querySelector('.navbar-premium');
        
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    });
    </script>
    
    @stack('scripts')
</body>
</html>