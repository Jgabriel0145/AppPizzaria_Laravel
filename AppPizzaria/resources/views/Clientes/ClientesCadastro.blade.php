@extends('layouts.Default')

@section('titulo', 'Cadastro de Clientes')

@section('titulo_pagina', 'Cadastro de Clientes')

@section('content')

    <form action="{{ route('clientes.save') }}" method="post">@csrf
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="cpf" placeholder="CPF">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="telefone" placeholder="Telefone">
        <input type="text" name="cep" placeholder="CEP">

        <button type="submit">Cadastrar</button>
    </form>

@endsection
