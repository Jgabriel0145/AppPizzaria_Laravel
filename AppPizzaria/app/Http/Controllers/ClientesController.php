<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Clientes::all();

        return view('Clientes/ClientesListagem', [
            'clientes' => $clientes
        ]);
    }

    public function cadastro(Request $request)
    {
        $cliente = Clientes::find($request->id);

        return view('Clientes/ClientesCadastro', [
            'cliente' => $cliente
        ]);
    }

    public function save(Request $request)
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

    public function delete(Request $request)
    {
        $cliente = Clientes::find($request['id']);
        $cliente->delete();

        return Redirect::route('clientes.index');
    }
}
