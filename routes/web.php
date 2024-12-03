<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\AdopcionController;

Route::get('/', [PrincipalController::class, 'inicio']);
Route::get('/nosotros', [PrincipalController::class, 'nosotros']);
Route::get('/citasf', [PrincipalController::class, 'citas']);
Route::get('/serviciosf', [PrincipalController::class, 'servicios']);
Route::get('/mascotasf', [PrincipalController::class, 'mascotas']);
Route::get('/adopcionf', [PrincipalController::class, 'adopcion']);

// Rutas de Servicios
Route::get('/servicios', [ServicioController::class, 'inicio'])->name('servicios.inicio');
Route::post('/servicios', [ServicioController::class, 'store'])->name('servicios.store');
Route::get('/servicios/{id}/edit', [ServicioController::class, 'edit'])->name('servicios.edit');
Route::put('/servicios/{id}', [ServicioController::class, 'update'])->name('servicios.update');
Route::delete('/servicios/{id}', [ServicioController::class, 'destroy'])->name('servicios.destroy');
Route::get('/servicios/search', [ServicioController::class, 'search'])->name('servicios.search');

// Rutas de Mascotas
Route::get('/mascotas', [MascotaController::class, 'inicio'])->name('mascotas.inicio'); 
Route::get('/mascotas/create', [MascotaController::class, 'create'])->name('mascotas.create'); 
Route::post('/mascotas', [MascotaController::class, 'store'])->name('mascotas.store'); 
Route::get('/mascotas/{id}/edit', [MascotaController::class, 'edit'])->name('mascotas.edit'); 
Route::put('/mascotas/{id}', [MascotaController::class, 'update'])->name('mascotas.update'); 
Route::delete('/mascotas/{id}', [MascotaController::class, 'destroy'])->name('mascotas.destroy'); 
Route::get('/mascotas/search', [MascotaController::class, 'search'])->name('mascotas.search'); 

// Rutas de Citas
Route::get('/citas', [CitaController::class, 'inicio'])->name('citas.inicio');     
Route::get('/citas/create', [CitaController::class, 'create'])->name('citas.create');  
Route::post('/citas', [CitaController::class, 'store'])->name('citas.store');   
Route::get('/citas/{id}/edit', [CitaController::class, 'edit'])->name('citas.edit'); 
Route::put('/citas/{id}', [CitaController::class, 'update'])->name('citas.update');  
Route::delete('/citas/{id}', [CitaController::class, 'destroy'])->name('citas.destroy');  
Route::get('/citas/search', [CitaController::class, 'search'])->name('citas.search'); 

//rutas de adopcion
Route::get('/adopcion', [AdopcionController::class, 'inicio'])->name('adopcion.inicio');     
Route::get('/adopcion/create', [AdopcionController::class, 'create'])->name('adopcion.create');  
Route::post('/adopcion', [AdopcionController::class, 'store'])->name('adopcion.store');   
Route::get('/adopcion/{id}/edit', [AdopcionController::class, 'edit'])->name('adopcion.edit'); 
Route::put('/adopcion/{id}', [AdopcionController::class, 'update'])->name('adopcion.update');    
Route::get('/adopcion/search', [AdopcionController::class, 'search'])->name('adopcion.search'); 