<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinhos;
use App\Models\Produtos;
use Illuminate\Support\Facades\Redirect;

class VendasController extends Controller
{
    public function index()
    {

    }




    //Carrinho
    public function carrinhoForm()
    {
        $produtos = Produtos::all();

        return view('Vendas/CarrinhoCadastro', [
            'produtos' => $produtos
        ]);
    }

    public function carrinhoSave(Request $request)
    {
        $produto = Produtos::find($request['produtos_id']);

        $request = $request->validate([
            'produtos_id' => '',
            'quantidade' => 'integer'

        ]);

        $request['valor_un'] = $produto->preco;
        $request['valor_total'] = ($request['quantidade'] * $produto->preco);

        Carrinhos::create($request);

        return Redirect::route('vendas.carrinho');
    }

    public function carrinhoList()
    {
        $itens = Carrinhos::all();

        $total_carrinho = 0;
        foreach ($itens as $item) 
        {
            $total_carrinho += $item->valor_total;
        }

        return view('Vendas/CarrinhoListagem', [
            'itens' => $itens,
            'total_carrinho' => $total_carrinho
        ]);
    }

    public function carrinhoDelete(Request $request)
    {
        $item = Carrinhos::find($request['id']);
        $item->delete();

        return Redirect::route('vendas.carrinho.list');
    }
}
