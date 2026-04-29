@extends('layouts.premium')

@section('title', 'Inscription | Covoiturage Local')

@section('content')
<section class="auth-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <!-- Carte d'inscription -->
                <div class="auth-card">
                    <!-- En-tête avec illustration -->
                    <div class="auth-header text-center mb-5">
                        <div class="auth-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h1 class="auth-title">Rejoignez notre communauté</h1>
                        <p class="auth-subtitle">
                            Créez votre compte en moins d'une minute et commencez à voyager autrement
                        </p>
                    </div>

                    <!-- Messages d'erreur -->
                    @if($errors->any())
                    <div class="alert alert-danger alert-elegant mb-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-exclamation-circle me-3"></i>
                            <div>
                                <h6 class="mb-1">Veuillez corriger les erreurs suivantes :</h6>
                                <ul class="mb-0 ps-3">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(session('status'))
                    <div class="alert alert-success alert-elegant mb-4">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- Formulaire avec champs traditionnels -->
                    <form method="POST" action="{{ route('register') }}" class="auth-form" id="registerForm">
                        @csrf

                        <div class="row g-4">
                            <!-- Prénom -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name" class="form-label fw-semibold">
                                        <i class="fas fa-user me-2"></i>Prénom *
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-user text-muted"></i>
                                        </span>
                                        <input type="text" 
                                               class="form-control @error('first_name') is-invalid @enderror" 
                                               id="first_name" 
                                               name="first_name" 
                                               value="{{ old('first_name') }}"
                                               required
                                               autofocus
                                               placeholder="Votre prénom">
                                    </div>
                                    @error('first_name')
                                        <div class="invalid-feedback d-flex align-items-center mt-2">
                                            <i class="fas fa-exclamation-circle me-2"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Nom -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name" class="form-label fw-semibold">
                                        <i class="fas fa-user me-2"></i>Nom *
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-user-tag text-muted"></i>
                                        </span>
                                        <input type="text" 
                                               class="form-control @error('last_name') is-invalid @enderror" 
                                               id="last_name" 
                                               name="last_name" 
                                               value="{{ old('last_name') }}"
                                               required
                                               placeholder="Votre nom">
                                    </div>
                                    @error('last_name')
                                        <div class="invalid-feedback d-flex align-items-center mt-2">
                                            <i class="fas fa-exclamation-circle me-2"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Téléphone -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label fw-semibold">
                                        <i class="fas fa-phone me-2"></i>Téléphone *
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-phone text-muted"></i>
                                        </span>
                                        <input type="tel" 
                                               class="form-control @error('phone') is-invalid @enderror" 
                                               id="phone" 
                                               name="phone" 
                                               value="{{ old('phone') }}"
                                               required
                                               placeholder="Ex: 06 12 34 56 78">
                                    </div>
                                    @error('phone')
                                        <div class="invalid-feedback d-flex align-items-center mt-2">
                                            <i class="fas fa-exclamation-circle me-2"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label fw-semibold">
                                        <i class="fas fa-envelope me-2"></i>Email *
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
                                               placeholder="votre@email.com">
                                    </div>
                                    @error('email')
                                        <div class="invalid-feedback d-flex align-items-center mt-2">
                                            <i class="fas fa-exclamation-circle me-2"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Mot de passe -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="form-label fw-semibold">
                                        <i class="fas fa-lock me-2"></i>Mot de passe *
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-key text-muted"></i>
                                        </span>
                                        <input type="password" 
                                               class="form-control @error('password') is-invalid @enderror" 
                                               id="password" 
                                               name="password" 
                                               required
                                               placeholder="Minimum 8 caractères">
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
                                    <div class="password-strength mt-2">
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar" id="passwordStrength" style="width: 0%"></div>
                                        </div>
                                        <small class="text-muted d-block mt-1" id="passwordHint">
                                            <i class="fas fa-info-circle me-1"></i>
                                            Au moins 8 caractères avec majuscules, minuscules et chiffres
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <!-- Confirmation mot de passe -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation" class="form-label fw-semibold">
                                        <i class="fas fa-lock me-2"></i>Confirmer le mot de passe *
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-key text-muted"></i>
                                        </span>
                                        <input type="password" 
                                               class="form-control" 
                                               id="password_confirmation" 
                                               name="password_confirmation" 
                                               required
                                               placeholder="Retapez votre mot de passe">
                                        <button class="btn btn-outline-secondary border-start-0" type="button" id="toggleConfirmPassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="password-match mt-2">
                                        <small class="text-muted" id="passwordMatch">
                                            <i class="fas fa-info-circle me-1"></i>
                                            Les mots de passe doivent correspondre
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Conditions d'utilisation -->
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" id="terms" required>
                            <label class="form-check-label" for="terms">
                                J'accepte les 
                                <a href="#" class="text-primary text-decoration-none">conditions d'utilisation</a> 
                                et la 
                                <a href="#" class="text-primary text-decoration-none">politique de confidentialité</a>
                            </label>
                        </div>

                        <!-- Bouton d'inscription -->
                        <div class="d-grid mt-5">
                            <button type="submit" class="btn btn-primary btn-lg btn-hover-shadow" id="submitBtn">
                                <i class="fas fa-user-plus me-2"></i>
                                <span class="btn-text">Créer mon compte</span>
                                <span class="btn-loader d-none">
                                    <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                    Création en cours...
                                </span>
                            </button>
                        </div>

                        <!-- Lien vers connexion -->
                        <div class="text-center mt-4">
                            <p class="text-muted mb-0">
                                Vous avez déjà un compte ?
                                <a href="{{ route('login') }}" class="text-primary fw-semibold text-decoration-none">
                                    Connectez-vous ici
                                </a>
                            </p>
                        </div>
                    </form>
                </div>

                <!-- Avantages de l'inscription -->
                <div class="benefits-card mt-4">
                    <h6 class="benefits-title">
                        <i class="fas fa-gift text-white me-2"></i>
                        Pourquoi s'inscrire ?
                    </h6>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="benefit-item">
                                <i class="fas fa-check-circle text-warning me-2"></i>
                                <span>Trajets illimités</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="benefit-item">
                                <i class="fas fa-check-circle text-warning me-2"></i>
                                <span>Profil vérifié</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="benefit-item">
                                <i class="fas fa-check-circle text-warning me-2"></i>
                                <span>Messages sécurisés</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="benefit-item">
                                <i class="fas fa-check-circle text-warning me-2"></i>
                                <span>Support 24/7</span>
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
/* Section authentification */
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

