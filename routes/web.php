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

Route::view('Clientes', 'entities.Clientes')
    ->middleware(['auth', 'verified'])
    ->name('Clientes');

Route::view('Enderecos', 'entities.Enderecos')
    ->middleware(['auth', 'verified'])
    ->name('Enderecos');

Route::view('Produtos', 'entities.Produtos')
    ->middleware(['auth', 'verified'])
    ->name('Produtos');

Route::view('Vendas', 'entities.Vendas')
    ->middleware(['auth', 'verified'])
    ->name('Vendas');

Route::view('Pagamentos', 'entities.Pagamentos')
    ->middleware(['auth', 'verified'])
    ->name('Pagamentos');

Route::view('Estoques', 'entities.Estoques')
    ->middleware(['auth', 'verified'])
    ->name('Estoques');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
