<?php

namespace App\Http\Controllers;

use App\Models\Fornecedores;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produtos::all();

        return view('Produtos/ProdutosListagem', [
            'produtos' => $produtos,
        ]);
    }

    public function cadastro()
    {   
        $fornecedores = Fornecedores::all();

        return view('Produtos/ProdutosCadastro', [
            'fornecedores' => $fornecedores
        ]);
    }

    public function save(Request $request)
    {
        $request = $request->validate([
            'descricao' => 'required|string',
            'preco' => 'required',
            'fornecedores_id' => 'required|numeric|min:1|not_in:0'
        ]);

        Produtos::create($request);

        return Redirect::route('produtos.index');
    }

    public function delete()
    {

    }
}
