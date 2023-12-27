<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\VendasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/produtos/cadastro/{id?}', [ProdutosController::class, 'cadastro'])->name('produtos.cadastro');
Route::get('/produtos/delete/{id?}', [ProdutosController::class, 'delete'])->name('produtos.delete');
Route::get('/produtos/listagem', [ProdutosController::class, 'index'])->name('produtos.index');
Route::post('/produtos/cadastro/save', [ProdutosController::class, 'save'])->name('produtos.save');

Route::get('/clientes/cadastro/{id?}', [ClientesController::class, 'cadastro'])->name('clientes.cadastro');
Route::get('/clientes/delete/{id?}', [ClientesController::class, 'delete'])->name('clientes.delete');
Route::get('/clientes/listagem', [ClientesController::class, 'index'])->name('clientes.index');
Route::post('/clientes/cadastro/save', [ClientesController::class, 'save'])->name('clientes.save');

Route::get('/fornecedores/cadastro/{id?}', [FornecedoresController::class, 'cadastro'])->name('fornecedores.cadastro');
Route::get('/fornecedores/delete/{id?}', [FornecedoresController::class, 'delete'])->name('fornecedores.delete');
Route::get('/fornecedores/listagem', [FornecedoresController::class, 'index'])->name('fornecedores.index');
Route::post('/fornecedores/cadastro/save', [FornecedoresController::class, 'save'])->name('fornecedores.save');

Route::get('/funcionarios/cadastro/{id?}', [FuncionariosController::class, 'cadastro'])->name('funcionarios.cadastro');
Route::get('/funcionarios/delete/{id?}', [FuncionariosController::class, 'delete'])->name('funcionarios.delete');
Route::get('/funcionarios/listagem', [FuncionariosController::class, 'index'])->name('funcionarios.index');
Route::post('/funcionarios/cadastro/save', [FuncionariosController::class, 'save'])->name('funcionarios.save');

Route::get('/vendas/carrinho', [VendasController::class, 'carrinhoForm'])->name('vendas.carrinho');
Route::get('/vendas/carrinho/listagem', [VendasController::class, 'carrinhoList'])->name('vendas.carrinho.list');
Route::get('/vendas/carrinho/delete/{id?}', [VendasController::class, 'carrinhoDelete'])->name('vendas.carrinho.delete');
Route::post('/vendas/carrinho/save', [VendasController::class, 'carrinhoSave'])->name('vendas.carrinho.save');

Route::get('/vendas/listagem', [VendasController::class, 'index'])->name('vendas.index');
Route::get('/vendas/veritens/{vendas_id?}', [VendasController::class, 'verItens'])->name('vendas.veritens');
Route::post('/vendas/save', [VendasController::class, 'save'])->name('vendas.save');

Route::get('/login', [FuncionariosController::class, 'login'])->name('login.login');
Route::get('/login/logout', [FuncionariosController::class, 'logout'])->name('login.logout');
Route::post('/login/autenticar', [FuncionariosController::class, 'autenticar'])->name('login.autenticar');

Route::get('/', function () {
    if (Auth::check()) return view('welcome', ['usuario' => Auth::user()]);
    return Redirect::route('login.login');
})->name('inicio');
