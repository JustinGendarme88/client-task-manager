<?php





use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::get('/', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');

use App\Http\Controllers\TaskController;

Route::post('/clients/{client}/tasks', [TaskController::class, 'store'])->name('tasks.store');