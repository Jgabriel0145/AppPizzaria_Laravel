@extends('layouts.Default')

@section('titulo', 'Cadastro de Produtos')

@section('titulo_pagina', 'Cadastro de Produtos')

@section('content')
    
    <form action="{{ route('produtos.save') }}" method="post">@csrf
        <input type="text" name="descricao" placeholder="descricao">
        <input type="text" name="preco" placeholder="preco">

        <button type="submit">Cadastrar</button>
    </form>    

@endsection
