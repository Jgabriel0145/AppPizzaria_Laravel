@extends('layouts.Default')

@section('titulo', 'Listagem de Funcionários')

@section('titulo_pagina', 'Listagem de Funcionários')

@section('content')

    <table>
        <thead>
            <th>Excluir</th>
            <th>Id</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Administrador</th>
        </thead>

        <tbody>
            @if (count($funcionarios) > 0)
                @foreach ($funcionarios as $funcionario)
                    <tr>
                        <td>
                            <a href="{{ route('funcionarios.delete', ['id' => $funcionario->id]) }}">X</a>
                        </td>

                        <td>
                            {{ $funcionario->id }}
                        </td>

                        <td>
                            <a href="{{ route('funcionarios.cadastro', ['id' => $funcionario->id]) }}">
                                {{ $funcionario->nome }}
                            </a>
                        </td>
                        
                        <td>
                            {{ $funcionario->cnpj }}
                        </td>

                        <td>
                            {{ $funcionario->email }}
                        </td>
                        
                        <td>
                            {{ $funcionario->telefone }}
                        </td>

                        <td>
                            @if ($funcionario->administrador == 1)
                                Sim
                            @else
                                Não                                
                            @endif
                            
                        </td>
                    </tr>
                @endforeach
            
            @else
                <tr>
                    <td colspan="6">
                        Nenhum registro encontrado
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

    <br><br>

    <button onclick="window.location.href = '{{ route('funcionarios.cadastro') }}'">Cadastrar Novo Funcionario</button>


@endsection
