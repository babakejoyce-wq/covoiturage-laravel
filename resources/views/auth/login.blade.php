@extends('layouts.premium')

@section('title', 'Connexion | Covoiturage Local')

@section('content')
<section class="auth-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <!-- Carte de connexion -->
                <div class="auth-card">
                    <!-- En-tête avec illustration -->
                    <div class="auth-header text-center mb-5">
                        <div class="auth-icon">
                            <i class="fas fa-sign-in-alt"></i>
                        </div>
                        <h1 class="auth-title">Bienvenue à bord</h1>
                        <p class="auth-subtitle">
                            Connectez-vous pour accéder à votre espace personnel
                        </p>
                    </div>

                    <!-- Messages de session -->
                    @if (session('status'))
                    <div class="alert alert-success alert-elegant mb-4">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- Messages d'erreur -->
                    @if ($errors->any())
                    <div class="alert alert-danger alert-elegant mb-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-exclamation-circle me-3"></i>
                            <div>
                                <h6 class="mb-1">Erreur de connexion</h6>
                                <p class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}@if(!$loop->last)<br>@endif
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Formulaire de connexion -->
                    <form method="POST" action="{{ route('login') }}" class="auth-form" id="loginForm">
                        @csrf

                        <!-- Email -->
                        <div class="form-group mb-4">
                            <label for="email" class="form-label fw-semibold">
                                <i class="fas fa-envelope me-2"></i>Adresse email *
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-envelope text-muted"></i>
                                </span>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}"
                                       required 
                                       autofocus 
                                       autocomplete="email"
                                       placeholder="votre@email.com">
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-flex align-items-center mt-2">
                                    <i class="fas fa-exclamation-circle me-2"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Mot de passe -->
                        <div class="form-group mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label for="password" class="form-label fw-semibold mb-0">
                                    <i class="fas fa-lock me-2"></i>Mot de passe *
                                </label>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-primary text-decoration-none small">
                                    <i class="fas fa-key me-1"></i>Mot de passe oublié ?
                                </a>
                                @endif
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-key text-muted"></i>
                                </span>
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       required 
                                       autocomplete="current-password"
                                       placeholder="Votre mot de passe">
                                <button class="btn btn-outline-secondary border-start-0" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-flex align-items-center mt-2">
                                    <i class="fas fa-exclamation-circle me-2"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Se souvenir de moi -->
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">
                                <i class="fas fa-check-circle me-2"></i>
                                Se souvenir de moi sur cet appareil
                            </label>
                        </div>

                        <!-- Bouton de connexion -->
                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary btn-lg btn-hover-shadow" id="submitBtn">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                <span class="btn-text">Se connecter</span>
                                <span class="btn-loader d-none">
                                    <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                    Connexion en cours...
                                </span>
                            </button>
                        </div>

                        <!-- Séparateur -->
                        <div class="separator my-4">
                            <span class="separator-text">Ou</span>
                        </div>


                        <!-- Lien vers inscription -->
                        <div class="text-center">
                            <p class="text-muted mb-0">
                                Vous n'avez pas encore de compte ?
                                <a href="{{ route('register') }}" class="text-primary fw-semibold text-decoration-none">
                                    Inscrivez-vous ici
                                </a>
                            </p>
                        </div>
                    </form>
                </div>

                <!-- Informations de sécurité -->
                <div class="security-card mt-4">
                    <div class="d-flex align-items-center">
                        <div class="security-icon me-3">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Connexion sécurisée</h6>
                            <p class="text-muted small mb-0">
                                Vos informations sont protégées par un chiffrement SSL 256-bit
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section avantages pour les visiteurs -->
            <div class="col-lg-6 col-xl-5 d-none d-lg-block">
                <div class="features-sidebar">
                    <h4 class="sidebar-title mb-4">
                        <i class="fas fa-star text-warning me-2"></i>
                        Pourquoi se connecter ?
                    </h4>
                    
                    <div class="feature-item mb-4">
                        <div class="feature-icon">
                            <i class="fas fa-route"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Gérez vos trajets</h5>
                            <p class="text-muted small">
                                Consultez et gérez tous vos trajets depuis votre espace personnel
                            </p>
                        </div>
                    </div>
                    
                    <div class="feature-item mb-4">
                        <div class="feature-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Votre véhicule</h5>
                            <p class="text-muted small">
                                Modifiez les informations de votre véhicule en quelques clics
                            </p>
                        </div>
                    </div>
                    
                    <div class="feature-item mb-4">
                        <div class="feature-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Messagerie</h5>
                            <p class="text-muted small">
                                Échangez en toute sécurité avec les autres membres
                            </p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Notifications</h5>
                            <p class="text-muted small">
                                Recevez des alertes pour vos trajets et réservations
                            </p>
                        </div>
                    </div>
                    
                    <!-- Statistiques -->
                    <div class="stats-sidebar mt-5">
                        <h6 class="sidebar-subtitle mb-3">Notre communauté en chiffres</h6>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="stat-item">
                                    <div class="stat-number">500+</div>
                                    <div class="stat-label">Membres actifs</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stat-item">
                                    <div class="stat-number">120+</div>
                                    <div class="stat-label">Trajets/semaine</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stat-item">
                                    <div class="stat-number">98%</div>
                                    <div class="stat-label">Satisfaction</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stat-item">
                                    <div class="stat-number">24/7</div>
                                    <div class="stat-label">Support</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
