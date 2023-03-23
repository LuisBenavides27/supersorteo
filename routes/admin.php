<?php

use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SorteoController;
use App\Http\Controllers\Admin\GrupoController;
use App\Http\Controllers\Admin\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('',[HomeController::class,'index'])->middleware('can:admin.home')->name('admin.home');
Route::get('sorteos.realizar',[HomeController::class,'realizar'])->middleware('can:admin.sorteos.realizar')->name('admin.sorteos.realizar');

Route::get('sorteos/girar/{sorteo}',[SorteoController::class,'girar'])->middleware('can:admin.sorteos.girar')->name('admin.sorteos.girar');
Route::get('sorteos/ganador/{sorteo}',[SorteoController::class,'ganador'])->middleware('can:admin.sorteos.ganador')->name('admin.sorteos.ganador');
Route::get('sorteos/finalizar/{sorteo}',[SorteoController::class,'finalizar'])->name('admin.sorteos.finalizar');
Route::get('clientes/estado/[{ganador}/{sorteo}]',[ClienteController::class,'estado'])->name('admin.clientes.estado');
Route::post('sorteos.importar',[SorteoController::class,'importar'])->name('admin.sorteos.importar');
Route::post('sorteos.exportar',[SorteoController::class,'exportar'])->name('admin.sorteos.exportar');

Route::get('reporte.generar/{sorteo}', [ClienteController::class, 'export'])->name('admin.reporte.generar');
Route::post('reporte.clientes.repo', [ClienteController::class, 'repo'])->name('admin.clientes.repo');

Route::resource('sorteos', SorteoController::class)->names('admin.sorteos');
Route::resource('clientes',ClienteController::class)->names('admin.clientes');
Route::resource('usuarios',UsuariosController::class)->middleware('can:admin.home')->names('admin.usuarios');

Route::get('etiquetas.create',[GrupoController::class,'create'])->name('admin.etiquetas.create');
Route::get('etiquetas.index',[GrupoController::class,'index'])->name('admin.etiquetas.index');
Route::post('etiquetas.store',[GrupoController::class,'store'])->name('admin.etiquetas.store');
Route::get('etiquetas.destroy/{sorteo}',[GrupoController::class,'destroy'])->name('admin.etiquetas.destroy');

// UTILIZA ESTE MIDDLE
//->middleware(['auth', 'password.forgot'])