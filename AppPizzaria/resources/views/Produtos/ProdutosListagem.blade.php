@extends('layouts.Default')

@section('titulo', 'Listagem de Produtos')

@section('titulo_pagina', 'Listagem de Produtos')

@section('content')
    
    <table>
        <thead>
            <th>Id</th>
            <th>Descrição</th>
            <th>Preço</th>
        </thead>

        <tbody>
            @if (count($produtos) > 0)
                @foreach ($produtos as $produto)
                    <tr>
                        <td>
                            {{ $produto->id }}
                        </td>

                        <td>
                            {{ $produto->descricao }}
                        </td>

                        <td>
                            R$ {{ number_format($produto->preco, 2, ',', '.') }}
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
