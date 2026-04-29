@extends('layouts.premium')

@section('title', 'Covoiturage Local | Partagez vos trajets')

@section('content')
<!-- Hero Section avec dégradé -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-80">
            <div class="col-lg-6">
                <div class="hero-content">
                    <span class="badge badge-pill badge-primary-light mb-3">🚗 Voyagez intelligemment</span>
                    <h1 class="display-3 fw-bold mb-4 gradient-text">
                        Covoiturage <span class="text-primary">Local</span>
                    </h1>
                    <p class="lead text-muted mb-4">
                        Connectez-vous avec des voyageurs près de chez vous. 
                        <span class="highlight">Économisez jusqu'à 70%</span> sur vos trajets quotidiens 
                        tout en réduisant votre empreinte carbone.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        @auth
                            @if(auth()->user()->vehicle)
                                <a href="{{ route('trajets.create') }}" class="btn btn-primary btn-lg btn-hover-shadow">
                                    <i class="fas fa-plus-circle me-2"></i>Proposer un trajet
                                </a>
                            @else
                                <a href="{{ route('vehicles.create') }}" class="btn btn-warning btn-lg btn-hover-shadow">
                                    <i class="fas fa-car me-2"></i>Ajouter mon véhicule
                                </a>
                            @endif
                        @else
                            <a href="{{ route('trajets.index') }}" class="btn btn-primary btn-lg btn-hover-shadow">
                                <i class="fas fa-search me-2"></i>Trouver un trajet
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">
                                <i class="fas fa-user-plus me-2"></i>S'inscrire gratuitement
                            </a>
                        @endauth
                    </div>
                    
                    <!-- Statistiques -->
                    <div class="stats-container mt-5">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="stat-card">
                                    <div class="stat-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <h3 class="stat-number" data-count="500">0</h3>
                                        <p class="stat-label">Utilisateurs actifs</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-card">
                                    <div class="stat-icon">
                                        <i class="fas fa-route"></i>
                                    </div>
                                    <div class="stat-content">
                                        <h3 class="stat-number" data-count="120">0</h3>
                                        <p class="stat-label">Trajets cette semaine</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-card">
                                    <div class="stat-icon">
                                        <i class="fas fa-co2"></i>
                                    </div>
                                    <div class="stat-content">
                                        <h3 class="stat-number" data-count="2.5">0</h3>
                                        <p class="stat-label">Tonnes CO₂ économisées</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="hero-visual">
                    <div class="floating-cards">
                        <!-- Carte flottante 1 -->
                        <div class="floating-card card-1">
                            <div class="card-body">
                                <div class="driver-info">
                                    <div class="driver-avatar">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="driver-details">
                                        <h6>Marie L.</h6>
                                        <small>⭐ 4.9 (42 avis)</small>
                                    </div>
                                </div>
                                <div class="route-info">
                                    <span class="badge badge-success">Lomé → Kara</span>
                                    <p class="mb-0"><small>Demain 08:00 • 3 places</small></p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Carte flottante 2 -->
                        <div class="floating-card card-2">
                            <div class="card-body">
                                <div class="driver-info">
                                    <div class="driver-avatar">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="driver-details">
                                        <h6>Thomas M.</h6>
                                        <small>⭐ 4.7 (28 avis)</small>
                                    </div>
                                </div>
                                <div class="route-info">
                                    <span class="badge badge-primary">Lomé → Atakpamé</span>
                                    <p class="mb-0"><small>Aujourd'hui 18:00 • 2 places</small></p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Image principale -->
                        <div class="main-visual">
                            <div class="visual-container">
                                <div class="map-background"></div>
                                <div class="car-animation">
                                    <i class="fas fa-car"></i>
                                </div>
                                <div class="location-pin start">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Lomé</span>
                                </div>
                                <div class="location-pin end">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Kara</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Avantages -->
