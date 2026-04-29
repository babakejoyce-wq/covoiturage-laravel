<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    // Afficher le formulaire de création
    public function create()
    {
        // Vérifier si l'utilisateur a déjà un véhicule
        if (Auth::user()->vehicle) {
            return redirect()->route('vehicles.edit');
        }
        
        return view('vehicles.create');
    }

    // Enregistrer le véhicule
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'plate_number' => 'required|string|max:20|unique:vehicles',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string|min:10|max:500',
        ]);

        // Gérer l'upload de la photo
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('vehicles', 'public');
            $validated['photo'] = $path;
        }

        // Associer le véhicule à l'utilisateur connecté
        $validated['user_id'] = Auth::id();

        // Créer le véhicule
        Vehicle::create($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Véhicule enregistré avec succès !');
    }

    // Afficher le formulaire d'édition
    public function edit(Vehicle $vehicle)
    {
        // Vérifier que l'utilisateur est propriétaire
        if ($vehicle->user_id !== Auth::id()) {
            abort(403);
        }

        return view('vehicles.edit', compact('vehicle'));
    }

    // Mettre à jour le véhicule
    public function update(Request $request, Vehicle $vehicle)
    {
        // Vérifier que l'utilisateur est propriétaire
        if ($vehicle->user_id !== Auth::id()) {
            abort(403);
        }

        // Validation
        $validated = $request->validate([
            'plate_number' => 'required|string|max:20|unique:vehicles,plate_number,' . $vehicle->id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string|min:10|max:500',
        ]);

        // Gérer l'upload de la nouvelle photo
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($vehicle->photo && Storage::disk('public')->exists($vehicle->photo)) {
                Storage::disk('public')->delete($vehicle->photo);
            }
            
            $path = $request->file('photo')->store('vehicles', 'public');
            $validated['photo'] = $path;
        } else {
            // Garder l'ancienne photo
            $validated['photo'] = $vehicle->photo;
        }

        // Mettre à jour
        $vehicle->update($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Véhicule mis à jour avec succès !');
    }

    // Supprimer le véhicule (optionnel)
    public function destroy(Vehicle $vehicle)
    {
        // Vérifier que l'utilisateur est propriétaire
        if ($vehicle->user_id !== Auth::id()) {
            abort(403);
        }

        // Supprimer la photo
        if ($vehicle->photo && Storage::disk('public')->exists($vehicle->photo)) {
            Storage::disk('public')->delete($vehicle->photo);
        }

        $vehicle->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Véhicule supprimé avec succès !');
    }
}