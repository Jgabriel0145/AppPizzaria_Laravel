@extends('layouts.Default')

@section('titulo', 'Listagem de Produtos')



@section('content')
    
    <table>
        <thead>
            <th>Id</th>
            <th>Descrição</th>
            <th>Preço</th>
        </thead>

        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>
                        {{ $produto->id }}
                    </td>

                    <td>
                        {{ $produto->descricao }}
                    </td>

                    <td>
                        R$ {{ number_format($produto->preco, 2, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