<section class="features-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5">
            <span class="section-subtitle">Pourquoi nous choisir ?</span>
            <h2 class="section-title">Voyagez mieux,<br>dépensez moins</h2>
            <p class="section-description">Une expérience de covoiturage repensée pour votre quotidien</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-icon bg-primary-light">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h4 class="feature-title">Réservation instantanée</h4>
                    <p class="feature-description">Trouvez et réservez un trajet en quelques clics seulement</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-icon bg-success-light">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4 class="feature-title">Sécurité garantie</h4>
                    <p class="feature-description">Vérification des profils et système de notation transparent</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-icon bg-warning-light">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h4 class="feature-title">Écologique</h4>
                    <p class="feature-description">Réduisez vos émissions de CO₂ en partageant vos trajets</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-icon bg-info-light">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4 class="feature-title">Communauté</h4>
                    <p class="feature-description">Rejoignez une communauté de voyageurs responsables</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Trajets récents -->
<section class="trajets-section py-5 bg-light">
    <div class="container">
        <div class="section-header d-flex justify-content-between align-items-center mb-5">
            <div>
                <span class="section-subtitle">Dernières offres</span>
                <h2 class="section-title mb-0">Trajets disponibles</h2>
            </div>
            <a href="{{ route('trajets.index') }}" class="btn btn-link">
                Voir tout <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
        
        @php
            $recentTrajets = app(App\Models\Trajet::class)
                ->with(['user', 'user.vehicle'])
                ->futur()
                ->orderBy('created_at', 'desc')
                ->take(3)
                ->get();
        @endphp
        
        @if($recentTrajets->count() > 0)
            <div class="row g-4">
                @foreach($recentTrajets as $trajet)
                    <div class="col-lg-4">
                        <div class="trajet-card">
                            <div class="trajet-header">
                                <div class="route-badge">
                                    <span class="badge bg-primary">{{ $trajet->ville_depart }} → {{ $trajet->ville_arrivee }}</span>
                                </div>
                                <div class="places-badge">
                                    <span class="badge bg-dark">{{ $trajet->places }} places</span>
                                </div>
                            </div>
                            
                            <div class="trajet-body">
                                <div class="driver-info">
                                    <div class="driver-avatar">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div>
                                        <h6 class="driver-name">{{ $trajet->user->first_name }} {{ substr($trajet->user->last_name, 0, 1) }}.</h6>
                                        <small class="text-muted">
                                            <i class="fas fa-star text-warning"></i> 4.8
                                        </small>
                                    </div>
                                </div>
                                
                                <div class="trajet-details mt-3">
                                    <div class="detail-item">
                                        <i class="fas fa-calendar text-primary"></i>
                                        <span>{{ $trajet->date_trajet->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="fas fa-clock text-primary"></i>
                                        <span>{{ $trajet->date_trajet->format('H:i') }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="fas fa-car text-primary"></i>
                                        @if($trajet->user->vehicle)
                                            <span>{{ $trajet->user->vehicle->plate_number }}</span>
                                        @else
                                            <span>Véhicule non spécifié</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="price-estimate mt-3">
                                    <small class="text-muted">Estimation :</small>
                                    <h4 class="price">5.000 FCFA</h4>
                                </div>
                            </div>
                            
                            <div class="trajet-footer">
                                <a href="{{ route('trajets.show', $trajet) }}" class="btn btn-primary w-100">
                                    <i class="fas fa-eye me-2"></i>Voir les détails
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state text-center py-5">
                <div class="empty-icon">
                    <i class="fas fa-route"></i>
                </div>
                <h4 class="mt-3">Aucun trajet disponible</h4>
                <p class="text-muted">Soyez le premier à proposer un trajet !</p>
                @auth
                    @if(auth()->user()->vehicle)
                        <a href="{{ route('trajets.create') }}" class="btn btn-primary mt-3">
                            <i class="fas fa-plus me-2"></i>Proposer un trajet
                        </a>
                    @endif
                @endif
            </div>
        @endif
    </div>
</section>

<!-- Section CTA -->
<section class="cta-section py-5">
    <div class="container">
        <div class="cta-card">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="cta-title">Prêt à voyager autrement ?</h2>
                    <p class="cta-description">
                        Rejoignez des milliers de personnes qui économisent chaque jour 
                        tout en protégeant l'environnement.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    @auth
                        <a href="{{ route('trajets.create') }}" class="btn btn-light btn-lg">
                            <i class="fas fa-plus-circle me-2"></i>Proposer un trajet
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-light btn-lg me-3">
                            <i class="fas fa-user-plus me-2"></i>S'inscrire
                        </a>
                        <a href="{{ route('trajets.index') }}" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-search me-2"></i>Explorer
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
/* Variables CSS modernes */
:root {
    --primary: #4361ee;
    --primary-light: rgba(67, 97, 238, 0.1);
    --secondary: #7209b7;
    --success: #06d6a0;
    --success-light: rgba(6, 214, 160, 0.1);
    --warning: #ffd166;
    --warning-light: rgba(255, 209, 102, 0.1);
    --info: #118ab2;
    --info-light: rgba(17, 138, 178, 0.1);
    --dark: #1a1a2e;
    --light: #f8f9fa;
    --shadow-sm: 0 2px 8px rgba(0,0,0,0.08);
    --shadow-md: 0 4px 20px rgba(0,0,0,0.12);
    --shadow-lg: 0 10px 40px rgba(0,0,0,0.15);
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 20px;
}

/* Hero Section */
.hero-section {
    background: linear-gradient(135deg, #f5f7ff 0%, #e3e9ff 100%);
    padding: 100px 0;
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 40%;
    height: 100%;
    background: linear-gradient(45deg, var(--primary) 0%, var(--secondary) 100%);
    opacity: 0.05;
    border-radius: 0 0 0 100px;
}

.min-vh-80 {
    min-height: 80vh;
}

.gradient-text {
    background: linear-gradient(45deg, var(--primary), var(--secondary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.highlight {
    background: linear-gradient(120deg, #ffd166 0%, #ffd166 100%);
    background-repeat: no-repeat;
    background-size: 100% 0.3em;
    background-position: 0 88%;
    padding: 0.1em 0;
}

.btn-hover-shadow {
    transition: all 0.3s ease;
    box-shadow: var(--shadow-sm);
}

.btn-hover-shadow:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

/* Statistiques */
.stats-container {
    margin-top: 3rem;
}

.stat-card {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.5rem;
    background: white;
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-md);
}

.stat-icon {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--primary-light);
    border-radius: var(--radius-md);
    font-size: 1.5rem;
    color: var(--primary);
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    margin: 0;
    color: var(--dark);
}

.stat-label {
    color: #666;
    margin: 0;
    font-size: 0.9rem;
}

/* Hero Visual */
.hero-visual {
    position: relative;
    height: 500px;
}

.floating-cards {
    position: relative;
    height: 100%;
}

.floating-card {
    position: absolute;
    width: 280px;
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-lg);
    padding: 1.5rem;
    z-index: 10;
    animation: float 6s ease-in-out infinite;
}

.card-1 {
    top: 10%;
    left: 0;
    animation-delay: 0s;
    border-left: 4px solid var(--success);
}

.card-2 {
    bottom: 10%;
    right: 0;
    animation-delay: 2s;
    border-left: 4px solid var(--primary);
}

.driver-info {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
}

.driver-avatar {
    width: 50px;
    height: 50px;
    background: var(--primary-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: var(--primary);
}

.driver-details h6 {
    margin: 0;
    font-weight: 600;
}

.route-info .badge {
    font-size: 0.8rem;
    padding: 0.4rem 0.8rem;
}

.main-visual {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 300px;
    height: 300px;
}

.visual-container {
    position: relative;
    width: 100%;
    height: 100%;
}

.map-background {
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, #e3e9ff, #f0f3ff);
    border-radius: 50%;
    position: relative;
    overflow: hidden;
}

.map-background::before {
    content: '';
    position: absolute;
    top: 20%;
    left: 20%;
    right: 20%;
    bottom: 20%;
    background: repeating-linear-gradient(
        0deg,
        transparent,
        transparent 20px,
        rgba(67, 97, 238, 0.1) 20px,
        rgba(67, 97, 238, 0.1) 40px
    );
    border-radius: 50%;
}

.car-animation {
    position: absolute;
    top: 50%;
    left: 20%;
    transform: translateY(-50%);
    font-size: 2.5rem;
    color: var(--primary);
    animation: moveCar 4s ease-in-out infinite;
}

.location-pin {
    position: absolute;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    color: var(--dark);
}

.location-pin i {
    color: var(--danger);
    font-size: 1.2rem;
}

.location-pin.start {
    top: 30%;
    left: 15%;
}

.location-pin.end {
    bottom: 30%;
    right: 15%;
}

/* Animations */
@keyframes float {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-20px);
    }
}

@keyframes moveCar {
    0%, 100% {
        transform: translateX(0) translateY(-50%);
    }
    50% {
        transform: translateX(150px) translateY(-50%);
    }
}

/* Features Section */
.section-header {
    margin-bottom: 3rem;
}

.section-subtitle {
    display: inline-block;
    background: var(--primary-light);
    color: var(--primary);
    padding: 0.5rem 1.5rem;
    border-radius: 50px;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--dark);
    line-height: 1.2;
}

.section-description {
    color: #666;
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto;
}

.feature-card {
    background: white;
    padding: 2rem;
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
    transition: all 0.3s ease;
    height: 100%;
    text-align: center;
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-lg);
}

.feature-icon {
    width: 70px;
    height: 70px;
    margin: 0 auto 1.5rem;
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
}

.feature-title {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--dark);
}

.feature-description {
    color: #666;
    font-size: 0.95rem;
    line-height: 1.6;
}

/* Trajets Section */
.trajets-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.trajet-card {
    background: white;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: all 0.3s ease;
    height: 100%;
}

.trajet-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.trajet-header {
    background: linear-gradient(45deg, var(--primary), var(--secondary));
    padding: 1.5rem;
    position: relative;
}

.trajet-body {
    padding: 2rem;
}

.trajet-footer {
    padding: 0 2rem 2rem;
}

.route-badge .badge {
    font-size: 1rem;
    padding: 0.5rem 1rem;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
}

.places-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
}

