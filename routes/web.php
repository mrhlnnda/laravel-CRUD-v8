<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>['auth']], function (){
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/mahasiswa', [\App\Http\Controllers\MahasiswaController::class, 'index'])->name('mahasiswa');
    Route::get('/mahasiswa/list', [\App\Http\Controllers\MahasiswaController::class, 'list'])->name('mahasiswa.list');
    Route::get('/mahasiswa/create', [\App\Http\Controllers\MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/mahasiswa/store', [\App\Http\Controllers\MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa/edit/{id?}', [\App\Http\Controllers\MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::post('/mahasiswa/update/{id?}', [\App\Http\Controllers\MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::get('/mahasiswa/delete/{id?}', [\App\Http\Controllers\MahasiswaController::class, 'delete'])->name('mahasiswa.delete');
});

require __DIR__.'/auth.php';
