@extends('layouts.Default')

@section('titulo', 'Listagem de Vendas')

@section('titulo_pagina', 'Listagem de Vendas')

@section('content')

    <table>
        <thead>
            <th>Excluir</th>
            <th>Id</th>
            <th>Valor Total</th>
            <th>Cliente</th>
            <th>Funcionario</th>
            <th>Data e Hora</th>
            <th></th>
        </thead>

        <tbody>
            @if (count($vendas) > 0)
                @foreach ($vendas as $venda)
                    <tr>
                        <td>
                            <a href="{{ route('vendas.delete', ['id' => $venda->id ]) }}">
                                X
                            </a>
                        </td>

                        <td>
                            {{ $venda->id }}
                        </td>

                        <td>
                            <a>
                                R$ {{ number_format($venda->valor_total_venda, 2, ',', '.') }}
                            </a>
                        </td>

                        <td>
                            {{ $venda->clientes->nome }}
                        </td>

                        <td>
                            {{ $venda->funcionarios->nome }}
                        </td>

                        <td>
                            {{ $venda->updated_at }}
                        </td>

                        <td>
                            <a href="{{ route('vendas.veritens', ['id' => $venda->id]) }}">Ver Itens</a>
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

    <button onclick="window.location.href = '{{ route('vendas.carrinho') }}'">Cadastrar Nova Venda</button>

@endsection
