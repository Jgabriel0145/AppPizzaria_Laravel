<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produtos::all();

        return view('Produtos/ProdutosListagem', [
            'produtos' => $produtos
        ]);
    }

    public function cadastro()
    {
        return view('Produtos/ProdutosCadastro');
    }

    public function save(Request $request)
    {
        $request = $request->validate([
            'descricao' => 'required|string',
            'preco' => 'required'
        ]);

        Produtos::create($request);

        return Redirect::route('produtos.index');
    }

    public function delete()
    {

    }
}
