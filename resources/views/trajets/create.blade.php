@extends('layouts.premium')
@section('title', 'Proposer un trajet')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-plus-circle"></i> Proposer un nouveau trajet
                    </h4>
                </div>

                <div class="card-body">
                    <!-- Infos véhicule -->
                    @if(auth()->user()->vehicle)
                        <div class="alert alert-info mb-4">
                            <h6 class="alert-heading">
                                <i class="fas fa-car"></i> Votre véhicule
                            </h6>
                            <p class="mb-1">
                                <strong>Plaque :</strong> {{ auth()->user()->vehicle->plate_number }}
                            </p>
                            <p class="mb-0">
                                <strong>Description :</strong> {{ auth()->user()->vehicle->description }}
                            </p>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('trajets.store') }}">
                        @csrf

                        <div class="row">
                            <!-- Ville de départ -->
                            <div class="col-md-6 mb-3">
                                <label for="ville_depart" class="form-label">
                                    <i class="fas fa-map-marker-alt text-success"></i> Ville de départ *
                                </label>
                                <input type="text" 
                                       class="form-control @error('ville_depart') is-invalid @enderror" 
                                       id="ville_depart" 
                                       name="ville_depart" 
                                       value="{{ old('ville_depart') }}" 
                                       required
                                       placeholder="Ex: Lomé">
                                @error('ville_depart')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Lieu de départ précis -->
                            <div class="col-md-6 mb-3">
                                <label for="lieu_depart" class="form-label">
                                    <i class="fas fa-circle text-success"></i> Lieu de départ précis *
                                </label>
                                <input type="text" 
                                       class="form-control @error('lieu_depart') is-invalid @enderror" 
                                       id="lieu_depart" 
                                       name="lieu_depart" 
                                       value="{{ old('lieu_depart') }}" 
                                       required
                                       placeholder="Ex: Marché de Bè, Université de Lomé...">
                                @error('lieu_depart')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <!-- Ville d'arrivée -->
                            <div class="col-md-6 mb-3">
                                <label for="ville_arrivee" class="form-label">
                                    <i class="fas fa-map-marker-alt text-danger"></i> Ville d'arrivée *
                                </label>
                                <input type="text" 
                                       class="form-control @error('ville_arrivee') is-invalid @enderror" 
                                       id="ville_arrivee" 
                                       name="ville_arrivee" 
                                       value="{{ old('ville_arrivee') }}" 
                                       required
                                       placeholder="Ex: Kara">
                                @error('ville_arrivee')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Lieu d'arrivée précis -->
                            <div class="col-md-6 mb-3">
                                <label for="lieu_arrivee" class="form-label">
                                    <i class="fas fa-circle text-danger"></i> Lieu d'arrivée précis *
                                </label>
                                <input type="text" 
                                       class="form-control @error('lieu_arrivee') is-invalid @enderror" 
                                       id="lieu_arrivee" 
                                       name="lieu_arrivee" 
                                       value="{{ old('lieu_arrivee') }}" 
                                       required
                                       placeholder="Ex: Campus universitaire, Gare routière...">
                                @error('lieu_arrivee')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <!-- Date et heure -->
                            <div class="col-md-6 mb-3">
                                <label for="date_trajet" class="form-label">
                                    <i class="fas fa-calendar-alt"></i> Date et heure du trajet *
                                </label>
                                <input type="datetime-local" 
                                       class="form-control @error('date_trajet') is-invalid @enderror" 
                                       id="date_trajet" 
                                       name="date_trajet" 
                                       value="{{ old('date_trajet') }}" 
                                       required
                                       min="{{ now()->format('Y-m-d\TH:i') }}">
                                @error('date_trajet')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Le trajet doit être dans le futur</div>
                            </div>

                            <!-- Nombre de places -->
                            <div class="col-md-6 mb-3">
                                <label for="places" class="form-label">
                                    <i class="fas fa-users"></i> Nombre de places disponibles *
                                </label>
                                <input type="number" 
                                       class="form-control @error('places') is-invalid @enderror" 
                                       id="places" 
                                       name="places" 
                                       value="{{ old('places', 1) }}" 
                                       min="1" 
                                       max="8" 
                                       required>
                                @error('places')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Maximum 8 places</div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="{{ route('trajets.index') }}" class="btn btn-secondary me-md-2">
                                <i class="fas fa-times"></i> Annuler
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check"></i> Publier le trajet
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Définir la date minimale à maintenant
    document.addEventListener('DOMContentLoaded', function() {
        const now = new Date();
        const localDateTime = now.toISOString().slice(0, 16);
        document.getElementById('date_trajet').min = localDateTime;
    });
</script>
@endpush
@endsection