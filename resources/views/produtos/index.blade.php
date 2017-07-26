@extends('layouts.app')

@section('content')

    @if(empty($produtos))
        <div class="alert alert-danger">
            Você não tem nenhum produto cadastrado.
        </div>
    @else
        <h1>Listagem de produtos</h1>
        <table class="table table-striped table-hover">
            <tr>
                <th>Nome</th>
                <th>Preço</th> 
                <th>Descrição</th>
                <th>Quantidade</th>
            </tr>
            @foreach ($produtos as $p)
                <tr class="{{ $p->quantidade <= 1 ? 'danger' : '' }}">
                    <td> {{ $p->nome }} </td>
                    <td> {{ $p->valor }} </td>
                    <td> {{ $p->descricao }} </td>
                    <td> {{ $p->quantidade }} </td>
                    <td><a href="{{action('ProdutoController@mostra', $p->id)}}">Visualizar</a></td>
                    <td><a href="{{action('ProdutoController@alterar', $p->id)}}">Alterar</a></td>
                    <td><a href="{{action('ProdutoController@remove', $p->id)}}">Remover</a></td>
                </tr>
            @endforeach
        </table>
        <h4> <span class="label label-danger pull-right"> Um ou menos itens no estoque. </span> </h4>
    @endif

    @if(old('nome'))
        <div class="alert alert-success">
            <strong>Sucesso!</strong>
            O produto {{ old('nome') }} foi adicionado!
        </div>
    @endif
@stop