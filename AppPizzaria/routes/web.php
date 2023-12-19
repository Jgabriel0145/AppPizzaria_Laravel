<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FornecedoresController;
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

Route::get('/clientes/cadastro', [ClientesController::class, 'cadastro'])->name('clientes.cadastro');
Route::get('/clientes/listagem', [ClientesController::class, 'index'])->name('clientes.index');
Route::post('/clientes/cadastro/save', [ClientesController::class, 'save'])->name('clientes.save');

Route::get('/fornecedores/cadastro', [FornecedoresController::class, 'cadastro'])->name('fornecedores.cadastro');
Route::get('/fornecedores/listagem', [FornecedoresController::class, 'index'])->name('fornecedores.index');
Route::post('/fornecedores/cadastro/save', [FornecedoresController::class, 'save'])->name('fornecedores.save');

Route::get('/', function () {
    return view('welcome');
});