/* Styles spécifiques à la page de connexion */
.auth-section {
    background: linear-gradient(135deg, #f5f7ff 0%, #e3e9ff 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
}

.auth-card {
    background: white;
    border-radius: 15px;
    padding: 3rem;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    border: 1px solid rgba(67, 97, 238, 0.1);
}

.auth-header {
    padding-bottom: 2rem;
    border-bottom: 2px solid #f0f3ff;
    margin-bottom: 2rem;
}

.auth-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 1.5rem;
    background: linear-gradient(45deg, var(--primary), var(--secondary));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: white;
}

.auth-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 0.5rem;
}

.auth-subtitle {
    color: #666;
    font-size: 1.1rem;
}

/* Formulaires */
.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    color: var(--dark);
    font-size: 0.95rem;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
}

.input-group {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.input-group:focus-within {
    box-shadow: 0 4px 15px rgba(67, 97, 238, 0.2);
    transform: translateY(-1px);
}

.input-group-text {
    background-color: #f8f9fa;
    border: 2px solid #e0e0e0;
    border-right: none;
    padding: 0.75rem 1rem;
    color: #666;
}

.form-control {
    border: 2px solid #e0e0e0;
    border-left: none;
    border-right: none;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
    height: auto;
}

.form-control:focus {
    box-shadow: none;
    border-color: var(--primary);
    background-color: #fff;
}

.form-control.is-invalid {
    border-color: #ef476f;
}

.btn-outline-secondary {
    border: 2px solid #e0e0e0;
    border-left: none;
    color: #666;
    padding: 0.75rem 1rem;
}

.btn-outline-secondary:hover {
    background-color: #f8f9fa;
    border-color: #ccc;
    color: #333;
}

/* Checkbox */
.form-check-input {
    width: 1.2em;
    height: 1.2em;
    margin-top: 0.2em;
    border: 2px solid #dee2e6;
}

.form-check-input:checked {
    background-color: var(--primary);
    border-color: var(--primary);
}

.form-check-input:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
}

.form-check-label {
    color: #555;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
}

/* Bouton de connexion */
.btn-hover-shadow {
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
    padding: 1rem 2rem;
    font-weight: 600;
    border: none;
    border-radius: 10px;
}

.btn-hover-shadow:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(67, 97, 238, 0.4);
}

/* Séparateur */
.separator {
    display: flex;
    align-items: center;
    text-align: center;
    color: #666;
}

.separator::before,
.separator::after {
    content: '';
    flex: 1;
    border-bottom: 1px solid #e0e0e0;
}

.separator-text {
    padding: 0 1rem;
    font-weight: 500;
}

