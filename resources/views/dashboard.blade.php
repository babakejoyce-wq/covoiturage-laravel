@extends('layouts.premium')

@section('title', 'Tableau de bord')

@section('content')
<div class="py-5">
    <!-- Messages de succès/erreur -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <!-- Bienvenue -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Bienvenue, {{ auth()->user()->first_name }} !</h1>
                    <p class="card-text">Gérez votre véhicule et vos trajets de covoiturage.</p>
                </div>
            </div>
        </div>

        <!-- Carte Véhicule -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-car"></i> Mon véhicule
                    </h5>
                </div>
                
                <div class="card-body">
                    @if(auth()->user()->vehicle)
                        <div class="text-center mb-3">
                            @if(auth()->user()->vehicle->photo)
                                <img src="{{ asset('storage/' . auth()->user()->vehicle->photo) }}" 
                                     alt="Véhicule" 
                                     class="img-fluid rounded mb-3" 
                                     style="max-height: 200px;">
                            @else
                                <div class="bg-light rounded mb-3 d-flex align-items-center justify-content-center" 
                                     style="height: 150px;">
                                    <i class="fas fa-car fa-3x text-secondary"></i>
                                </div>
                            @endif
                        </div>
                        
                        <div class="mb-3">
                            <p><strong><i class="fas fa-id-card"></i> Plaque :</strong> 
                               <span class="badge bg-dark">{{ auth()->user()->vehicle->plate_number }}</span>
                            </p>
                            <p><strong><i class="fas fa-info-circle"></i> Description :</strong></p>
                            <p class="text-muted">{{ auth()->user()->vehicle->description }}</p>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <a href="{{ route('vehicles.edit', auth()->user()->vehicle) }}" 
                               class="btn btn-primary">
                                <i class="fas fa-edit"></i> Modifier mon véhicule
                            </a>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <div class="mb-3">
                                <i class="fas fa-car fa-4x text-secondary"></i>
                            </div>
                            <p class="text-muted mb-4">Vous n'avez pas encore de véhicule enregistré</p>
                            <a href="{{ route('vehicles.create') }}" 
                               class="btn btn-primary btn-lg">
                                <i class="fas fa-plus"></i> Ajouter mon véhicule
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Carte Mes trajets -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-route"></i> Mes trajets
                    </h5>
                </div>
                
                <div class="card-body">
                    <div class="text-center py-4">
                        <div class="mb-3">
                            <i class="fas fa-route fa-4x text-secondary"></i>
                        </div>
                        <p class="text-muted mb-4">Gérez vos trajets de covoiturage</p>
                        
                        @if(auth()->user()->vehicle)
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle"></i> 
                                Vous pouvez maintenant proposer des trajets !
                            </div>
                            <a href="{{ route('trajets.create') }}" class="btn btn-success btn-lg">
                                <i class="fas fa-plus"></i> Proposer un trajet
                            </a>
                            <a href="{{ route('trajets.mes-trajets') }}" class="btn btn-outline-success btn-lg mt-2">
                                 <i class="fas fa-history"></i> Voir mes trajets
                            </a>
                        @else
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle"></i> 
                                Vous devez d'abord enregistrer un véhicule pour proposer des trajets
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Informations personnelles -->
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-user"></i> Mes informations
                    </h5>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <p><strong><i class="fas fa-user"></i> Nom complet :</strong></p>
                                    <p>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <p><strong><i class="fas fa-envelope"></i> Email :</strong></p>
                                    <p>{{ auth()->user()->email }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <p><strong><i class="fas fa-phone"></i> Téléphone :</strong></p>
                                    <p>{{ auth()->user()->phone }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <p><strong><i class="fas fa-calendar"></i> Membre depuis :</strong></p>
                                    <p>{{ auth()->user()->created_at->format('d/m/Y') }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 d-flex align-items-center justify-content-center">
                            <a href="{{ route('profile.edit') }}" class="btn btn-info btn-lg">
                                <i class="fas fa-edit"></i> Modifier mon profil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection