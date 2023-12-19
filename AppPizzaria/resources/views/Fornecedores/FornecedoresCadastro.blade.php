@extends('layouts.Default')

@section('titulo', 'Cadastro de Fornecedores') 

@section('titulo_pagina', 'Cadastro de Fornecedores')

@section('content')

    <form action="{{ route('fornecedores.save') }}" method="post">@csrf
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="cnpj" placeholder="CNPJ">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="telefone" placeholder="Telefone">

        <button type="submit">Cadastrar</button>
        
    </form>

@endsection
