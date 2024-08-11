<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\CompetenceController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/employes', [EmployeController::class, 'index'])->name('employes.index');
Route::get('/employes/create', [EmployeController::class, 'create'])->name('employes.create');
Route::post('/employes', [EmployeController::class, 'store'])->name('employes.store');
Route::get('/employes/{id}', [EmployeController::class, 'show'])->name('employes.show');
Route::get('/employes/{id}/edit', [EmployeController::class, 'edit'])->name('employes.edit');
Route::put('/employes/{id}', [EmployeController::class, 'update'])->name('employes.update');
Route::delete('/employes/{id}', [EmployeController::class, 'destroy'])->name('employes.destroy');



Route::get('/taches', [TacheController::class, 'index'])->name('taches.index');
Route::get('/taches/create', [TacheController::class, 'create'])->name('taches.create');
Route::post('/taches', [TacheController::class, 'store'])->name('taches.store');
Route::get('/taches/{tache}', [TacheController::class, 'show'])->name('taches.show');
Route::get('/taches/{tache}/edit', [TacheController::class, 'edit'])->name('taches.edit');
Route::put('/taches/{tache}', [TacheController::class, 'update'])->name('taches.update');
Route::delete('/taches/{tache}', [TacheController::class, 'destroy'])->name('taches.destroy');


Route::get('/competences', [CompetenceController::class, 'index'])->name('competences.index');
Route::get('/competences/create', [CompetenceController::class, 'create'])->name('competences.create');
Route::post('/competences', [CompetenceController::class, 'store'])->name('competences.store');
Route::get('/competences/{id}', [CompetenceController::class, 'show'])->name('competences.show');
Route::get('/competences/{id}/edit', [CompetenceController::class, 'edit'])->name('competences.edit');
Route::put('/competences/{id}', [CompetenceController::class, 'update'])->name('competences.update');
Route::delete('/competences/{id}', [CompetenceController::class, 'destroy'])->name('competences.destroy');

