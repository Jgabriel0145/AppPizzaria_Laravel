@extends('layouts.Default')

@section('titulo', 'Listagem de Produtos')

@section('titulo_pagina', 'Listagem de Produtos')

@section('content')
    
    <table>
        <thead>
            <th>Excluir</th>
            <th>Id</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Fornecedor</th>
        </thead>

        <tbody>
            @if (count($produtos) > 0)
                @foreach ($produtos as $produto)
                    <tr>
                        <td>
                            <a href="{{ route('produtos.delete', ['id' => $produto->id]) }}">
                                X
                            </a>
                        </td>

                        <td>
                            {{ $produto->id }}
                        </td>

                        <td>
                            <a href="{{ route('produtos.cadastro', ['id' => $produto->id]) }}">
                                {{ $produto->descricao }}
                            </a>
                        </td>

                        <td>
                            R$ {{ number_format($produto->preco, 2, ',', '.') }}
                        </td>

                        <td>
                            {{ $produto->fornecedores->nome }}
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

    <button onclick="window.location.href = '{{ route('produtos.cadastro') }}'">Cadastrar Novo Produto</button>

@endsection
