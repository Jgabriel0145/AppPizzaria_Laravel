<?php

namespace App\Http\Controllers;

use App\Models\Fornecedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FornecedoresController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            $fornecedores = Fornecedores::all();

            return view('Fornecedores/FornecedoresListagem', [
                'fornecedores' => $fornecedores
            ]);
        }

        return Redirect::route('login.login');
    }

    public function cadastro(Request $request)
    {
        if (Auth::check())
        {
            $fornecedor = Fornecedores::find($request->id);

            return view('Fornecedores/FornecedoresCadastro',[
                'fornecedor' => $fornecedor
            ]);
        }

        return Redirect::route('login.login');
    }

    public function save(Request $request)
    {
        if (Auth::check())
        {
            $request = $request->validate([
                'id' => '',
                'nome' => 'required|string',
                'cnpj' => 'required',
                'email' => 'required',
                'telefone' => 'required',
            ]);
    
            if ($request['id'] !== null)
            {
                Fornecedores::find($request['id'])->update($request);
            }
            else 
            {
                Fornecedores::create($request);
            }
    
            return Redirect::route('fornecedores.index');
        }

        return Redirect::route('login.login');
    }

    public function delete(Request $request)
    {
        if (Auth::check())
        {
            $fornecedor = Fornecedores::find($request['id']);
            $fornecedor->delete();
    
            return Redirect::route('fornecedores.index');
        }

        return Redirect::route('login.login');
    }
}