/* Boutons sociaux */
.social-btn {
    padding: 0.75rem;
    border-radius: 10px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.social-btn:hover {
    background: var(--primary-light);
    border-color: var(--primary);
}

/* Carte de sécurité */
.security-card {
    background: linear-gradient(45deg, #06d6a0, #04a777);
    border-radius: 12px;
    padding: 1.5rem;
    color: white;
    box-shadow: 0 5px 20px rgba(6, 214, 160, 0.3);
}

.security-icon {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

/* Sidebar des fonctionnalités */
.features-sidebar {
    background: white;
    border-radius: 15px;
    padding: 2.5rem;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    height: 100%;
    border: 1px solid rgba(67, 97, 238, 0.1);
}

.sidebar-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--dark);
    padding-bottom: 1rem;
    border-bottom: 2px solid #f0f3ff;
}

.feature-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 1.5rem;
}

.feature-icon {
    width: 50px;
    height: 50px;
    background: var(--primary-light);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    color: var(--primary);
    margin-right: 1rem;
    flex-shrink: 0;
}

.feature-content h5 {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
    color: var(--dark);
}

.feature-content p {
    color: #666;
    line-height: 1.5;
}

/* Statistiques sidebar */
.stats-sidebar {
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 2px solid #f0f3ff;
}

.sidebar-subtitle {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--dark);
}

.stat-item {
    text-align: center;
    padding: 1rem;
    background: #f8f9fa;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.stat-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.stat-number {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 0.25rem;
}

.stat-label {
    font-size: 0.85rem;
    color: #666;
}

/* Alertes élégantes */
.alert-elegant {
    border: none;
    border-radius: 10px;
    padding: 1.25rem;
    background: rgba(239, 71, 111, 0.1);
    border-left: 4px solid #ef476f;
}

.alert-elegant.alert-success {
    background: rgba(6, 214, 160, 0.1);
    border-left-color: #06d6a0;
}

/* Animation du bouton */
.btn-loader {
    display: inline-flex;
    align-items: center;
}

/* Responsive */
@media (max-width: 992px) {
    .features-sidebar {
        margin-top: 2rem;
    }
}

@media (max-width: 768px) {
    .auth-card {
        padding: 2rem;
        margin: 1rem;
    }
    
    .auth-title {
        font-size: 1.5rem;
    }
    
    .auth-icon {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }
    
    .btn-hover-shadow {
        padding: 0.875rem 1.5rem;
    }
    
    .features-sidebar {
        padding: 1.5rem;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('loginForm');
    const passwordInput = document.getElementById('password');
    const togglePasswordBtn = document.getElementById('togglePassword');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoader = submitBtn.querySelector('.btn-loader');

    // Basculer la visibilité du mot de passe
    togglePasswordBtn.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });

    // Animation de soumission
    form.addEventListener('submit', function(e) {
        // Validation côté client
        const email = document.getElementById('email').value;
        const password = passwordInput.value;
        
        if (!email || !password) {
            e.preventDefault();
            alert('Veuillez remplir tous les champs obligatoires');
            return;
        }
        
        // Validation basique de l'email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            e.preventDefault();
            alert('Veuillez entrer une adresse email valide');
            return;
        }
        
        // Afficher le loader
        btnText.classList.add('d-none');
        btnLoader.classList.remove('d-none');
        submitBtn.disabled = true;
    });

    // Effet de focus sur les champs
    document.querySelectorAll('.input-group .form-control').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });

    // Animation des statistiques (pour le fun)
    const statNumbers = document.querySelectorAll('.stat-number');
    statNumbers.forEach(stat => {
        const originalText = stat.textContent;
        if (originalText.includes('+') || originalText.includes('%')) {
            const number = parseInt(originalText);
            if (!isNaN(number)) {
                let current = 0;
                const increment = Math.ceil(number / 30);
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= number) {
                        stat.textContent = originalText;
                        clearInterval(timer);
                    } else {
                        stat.textContent = current + (originalText.includes('+') ? '+' : '%');
                    }
                }, 50);
            }
        }
    });
});
</script>
@endpush