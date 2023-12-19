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

    public function cadastro()
    {
        return view('Clientes/ClientesCadastro');
    }

    public function save(Request $request)
    {
        $request = $request->validate([
            'nome' => 'required|string',
            'cpf' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'cep' => 'required'
        ]);

        Clientes::create($request);

        return Redirect::route('clientes.index');
    }
}
