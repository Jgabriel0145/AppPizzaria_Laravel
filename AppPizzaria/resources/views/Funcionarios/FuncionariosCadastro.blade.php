@extends('layouts.Default')

@section('titulo', 'Cadastro de Funcionários')

@section('titulo_pagina', 'Cadastro de Funcionários')

@section('content')
    <form action="{{ route('funcionarios.save') }}" method="post">@csrf
        <input type="hidden" name="id" value="{{ $funcionario ? $funcionario->id : '' }}">

        <input type="text" name="nome" value="{{ $funcionario ? $funcionario->nome : '' }}" placeholder="Nome">
        <input type="text" name="cpf" value="{{ $funcionario ? $funcionario->cpf : '' }}" placeholder="CPF"
            minlength="11" maxlength="11">
        <input type="email" name="email" value="{{ $funcionario ? $funcionario->email : '' }}" placeholder="Email">
        <input type="text" name="telefone" value="{{ $funcionario ? $funcionario->telefone : '' }}" placeholder="Telefone"
            minlength="11" maxlength="11">
        <input type="password" name="senha" placeholder="Senha">

        <label for="administrador">Administrador</label>
        <input type="checkbox" name="administrador" value="1">

        <button type="submit">Salvar</button>
    </form>
@endsection
