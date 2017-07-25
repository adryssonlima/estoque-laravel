@extends('layout')

@section('conteudo')

    <h1>Novo produto</h1>
    <form action="{{action('ProdutoController@adiciona')}}" method="post">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <div class="form-group">
            <label>Nome</label>
            <input name="nome" class="form-control">
        </div>
        <div class="form-group">
            <label>Descricao</label>
            <input name="descricao" class="form-control">
        </div>
        <div class="form-group">
            <label>Valor</label>
            <input name="valor" class="form-control">
        </div>
        <div class="form-group">
            <label>Quantidade</label>
            <input name="quantidade" type="number" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
    </form>

@stop