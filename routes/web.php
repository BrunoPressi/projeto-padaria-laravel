<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('Clientes', 'entities.clientes.Clientes')
    ->middleware(['auth', 'verified'])
    ->name('Clientes');

Route::view('Enderecos', 'entities.enderecos.Enderecos')
    ->middleware(['auth', 'verified'])
    ->name('Enderecos');

Route::view('Produtos', 'entities.produtos.Produtos')
    ->middleware(['auth', 'verified'])
    ->name('Produtos');

Route::view('Vendas', 'entities.vendas.Vendas')
    ->middleware(['auth', 'verified'])
    ->name('Vendas');

Route::view('Pagamentos', 'entities.pagamentos.Pagamentos')
    ->middleware(['auth', 'verified'])
    ->name('Pagamentos');

Route::view('Estoques', 'entities.estoques.Estoques')
    ->middleware(['auth', 'verified'])
    ->name('Estoques');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
