@extends('layouts.premium')

@section('title', 'Modifier mon véhicule')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Modifier votre véhicule</h4>
                </div>

                <div class="card-body">
                    <!-- Afficher la photo actuelle -->
                    @if($vehicle->photo)
                    <div class="mb-4 text-center">
                        <p class="form-label">Photo actuelle :</p>
                        <img src="{{ asset('storage/' . $vehicle->photo) }}" 
                             alt="Véhicule" 
                             class="img-fluid rounded" 
                             style="max-height: 200px;">
                    </div>
                    @endif

                    <form method="POST" action="{{ route('vehicles.update', $vehicle) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Numéro de plaque -->
                        <div class="mb-3">
                            <label for="plate_number" class="form-label">Numéro de plaque *</label>
                            <input type="text" 
                                   class="form-control @error('plate_number') is-invalid @enderror" 
                                   id="plate_number" 
                                   name="plate_number" 
                                   value="{{ old('plate_number', $vehicle->plate_number) }}" 
                                   required>
                            @error('plate_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nouvelle photo -->
                        <div class="mb-3">
                            <label for="photo" class="form-label">
                                {{ $vehicle->photo ? 'Changer la photo' : 'Photo du véhicule *' }}
                            </label>
                            <input type="file" 
                                   class="form-control @error('photo') is-invalid @enderror" 
                                   id="photo" 
                                   name="photo" 
                                   accept="image/*"
                                   {{ $vehicle->photo ? '' : 'required' }}>
                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Laisser vide pour conserver l'image actuelle</div>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description *</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="4" 
                                      required>{{ old('description', $vehicle->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary me-md-2">Annuler</a>
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </div>
                    </form>

                    <!-- Option pour supprimer -->
                    <hr class="my-4">
                    <div class="text-end">
                        <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" 
                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Supprimer le véhicule
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection