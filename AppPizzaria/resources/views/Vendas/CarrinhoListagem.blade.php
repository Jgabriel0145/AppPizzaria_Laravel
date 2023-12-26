@extends('layouts.Default')

@section('titulo', 'Listagem do Carrinho')

@section('titulo_pagina', 'Listagem do Carrinho')

@section('content')

    <table>
        <thead>
            <th>Excluir</th>
            <th>Produto</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Valor Total</th>
        </thead>

        <tbody>
            @if (count($itens) > 0)
                @foreach ($itens as $item)
                    <tr>
                        <td>
                            <a href="{{ route('vendas.carrinho.delete', ['id' => $item->id]) }}">
                                X
                            </a>
                        </td>

                        <td>
                            <a href="">
                                {{ $item->produtos->descricao }}
                            </a>
                        </td>

                        <td>
                            R$ {{ number_format($item->produtos->preco, 2, ',', '.') }}
                        </td>

                        <td>
                            {{ $item->quantidade }}
                        </td>

                        <td>
                            {{ $item->valor_total }}
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

    <br>

    Total: R$ {{ number_format($total_carrinho, 2, ',', '.') }}

    <br><br>

    <button onclick="window.location.href = '{{ route('vendas.carrinho') }}'">Adicionar Produto</button>

@endsection
