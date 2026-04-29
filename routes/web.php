<?php

use App\Http\Controllers\TrajetController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('home');
});

// Routes publiques pour les trajets (accessibles sans authentification)
Route::get('/trajets', [TrajetController::class, 'index'])->name('trajets.index');

// Routes nécessitant une authentification
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Véhicule
    Route::resource('vehicles', VehicleController::class)->except(['show', 'index']);
    
    // Trajets (création et gestion)
    Route::get('/trajets/create', [TrajetController::class, 'create'])->name('trajets.create');
    Route::post('/trajets', [TrajetController::class, 'store'])->name('trajets.store');
    Route::get('/mes-trajets', [TrajetController::class, 'mesTrajets'])->name('trajets.mes-trajets');
    Route::delete('/trajets/{trajet}', [TrajetController::class, 'destroy'])->name('trajets.destroy');
});
Route::get('/trajets/{trajet}', [TrajetController::class, 'show'])->name('trajets.show');
require __DIR__.'/auth.php';