.detail-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 0.75rem;
    color: #666;
}

.detail-item i {
    width: 20px;
    text-align: center;
}

.price-estimate {
    border-top: 1px solid #eee;
    padding-top: 1rem;
}

.price {
    color: var(--primary);
    font-weight: 700;
    margin: 0;
}

/* Empty State */
.empty-state {
    padding: 4rem 2rem;
}

.empty-icon {
    width: 100px;
    height: 100px;
    margin: 0 auto;
    background: var(--primary-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    color: var(--primary);
}

/* CTA Section */
.cta-section {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
}

.cta-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: var(--radius-lg);
    padding: 4rem;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.cta-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: white;
    margin-bottom: 1rem;
}

.cta-description {
    font-size: 1.1rem;
    color: rgba(255, 255, 255, 0.9);
    max-width: 600px;
}

/* Badge personnalisé */
.badge-primary-light {
    background: var(--primary-light);
    color: var(--primary);
}

.bg-primary-light { background: var(--primary-light); }
.bg-success-light { background: var(--success-light); }
.bg-warning-light { background: var(--warning-light); }
.bg-info-light { background: var(--info-light); }

/* Responsive */
@media (max-width: 768px) {
    .hero-section {
        padding: 60px 0;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .cta-title {
        font-size: 2rem;
    }
    
    .cta-card {
        padding: 2rem;
    }
    
    .floating-card {
        width: 200px;
        padding: 1rem;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Animation des statistiques
function animateCounter(element) {
    const target = parseInt(element.getAttribute('data-count'));
    const duration = 2000;
    const step = target / (duration / 16);
    let current = 0;
    
    const timer = setInterval(() => {
        current += step;
        if (current >= target) {
            element.textContent = target;
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current);
        }
    }, 16);
}

// Lancer l'animation quand la page est chargée
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.stat-number');
    counters.forEach(counter => {
        animateCounter(counter);
    });
    
    // Animation des cartes flottantes
    const cards = document.querySelectorAll('.floating-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 2}s`;
    });
});
</script>
@endpush