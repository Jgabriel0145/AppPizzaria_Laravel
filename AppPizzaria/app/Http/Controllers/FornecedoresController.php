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

    public function cadastro(Request $request)
    {
        $fornecedor = Fornecedores::find($request->id);

        return view('Fornecedores/FornecedoresCadastro',[
            'fornecedor' => $fornecedor
        ]);
    }

    public function save(Request $request)
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

    public function delete(Request $request)
    {
        $fornecedor = Fornecedores::find($request['id']);
        $fornecedor->delete();

        return Redirect::route('fornecedores.index');
    }
}
