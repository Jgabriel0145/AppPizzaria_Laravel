@extends('layouts.Default')

@section('titulo', 'Itens da Venda')

@section('titulo_pagina', 'Itens da Venda')

@section('content')

    <table>
        <thead>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Total</th>
        </thead>

        <tbody>
            @if (count($itens) > 0)
                @foreach ($itens as $item)
                    <tr>
                        <td>
                            {{ $item->produtos->descricao }}  
                        </td>

                        <td>
                            {{ $item->quantidade }}
                        </td>

                        <td>
                            R$ {{ number_format($item->produtos->preco, 2, ',', '.') }}
                        </td>

                        <td>
                            {{ $item->total_venda }}
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

    <button onclick="window.location.href = '{{ route('vendas.index') }}'">Voltar</button>

@endsection
