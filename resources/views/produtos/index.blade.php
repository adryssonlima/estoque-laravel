@extends('layout')

@section('conteudo')

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
                    <td><a href="/produtos/mostra/{{ $p->id }}">Visualizar</a></td>
                </tr>
            @endforeach
        </table>
        <h4> <span class="label label-danger pull-right"> Um ou menos itens no estoque. </span> </h4>
    @endif
@stop