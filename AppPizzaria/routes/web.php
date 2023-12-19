<?php

use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/produtos/cadastro', [ProdutosController::class, 'cadastro'])->name('produtos.cadastro');
Route::get('/produtos/listagem', [ProdutosController::class, 'index'])->name('produtos.index');
Route::post('/produtos/cadastro/save', [ProdutosController::class, 'save'])->name('produtos.save');

Route::get('/', function () {
    return view('welcome');
});
