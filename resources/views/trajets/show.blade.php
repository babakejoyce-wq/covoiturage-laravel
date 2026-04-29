@extends('layouts.premium')

@section('title', 'Détails du trajet')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Bouton retour -->
            <a href="{{ route('trajets.index') }}" class="btn btn-outline-secondary mb-4">
                <i class="fas fa-arrow-left"></i> Retour aux trajets
            </a>

            <div class="card shadow">
                <!-- En-tête -->
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-0">
                                <i class="fas fa-route"></i> {{ $trajet->ville_depart }} → {{ $trajet->ville_arrivee }}
                            </h3>
                            <p class="mb-0">
                                <i class="fas fa-calendar"></i> 
                                {{ $trajet->date_trajet->format('d/m/Y à H:i') }}
                            </p>
                        </div>
                        <span class="badge bg-light text-dark fs-6">
                            <i class="fas fa-users"></i> {{ $trajet->places }} place(s) disponible(s)
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Itinéraire -->
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <div class="card border-success">
                                <div class="card-header bg-success text-white">
                                    <h5 class="mb-0">
                                        <i class="fas fa-circle"></i> Départ
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <h4 class="text-success">{{ $trajet->ville_depart }}</h4>
                                    <p class="lead">{{ $trajet->lieu_depart }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card border-danger">
                                <div class="card-header bg-danger text-white">
                                    <h5 class="mb-0">
                                        <i class="fas fa-circle"></i> Arrivée
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <h4 class="text-danger">{{ $trajet->ville_arrivee }}</h4>
                                    <p class="lead">{{ $trajet->lieu_arrivee }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informations conducteur -->
                    <div class="card mb-4">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-user-circle"></i> Informations du conducteur
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4>{{ $trajet->user->first_name }} {{ $trajet->user->last_name }}</h4>
                                    <p class="mb-1">
                                        <i class="fas fa-phone text-success"></i> 
                                        <strong>Téléphone :</strong> {{ $trajet->user->phone }}
                                    </p>
                                    <p class="mb-0">
                                        <i class="fas fa-envelope"></i> 
                                        <strong>Email :</strong> {{ $trajet->user->email }}
                                    </p>
                                </div>
                                <div class="col-md-4 text-end">
                                    <div class="bg-light p-3 rounded">
                                        <small class="text-muted d-block">Conducteur depuis</small>
                                        <strong>{{ $trajet->user->created_at->format('d/m/Y') }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informations véhicule -->
                    @if($trajet->user->vehicle)
                    <div class="card">
                        <div class="card-header bg-warning text-dark">
                            <h5 class="mb-0">
                                <i class="fas fa-car"></i> Informations du véhicule
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                @if($trajet->user->vehicle->photo)
                                <div class="col-md-4 mb-3 mb-md-0">
                                    <img src="{{ asset('storage/' . $trajet->user->vehicle->photo) }}" 
                                         alt="Véhicule" 
                                         class="img-fluid rounded shadow">
                                </div>
                                @endif
                                
                                <div class="{{ $trajet->user->vehicle->photo ? 'col-md-8' : 'col-12' }}">
                                    <h4 class="text-warning">
                                        <i class="fas fa-id-card"></i> {{ $trajet->user->vehicle->plate_number }}
                                    </h4>
                                    <p class="lead">{{ $trajet->user->vehicle->description }}</p>
                                    <div class="mt-3">
                                        <span class="badge bg-dark">
                                            <i class="fas fa-car"></i> Véhicule vérifié
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Actions -->
                <div class="card-footer bg-light">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted">
                                <i class="fas fa-clock"></i> Publié le {{ $trajet->created_at->format('d/m/Y à H:i') }}
                            </small>
                        </div>
                        
                        <div>
                            @auth
                                @if(auth()->id() === $trajet->user_id)
                                    <form action="{{ route('trajets.destroy', $trajet) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce trajet ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i> Supprimer ce trajet
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-success" disabled>
                                        <i class="fas fa-phone"></i> Contacter le conducteur
                                    </button>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary">
                                    <i class="fas fa-sign-in-alt"></i> Connectez-vous pour réserver
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection