<?php

use App\Http\Livewire\Clients;
use App\Http\Livewire\Depenses;
use App\Http\Livewire\Devis;
use App\Http\Livewire\Employes;
use App\Http\Livewire\Fournisseurs;
use App\Http\Livewire\Historiques;
use App\Http\Livewire\Home;
use App\Http\Livewire\Login;
use App\Http\Livewire\Products;
use App\Http\Livewire\Prospects;
use App\Http\Livewire\Rapports;
use App\Http\Livewire\Reunions;
use App\Http\Livewire\Settings;
use App\Http\Livewire\StaticDatas;
use App\Http\Livewire\Tasks;
use App\Http\Livewire\Ventes;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('/',Login::class)->name('login');
Route::any('/home', Home::class)->name('home');
Route::any('/staticData', StaticDatas::class)->name('staticData');
Route::any('/employes', Employes::class)->name('employe');
Route::any('/products', Products::class)->name('product');
Route::any('/tasks', Tasks::class)->name('task');
Route::any('/reunions', Reunions::class)->name('reunion');
Route::any('/historiques', Historiques::class)->name('historique');
Route::any('/clients', Clients::class)->name('client');
Route::any('/fournisseurs', Fournisseurs::class)->name('fournisseur');
Route::any('/prospects', Prospects::class)->name('prospect');
Route::any('/devis', Devis::class)->name('devis');
Route::any('/ventes', Ventes::class)->name('vente');
Route::any('/depenses', Depenses::class)->name('depense');
Route::any('/rapports', Rapports::class)->name('rapport');
Route::any('/parametres', Settings::class)->name('setting');
