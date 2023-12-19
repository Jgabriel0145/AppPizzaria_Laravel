@extends('layouts.Default')

@section('titulo', 'Listagem de Fornecedores')

@section('titulo_pagina', 'Listagem de Fornecedores')

@section('content')

    <table>
        <thead>
            <th>Id</th>
            <th>Nome</th>
            <th>CNPJ</th>
            <th>Email</th>
            <th>Telefone</th>
        </thead>

        <tbody>
            @if (count($fornecedores) > 0)
                @foreach ($fornecedores as $fornecedor)
                    <tr>
                        <td>
                            {{ $fornecedor->id }}
                        </td>

                        <td>
                            {{ $fornecedor->nome }}
                        </td>
                        
                        <td>
                            {{ $fornecedor->cnpj }}
                        </td>

                        <td>
                            {{ $fornecedor->email }}
                        </td>
                        
                        <td>
                            {{ $fornecedor->telefone }}
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

    <button onclick="window.location.href = '{{ route('fornecedores.cadastro') }}'">Cadastrar Novo Fornecedor</button>

@endsection
