<?php

namespace App\Http\Controllers;

use App\Models\Funcionarios;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FuncionariosController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            if (Auth::user()->administrador == 1)
            {
                $funcionarios = Funcionarios::all();

                return view('Funcionarios/FuncionariosListagem', [
                    'funcionarios' => $funcionarios
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
            if (Auth::user()->administrador == 1)
            {
                $funcionario = Funcionarios::find($request->id);

                return view('Funcionarios/FuncionariosCadastro',[
                    'funcionario' => $funcionario
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
            if (Auth::user()->administrador == 1)
            {
                if ($request['administrador'] == null) $request['administrador'] = 0;
                else $request['administrador'] = 1;

                $request = $request->validate([
                    'id' => '',
                    'nome' => 'required|string',
                    'cpf' => 'required',
                    'email' => 'required',
                    'telefone' => 'required',
                    'senha' => 'required',
                    'administrador' => ''
                ]);

                $dados_usuario = [
                    'id' => $request['id'], 
                    'name' => $request['nome'], 
                    'email' => $request['email'], 
                    'password' => $request['senha'],
                    'administrador' => $request['administrador']
                ];

                $request['senha'] = bcrypt($request['senha']);

                if ($request['id'] !== null)
                {
                    $funcionario = Funcionarios::find($request['id']);
                    if ($funcionario->administrador == 1)
                    {
                        $administradores = Funcionarios::where('administrador', 1)->get();
                        if (count($administradores) == 1)
                            return Redirect::route('funcionarios.cadastro', ['id' => $request['id']]);
                    }

                    $funcionario->update($request);
                    User::find($request['id'])->update($dados_usuario);
                }
                else 
                {
                    Funcionarios::create($request);
                    User::create($dados_usuario);
                }

                return Redirect::route('funcionarios.index');                
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
                $administradores = User::where('administrador', 1)->get();

                $funcionario = Funcionarios::find($request['id']);
                if ($funcionario->administrador == 1)
                {
                    if (count($administradores) == 1)
                        return Redirect::route('funcionarios.index');
                }
                
                $funcionario->delete();

                $user = User::find($request['id']);
                $user->delete();
        
                return Redirect::route('funcionarios.index');                
            }

            return Redirect::route('inicio');
        }

        return Redirect::route('login.login');
    }


    //Login
    public function login()
    {
        $usuarios = User::all();
        
        if (count($usuarios) < 1)
        {
            $entrar_primeira_vez_user = [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => 'admin',
                'administrador' => '1'
            ];

            $entrar_primeira_vez_func = [
                'nome' => 'admin',
                'cpf' => '00000000000',
                'email' => 'admin@gmail.com',
                'telefone' => '00000000000',
                'senha' => bcrypt('admin'),
                'administrador' => 1
            ];

            User::create($entrar_primeira_vez_user);
            Funcionarios::create($entrar_primeira_vez_func);
        }

        return view('Login/Login');
    }

    public function autenticar(Request $request)
    {
        $dados = $request->only('email', 'senha');

        $autenticar = [
            'email' => $dados['email'],
            'password' => $dados['senha']
        ];

        if (Auth::attempt($autenticar))
        {
            return Redirect::route('inicio');
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    public function logout()
    {
        if (Auth::check()) Auth::logout();

        return Redirect::route('login.login');
    }
}
