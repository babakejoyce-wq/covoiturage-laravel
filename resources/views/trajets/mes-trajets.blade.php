@extends('layouts.premium')

@section('title', 'Mes trajets')

@section('content')
<div class="py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>
            <i class="fas fa-history text-info"></i> Mes trajets
        </h1>
        
        <div>
            <a href="{{ route('trajets.index') }}" class="btn btn-outline-primary me-2">
                <i class="fas fa-list"></i> Tous les trajets
            </a>
            <a href="{{ route('trajets.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nouveau trajet
            </a>
        </div>
    </div>

    @if($trajets->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Itinéraire</th>
                        <th>Date</th>
                        <th>Places</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trajets as $trajet)
                        <tr>
                            <td>
                                <strong>{{ $trajet->ville_depart }} → {{ $trajet->ville_arrivee }}</strong><br>
                                <small class="text-muted">
                                    <i class="fas fa-map-marker-alt"></i> {{ $trajet->lieu_depart }}<br>
                                    <i class="fas fa-map-marker-alt"></i> {{ $trajet->lieu_arrivee }}
                                </small>
                            </td>
                            <td>
                                {{ $trajet->date_trajet->format('d/m/Y') }}<br>
                                <small>{{ $trajet->date_trajet->format('H:i') }}</small>
                            </td>
                            <td>
                                <span class="badge bg-primary">{{ $trajet->places }}</span>
                            </td>
                            <td>
                                @if($trajet->date_trajet->isPast())
                                    <span class="badge bg-secondary">
                                        <i class="fas fa-check-circle"></i> Terminé
                                    </span>
                                @else
                                    <span class="badge bg-success">
                                        <i class="fas fa-clock"></i> À venir
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('trajets.show', $trajet) }}" 
                                       class="btn btn-outline-primary" 
                                       title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    
                                    @if(!$trajet->date_trajet->isPast())
                                        <button class="btn btn-outline-warning" disabled title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    @endif
                                    
                                    <form action="{{ route('trajets.destroy', $trajet) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Supprimer ce trajet ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
            <h4 class="text-muted">Vous n'avez pas encore créé de trajet</h4>
            <p class="text-muted">Proposez votre premier trajet de covoiturage !</p>
            <a href="{{ route('trajets.create') }}" class="btn btn-primary btn-lg mt-3">
                <i class="fas fa-plus"></i> Proposer un trajet
            </a>
        </div>
    @endif
</div>
@endsection