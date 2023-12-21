@extends('layouts.Default')

@section('titulo', 'Início')

@section('titulo_pagina', 'Início')

@section('content')

    <span style="font-weight: bold">Dados do usuário:</span><br>
    Id: {{ $usuario->id }}<br>
    Nome: {{ $usuario->name }}<br>
    Email: {{ $usuario->email }}<br>
    

@endsection
