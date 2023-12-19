@extends('layouts.Default')

@section('titulo', 'Listagem de Clientes')

@section('titulo_pagina', 'Listagem de Clientes')

@section('content')

    <table>
        <thead>
            <th>Id</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>CEP</th>
        </thead>

        <tbody>
            @if (count($clientes) > 0)
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>
                            {{ $cliente->id }}
                        </td>

                        <td>
                            <a href="{{ route('clientes.cadastro', ['id' => $cliente->id]) }}">
                                {{ $cliente->nome }}
                            </a>
                        </td>
                        
                        <td>
                            {{ $cliente->cpf }}
                        </td>

                        <td>
                            {{ $cliente->email }}
                        </td>
                        
                        <td>
                            {{ $cliente->telefone }}
                        </td>

                        <td>
                            {{ $cliente->cep }}
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

    <button onclick="window.location.href = '{{ route('clientes.cadastro') }}'">Cadastrar Novo Cliente</button>

@endsection
