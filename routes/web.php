<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EnderecosController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\itens_vendasController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('Clientes', 'entities.clientes.Index')
    ->middleware(['auth', 'verified'])
    ->name('Clientes');

Route::view('Enderecos', 'entities.enderecos.Index')
    ->middleware(['auth', 'verified'])
    ->name('Enderecos');

Route::view('Produtos', 'entities.produtos.index')
    ->middleware(['auth', 'verified'])
    ->name('Produtos');

Route::view('Vendas', 'entities.vendas.Index')
    ->middleware(['auth', 'verified'])
    ->name('Vendas');

Route::view('Pagamentos', 'entities.pagamentos.Index')
    ->middleware(['auth', 'verified'])
    ->name('Pagamentos');

Route::view('Estoques', 'entities.estoques.Index')
    ->middleware(['auth', 'verified'])
    ->name('Estoques');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::resource('clientes', ClientesController::class)
    ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);

Route::get('/enderecos/create/{id}', [EnderecosController::class, 'create'])->name('enderecos.create');

Route::resource('enderecos', EnderecosController::class)
    ->only(['index', 'store', 'show', 'edit', 'update', 'destroy']);

Route::resource('produtos', ProdutosController::class)
    ->only(['index', 'store', 'show', 'edit', 'update', 'destroy', 'create']);

Route::resource('vendas', VendasController::class)
    ->only(['index', 'store', 'show', 'create']);

Route::resource('itens', itens_vendasController::class)
    ->only(['index', 'store', 'show', 'create']);

require __DIR__.'/auth.php';


