<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinhos;
use App\Models\Produtos;
use App\Models\Clientes;
use App\Models\Funcionarios;
use App\Models\Vendas;
use App\Models\VendaProdutos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class VendasController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            $vendas = Vendas::all();

            return view('Vendas/VendasListagem', [
                'vendas' => $vendas
            ]);
        }

        return Redirect::route('login.login');
    }

    public function save(Request $request)
    {
        if (Auth::check())
        {
            $request = $request->validate([
                'valor_total_venda' => '',
                'clientes_id' => '',
                'funcionarios_id' => ''
            ]);
            
            $venda = Vendas::create($request);
    
            $itens = Carrinhos::all();
    
            foreach ($itens as $item)
            {
                $adicionar = [
                    'quantidade' => $item->quantidade,
                    'total_venda' => $item->valor_total,
                    'vendas_id' => $venda->id,
                    'produtos_id' => $item->produtos->id
                ];
    
                VendaProdutos::create($adicionar);
            }
    
            Carrinhos::truncate();
    
            return Redirect::route('vendas.index');
        }

        return Redirect::route('login.login');
    }

    public function verItens(Request $request)
    {   
        if (Auth::check())
        {
            $request = $request->validate([
                'id' => ''
            ]);
    
            $itens = VendaProdutos::where('vendas_id', $request['id'])->get();
    
            return view('Vendas/VendasVerItens', [
                'itens' => $itens
            ]);
        }

        return Redirect::route('login.login');
    }



    //Carrinho
    public function carrinhoForm()
    {
        if (Auth::check())
        {
            $produtos = Produtos::all();

            return view('Vendas/CarrinhoCadastro', [
                'produtos' => $produtos
            ]);            
        }

        return Redirect::route('login.login');
    }

    public function carrinhoSave(Request $request)
    {
        if (Auth::check())
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

        return Redirect::route('login.login');
    }

    public function carrinhoList()
    {
        if (Auth::check())
        {
            $itens = Carrinhos::all();
            $clientes = Clientes::all();
            $funcionarios = Funcionarios::all();

            $total_carrinho = 0;
            foreach ($itens as $item) 
            {
                $total_carrinho += $item->valor_total;
            }

            return view('Vendas/CarrinhoListagem', [
                'itens' => $itens,
                'total_carrinho' => $total_carrinho,
                'clientes' => $clientes,
                'funcionarios' => $funcionarios
            ]);
        }

        return Redirect::route('login.login');
    }

    public function carrinhoDelete(Request $request)
    {
        if (Auth::check())
        {
            $item = Carrinhos::find($request['id']);
            $item->delete();
    
            return Redirect::route('vendas.carrinho.list');
        }

        return Redirect::route('login.login');
    }
}
