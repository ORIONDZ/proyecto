<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AlmacenController;

#Pagina raíz, redirecciona a la página login automaticamente
#Si el usuario está logeado redirecciona a articulos
Route::get('/', function () {
    return view('auth.login');
});

#Autenticador
Auth::routes();

#Pagina principal + Obtener articulos
Route::get('/articulos', [AlmacenController::class, 'index'])->name('articulos');
#Pagina del formulario para crear articulos
Route::get('/articulos/create', [AlmacenController::class, 'create'])->name('articulos_create');
#Redirecciona + guarda el articulo
Route::post('/articulos/save', [AlmacenController::class, 'store'])->name('articulos_save');
#Mostrar articulo (Oculto)
Route::get('/articulos/{id}', [AlmacenController::class, 'show'])->name('articulos_show');
#Pagina del formulario para editar articulos
Route::put('/articulos/{id}/edit', [AlmacenController::class, 'edit'])->name('articulos_form_edit');
#Redirecciona + actualiza el articulo
Route::put('/articulos/{id}', [AlmacenController::class, 'update'])->name('articulos_update');
#Redirecciona + elimina el articulo
Route::delete('/articulos/{id}', [AlmacenController::class, 'destroy'])->name('articulos_delete');


