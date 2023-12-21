@extends('layouts.Default')

@section('titulo', 'Cadastro de Clientes')

@section('titulo_pagina', 'Cadastro de Clientes')

@section('content')

    <form action="{{ route('clientes.save') }}" method="post">@csrf
        <input type="hidden" name="id" value="{{ $cliente ? $cliente->id : null }}">

        <input type="text" name="nome" placeholder="Nome" value="{{ $cliente ? $cliente->nome : '' }}">
        <input type="text" name="cpf" placeholder="CPF" value="{{ $cliente ? $cliente->cpf : '' }}"
            maxlength="11" minlength="11">
        <input type="email" name="email" placeholder="Email" value="{{ $cliente ? $cliente->email : '' }}">
        <input type="text" name="telefone" placeholder="Telefone" value="{{ $cliente ? $cliente->telefone : '' }}"
            maxlength="11" min="11">
        <input type="text" name="cep" placeholder="CEP" value="{{ $cliente ? $cliente->cep : '' }}"
            maxlength="8" minlength="8">

        <button type="submit">Salvar</button>
    </form>

@endsection
