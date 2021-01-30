<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaperController;

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

Route::get('/', [paperController::class, 'index'])->name('papers.index');

//--------------------------------------------------------------------------

Route::get('/papers', [paperController::class, 'index'])->name('papers.index');

Route::get('/papers/create', [paperController::class, 'create'])->name('papers.create');

Route::post('/papers/store', [paperController::class, 'store'])->name('papers.store');

Route::get('/papers/{papid}', [paperController::class, 'detail'])->name('papers.detail');

Route::get('/papers/{papid}/edit', [paperController::class, 'edit'])->name('papers.edit');

Route::patch('/papers/{papid}', [paperController::class, 'update'])->name('papers.update');

Route::delete('/papers/{papid}', [paperController::class, 'destroy'])->name('papers.destroy');




