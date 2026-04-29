<?php

namespace App\Http\Controllers;

use App\Models\Trajet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrajetController extends Controller
{
    public function index(Request $request)
{
    $query = Trajet::with(['user', 'user.vehicle'])->futur();
    
    // Filtre ville départ
    if ($request->filled('ville_depart')) {
        $query->where('ville_depart', 'like', '%' . $request->ville_depart . '%');
    }
    
    // Filtre ville arrivée
    if ($request->filled('ville_arrivee')) {
        $query->where('ville_arrivee', 'like', '%' . $request->ville_arrivee . '%');
    }
    
    // Filtre date
    if ($request->filled('date')) {
        $query->whereDate('date_trajet', $request->date);
    }
    
    $trajets = $query->orderBy('date_trajet')->paginate(10);
    
    return view('trajets.index', compact('trajets'));
}
    // Afficher le formulaire de création
    public function create()
    {
        // Vérifier que l'utilisateur a un véhicule
        if (!Auth::user()->vehicle) {
            return redirect()->route('dashboard')
                ->with('error', 'Vous devez d\'abord enregistrer un véhicule pour proposer un trajet.');
        }
        
        return view('trajets.create');
    }

    // Enregistrer un nouveau trajet
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'ville_depart' => 'required|string|max:100',
            'lieu_depart' => 'required|string|max:255',
            'ville_arrivee' => 'required|string|max:100',
            'lieu_arrivee' => 'required|string|max:255',
            'date_trajet' => 'required|date|after:now',
            'places' => 'required|integer|min:1|max:8',
        ]);

        // Ajouter l'ID de l'utilisateur
        $validated['user_id'] = Auth::id();

        // Créer le trajet
        Trajet::create($validated);

        return redirect()->route('trajets.index')
            ->with('success', 'Trajet créé avec succès !');
    }

    // Afficher un trajet spécifique
    public function show(Trajet $trajet)
    {
        $trajet->load(['user', 'user.vehicle']);
        return view('trajets.show', compact('trajet'));
    }

    // Afficher les trajets de l'utilisateur connecté
    public function mesTrajets()
    {
        $trajets = Auth::user()->trajets()
                        ->with(['user', 'user.vehicle'])
                        ->orderBy('date_trajet', 'desc')
                        ->paginate(10);
        
        return view('trajets.mes-trajets', compact('trajets'));
    }

    // Supprimer un trajet
    public function destroy(Trajet $trajet)
    {
        // Vérifier que l'utilisateur est propriétaire
        if ($trajet->user_id !== Auth::id()) {
            abort(403, 'Non autorisé');
        }

        $trajet->delete();

        return redirect()->route('trajets.mes-trajets')
            ->with('success', 'Trajet supprimé avec succès !');
    }
}