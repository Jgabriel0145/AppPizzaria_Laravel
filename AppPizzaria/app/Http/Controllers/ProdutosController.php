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

    public function cadastro(Request $request)
    {   
        $produto = Produtos::find($request->id);
        $fornecedores = Fornecedores::all();

        return view('Produtos/ProdutosCadastro', [
            'produto' => $produto,
            'fornecedores' => $fornecedores
        ]);
    }

    public function save(Request $request)
    {
        $request = $request->validate([
            'id' => '',
            'descricao' => 'required|string',
            'preco' => 'required',
            'fornecedores_id' => 'required|numeric|min:1|not_in:0'
        ]);

        if ($request['id'] !== null)
        {
            Produtos::find($request['id'])->update($request);
        }
        else 
        {
            Produtos::create($request);
        }

        return Redirect::route('produtos.index');
    }

    public function delete(Request $request)
    {
        $produto = Produtos::find($request['id']);
        $produto->delete();

        return Redirect::route('produtos.index');
    }
}
