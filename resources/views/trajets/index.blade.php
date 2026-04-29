@extends('layouts.premium')

@section('title', 'Trajets disponibles')

@section('content')
<div class="py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>
            <i class="fas fa-route text-primary"></i> Trajets disponibles
        </h1>
        
        @auth
            <a href="{{ route('trajets.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Proposer un trajet
            </a>
        @endauth
    </div>

    <!-- Filtres (bonus) -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('trajets.index') }}" method="GET" class="row g-3">
                <div class="col-md-3">
                    <label for="ville_depart" class="form-label">Ville de départ</label>
                    <input type="text" class="form-control" id="ville_depart" name="ville_depart" 
                           value="{{ request('ville_depart') }}" placeholder="Ex: Lomé">
                </div>
                <div class="col-md-3">
                    <label for="ville_arrivee" class="form-label">Ville d'arrivée</label>
                    <input type="text" class="form-control" id="ville_arrivee" name="ville_arrivee"
                           value="{{ request('ville_arrivee') }}" placeholder="Ex: Kara">
                </div>
                <div class="col-md-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date"
                           value="{{ request('date') }}">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-outline-primary w-100">
                        <i class="fas fa-search"></i> Filtrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Liste des trajets -->
    @if($trajets->count() > 0)
        <div class="row">
            @foreach($trajets as $trajet)
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">
                                    <i class="fas fa-map-marker-alt text-danger"></i>
                                    {{ $trajet->ville_depart }} → {{ $trajet->ville_arrivee }}
                                </h5>
                                <span class="badge bg-primary">
                                    {{ $trajet->places }} place(s)
                                </span>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <p class="mb-2">
                                        <strong><i class="fas fa-circle text-success"></i> Départ:</strong><br>
                                        <small class="text-muted">{{ $trajet->lieu_depart }}</small>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-2">
                                        <strong><i class="fas fa-circle text-danger"></i> Arrivée:</strong><br>
                                        <small class="text-muted">{{ $trajet->lieu_arrivee }}</small>
                                    </p>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <div class="row">
                                <div class="col-6">
                                    <p class="mb-0">
                                        <strong><i class="fas fa-calendar"></i> Date:</strong><br>
                                        {{ $trajet->date_trajet->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0">
                                        <strong><i class="fas fa-user"></i> Conducteur:</strong><br>
                                        {{ $trajet->user->first_name }} {{ $trajet->user->last_name }}
                                    </p>
                                </div>
                            </div>
                            
                            @if($trajet->user->vehicle)
                                <hr>
                                <div class="vehicle-info">
                                    <strong><i class="fas fa-car"></i> Véhicule:</strong><br>
                                    <div class="d-flex align-items-center mt-2">
                                        @if($trajet->user->vehicle->photo)
                                            <img src="{{ asset('storage/' . $trajet->user->vehicle->photo) }}" 
                                                 alt="Véhicule" 
                                                 class="rounded me-3" 
                                                 style="width: 60px; height: 60px; object-fit: cover;">
                                        @endif
                                        <div>
                                            <small class="text-muted d-block">
                                                {{ $trajet->user->vehicle->plate_number }}
                                            </small>
                                            <small>{{ $trajet->user->vehicle->description }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        <div class="card-footer bg-transparent">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-phone text-success"></i>
                                    <small class="text-muted">{{ $trajet->user->phone }}</small>
                                </div>
                                <a href="{{ route('trajets.show', $trajet) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i> Voir détails
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $trajets->links() }}
        </div>
    @else
        <div class="text-center py-5">
            <div class="mb-4">
                <i class="fas fa-route fa-4x text-muted"></i>
            </div>
            <h4 class="text-muted">Aucun trajet disponible</h4>
            <p class="text-muted">Soyez le premier à proposer un trajet !</p>
            
            @auth
                <a href="{{ route('trajets.create') }}" class="btn btn-primary btn-lg mt-3">
                    <i class="fas fa-plus"></i> Proposer un trajet
                </a>
            @else
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg mt-3">
                    <i class="fas fa-user-plus"></i> Inscrivez-vous pour proposer un trajet
                </a>
            @endauth
        </div>
    @endif
</div>
@endsection