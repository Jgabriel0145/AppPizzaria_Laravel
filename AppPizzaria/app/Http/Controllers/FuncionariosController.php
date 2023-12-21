<?php

namespace App\Http\Controllers;

use App\Models\Funcionarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FuncionariosController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionarios::all();

        return view('Funcionarios/FuncionariosListagem', [
            'funcionarios' => $funcionarios
        ]);
    }

    public function cadastro(Request $request)
    {
        $funcionario = Funcionarios::find($request->id);

        return view('Funcionarios/FuncionariosCadastro',[
            'funcionario' => $funcionario
        ]);
    }

    public function save(Request $request)
    {
        if ($request['administrador'] == null) $request['administrador'] = 0;
        else $request['administrador'] = 1;

        $request = $request->validate([
            'id' => '',
            'nome' => 'required|string',
            'cpf' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'senha' => 'required|min:4',
            'administrador' => ''
        ]);

        $request['senha'] = bcrypt($request['senha']);

        if ($request['id'] !== null)
        {
            Funcionarios::find($request['id'])->update($request);
        }
        else 
        {
            Funcionarios::create($request);
        }

        return Redirect::route('funcionarios.index');
    }

    public function delete(Request $request)
    {
        $fornecedor = Funcionarios::find($request['id']);
        $fornecedor->delete();

        return Redirect::route('funcionarios.index');
    }


}
