<?php

namespace App\Http\Controllers;

use App\Models\Fornecedores;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProdutosController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            if (Auth::user()->administrador == 1)
            {
                $produtos = Produtos::all();

                return view('Produtos/ProdutosListagem', [
                    'produtos' => $produtos,
                ]);                
            }

            return Redirect::route('inicio');
        }

        return Redirect::route('login.login');
    }

    public function cadastro(Request $request)
    {   
        if (Auth::check())
        {
            if (Auth::user()->administrador)
            {
                $produto = Produtos::find($request->id);
                $fornecedores = Fornecedores::all();
        
                return view('Produtos/ProdutosCadastro', [
                    'produto' => $produto,
                    'fornecedores' => $fornecedores
                ]);                
            }

            return Redirect::route('inicio');
        }

        return Redirect::route('login.login');
    }

    public function save(Request $request)
    {
        if (Auth::check())
        {
            if (Auth::user()->administrador)
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
            
            return Redirect::route('inicio');
        }

        return Redirect::route('login.login');
    }

    public function delete(Request $request)
    {
        if (Auth::check())
        {
            if (Auth::user()->administrador == 1)
            {
                $produto = Produtos::find($request['id']);
                $produto->delete();
        
                return Redirect::route('produtos.index');                
            }

            return Redirect::route('inicio');
        }

        return Redirect::route('login.login');
    }
}
