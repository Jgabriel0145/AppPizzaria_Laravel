@extends('layouts.Default')

@section('titulo', 'Cadastro de Produtos')

@section('titulo_pagina', 'Cadastro de Produtos')

@section('content')
    
    <form action="{{ route('produtos.save') }}" method="post">@csrf
        <input type="hidden" name="id" value="{{ $produto ? $produto->id : null}}">

        <input type="text" name="descricao" placeholder="descricao" value="{{ $produto ? $produto->descricao : '' }}">
        <input type="text" name="preco" placeholder="preco" value="{{ $produto ? $produto->preco : '' }}">
        <select name="fornecedores_id">
            <option value="0" selected>Selecione um fornecedor</option>
            @if (count($fornecedores) > 0)
                @foreach ($fornecedores as $fornecedor)
                    <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                @endforeach
            @else
                <option value="0">Cadastre um fornecedor</option>
            @endif
        </select>

        <button type="submit">Cadastrar</button>
    </form>    

@endsection
