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

    <form action="{{ route('vendas.save') }}" method="post">@csrf
        <select name="clientes_id">
            <option value="0" selected>Selecione um cliente</option>
            @if (count($clientes) > 0)
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            @else
                <option value="0">Cadastre um cliente</option>
            @endif
        </select>

        <select name="funcionarios_id">
            <option value="0" selected>Selecione um funcionario</option>
            @if (count($funcionarios) > 0)
                @foreach ($funcionarios as $funcionario)
                    <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
                @endforeach
            @else
                <option value="0">Cadastre um funcionario</option>
            @endif
        </select>

        <input type="hidden" name="valor_total_venda" value="{{ $total_carrinho }}">

        <button type="submit">Salvar</button>
    </form>

    <br><br>

    <button onclick="window.location.href = '{{ route('vendas.carrinho') }}'">Adicionar Produto</button>

    <br><br>

    <button onclick="window.location.href = '{{ route('vendas.index') }}'">Listagem de Vendas</button>

@endsection