/* Formulaires traditionnels */
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

.form-control.is-invalid:focus {
    border-color: #ef476f;
    box-shadow: 0 0 0 0.2rem rgba(239, 71, 111, 0.25);
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

/* Barre de force du mot de passe */
.password-strength .progress {
    background-color: #e9ecef;
    border-radius: 3px;
    overflow: hidden;
}

.password-strength .progress-bar {
    background-color: #06d6a0;
    transition: width 0.3s ease, background-color 0.3s ease;
}

/* Messages d'info */
.password-match small,
.password-strength small {
    font-size: 0.85rem;
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
}

/* Bouton d'inscription */
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

/* Carte des avantages */
.benefits-card {
    background: linear-gradient(45deg, var(--primary), var(--secondary));
    border-radius: 12px;
    padding: 1.5rem;
    color: white;
    box-shadow: 0 5px 20px rgba(67, 97, 238, 0.3);
}

.benefits-title {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
}

.benefit-item {
    display: flex;
    align-items: center;
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
}

/* Animation du bouton */
.btn-loader {
    display: inline-flex;
    align-items: center;
}

/* Responsive */
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
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registerForm');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');
    const passwordStrength = document.getElementById('passwordStrength');
    const passwordHint = document.getElementById('passwordHint');
    const passwordMatch = document.getElementById('passwordMatch');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoader = submitBtn.querySelector('.btn-loader');
    const togglePasswordBtn = document.getElementById('togglePassword');
    const toggleConfirmPasswordBtn = document.getElementById('toggleConfirmPassword');

    // Basculer la visibilité du mot de passe
    togglePasswordBtn.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });

    // Basculer la visibilité de la confirmation
    toggleConfirmPasswordBtn.addEventListener('click', function() {
        const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPasswordInput.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });

    // Vérification de la force du mot de passe
    passwordInput.addEventListener('input', function() {
        const password = this.value;
        let strength = 0;
        let message = '';
        
        // Longueur
        if (password.length >= 8) strength += 25;
        if (password.length >= 12) strength += 25;
        
        // Complexité
        if (/[A-Z]/.test(password)) strength += 25;
        if (/[0-9]/.test(password)) strength += 25;
        
        // Mise à jour de la barre de progression et du message
        passwordStrength.style.width = strength + '%';
        
        if (strength < 25) {
            passwordStrength.style.backgroundColor = '#ef476f';
            message = '<i class="fas fa-times-circle me-1"></i>Très faible';
            passwordHint.className = 'text-danger';
        } else if (strength < 50) {
            passwordStrength.style.backgroundColor = '#ef476f';
            message = '<i class="fas fa-exclamation-triangle me-1"></i>Faible';
            passwordHint.className = 'text-danger';
        } else if (strength < 75) {
            passwordStrength.style.backgroundColor = '#ffd166';
            message = '<i class="fas fa-exclamation-circle me-1"></i>Moyen';
            passwordHint.className = 'text-warning';
        } else {
            passwordStrength.style.backgroundColor = '#06d6a0';
            message = '<i class="fas fa-check-circle me-1"></i>Fort';
            passwordHint.className = 'text-success';
        }
        
        passwordHint.innerHTML = message;
    });

    // Vérification de la correspondance des mots de passe
    function checkPasswordMatch() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;
        
        if (confirmPassword === '') {
            passwordMatch.innerHTML = '<i class="fas fa-info-circle me-1"></i>Les mots de passe doivent correspondre';
            passwordMatch.className = 'text-muted';
        } else if (password === confirmPassword) {
            passwordMatch.innerHTML = '<i class="fas fa-check-circle text-success me-1"></i>Les mots de passe correspondent';
            passwordMatch.className = 'text-success';
        } else {
            passwordMatch.innerHTML = '<i class="fas fa-times-circle text-danger me-1"></i>Les mots de passe ne correspondent pas';
            passwordMatch.className = 'text-danger';
        }
    }

    passwordInput.addEventListener('input', checkPasswordMatch);
    confirmPasswordInput.addEventListener('input', checkPasswordMatch);

    // Animation de soumission
    form.addEventListener('submit', function(e) {
        // Validation côté client
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;
        
        if (password !== confirmPassword) {
            e.preventDefault();
            passwordMatch.innerHTML = '<i class="fas fa-exclamation-triangle me-1"></i>Les mots de passe doivent correspondre';
            passwordMatch.className = 'text-danger';
            confirmPasswordInput.focus();
            return;
        }
        
        if (password.length < 8) {
            e.preventDefault();
            passwordHint.innerHTML = '<i class="fas fa-exclamation-triangle me-1"></i>Le mot de passe doit faire au moins 8 caractères';
            passwordHint.className = 'text-danger';
            passwordInput.focus();
            return;
        }
        
        if (!document.getElementById('terms').checked) {
            e.preventDefault();
            alert('Veuillez accepter les conditions d\'utilisation');
            return;
        }
        
        // Afficher le loader
        btnText.classList.add('d-none');
        btnLoader.classList.remove('d-none');
        submitBtn.disabled = true;
    });

    // Effet de focus sur les champs avec input-group
    document.querySelectorAll('.input-group .form-control').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });
});
</script>
@endpush