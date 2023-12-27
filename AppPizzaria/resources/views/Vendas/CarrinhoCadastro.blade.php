@extends('layouts.Default')

@section('titulo', 'Carrinho')

@section('titulo_pagina', 'Carrinho')

@section('content')

    <form action="{{ route('vendas.carrinho.save') }}" method="post">@csrf
        <select name="produtos_id">
            <option value="0" selected>Selecione um produto</option>
            @if (count($produtos) > 0)
                @foreach ($produtos as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->descricao }}</option>
                @endforeach
            @else
                <option value="0">Cadastre um produto</option>
            @endif
        </select>

        <input type="text" name="quantidade" placeholder="Quantidade">

        <button type="submit">Salvar</button>
    </form>

    <br><br>

    <button onclick="window.location.href = '{{ route('vendas.carrinho.list') }}'">Ver Carrinho</button>

    <br><br>

    <button onclick="window.location.href = '{{ route('vendas.index') }}'">Listagem de Vendas</button>

@endsection
