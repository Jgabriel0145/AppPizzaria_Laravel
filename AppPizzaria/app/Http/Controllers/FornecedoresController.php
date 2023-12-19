<?php

namespace App\Http\Controllers;

use App\Models\Fornecedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FornecedoresController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedores::all();

        return view('Fornecedores/FornecedoresListagem', [
            'fornecedores' => $fornecedores
        ]);
    }

    public function cadastro()
    {
        return view('Fornecedores/FornecedoresCadastro');
    }

    public function save(Request $request)
    {
        $request = $request->validate([
            'nome' => 'required|string',
            'cnpj' => 'required',
            'email' => 'required',
            'telefone' => 'required',
        ]);

        Fornecedores::create($request);

        return Redirect::route('fornecedores.index');
    }
}
