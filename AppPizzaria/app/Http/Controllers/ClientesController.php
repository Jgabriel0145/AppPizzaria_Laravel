<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ClientesController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            $clientes = Clientes::all();

            return view('Clientes/ClientesListagem', [
                'clientes' => $clientes
            ]);
        }

        return Redirect::route('login.login');
    }

    public function cadastro(Request $request)
    {
        if (Auth::check())
        {
            $cliente = Clientes::find($request->id);

            return view('Clientes/ClientesCadastro', [
                'cliente' => $cliente
            ]);
        }

        return Redirect::route('login.login');
    }

    public function save(Request $request)
    {
        if (Auth::check())
        {
            $request = $request->validate([
                'id'=> '',
                'nome' => 'required|string',
                'cpf' => 'required',
                'email' => 'required',
                'telefone' => 'required',
                'cep' => 'required'
            ]);
    
            if ($request['id'] !== null)
            {
                Clientes::find($request['id'])->update($request);
            }
            else
            {
                Clientes::create($request);
            }
    
            return Redirect::route('clientes.index');
        }

        return Redirect::route('login.login');
    }

    public function delete(Request $request)
    {
        if (Auth::check())
        {
            $cliente = Clientes::find($request['id']);
            $cliente->delete();

            return Redirect::route('clientes.index');
        }

        return Redirect::route('login.login');
    }
}
