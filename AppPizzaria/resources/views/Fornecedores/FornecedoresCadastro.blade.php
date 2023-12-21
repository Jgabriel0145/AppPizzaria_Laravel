@extends('layouts.Default')

@section('titulo', 'Cadastro de Fornecedores') 

@section('titulo_pagina', 'Cadastro de Fornecedores')

@section('content')

    <form action="{{ route('fornecedores.save') }}" method="post">@csrf
        <input type="hidden" name="id" value="{{ $fornecedor ? $fornecedor->id : null }}">

        <input type="text" name="nome" placeholder="Nome" value="{{ $fornecedor ? $fornecedor->nome : null }}">
        <input type="text" name="cnpj" placeholder="CNPJ" value="{{ $fornecedor ? $fornecedor->cnpj : null }}">
        <input type="email" name="email" placeholder="Email" value="{{ $fornecedor ? $fornecedor->email : null }}">
        <input type="text" name="telefone" placeholder="Telefone" value="{{ $fornecedor ? $fornecedor->telefone : null }}">

        <button type="submit">Salvar</button>
    </form>

@endsection
