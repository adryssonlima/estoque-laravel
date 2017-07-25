<?php

namespace estoque\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use estoque\Produto;
use estoque\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller {

    public function lista() {

        // $produtos = DB::select('select * from produtos');
        $produtos = Produto::all();
        
        return view('produtos.index', [
            'produtos' => $produtos,
        ]);
    }

    public function listaJson(){
        // $produtos = DB::select('select * from produtos');
        $produtos = Produto::all();        
        return response()->json($produtos);
    }

    public function mostra($id) {

        //$id = Request::route('id');
        //$produto = DB::select('select * from produtos where id = ?',[$id]);
        $produto = Produto::find($id);

        if(empty($produto)) {
            return "Esse produto não existe";
        }

        return view('produtos.detalhes')->with('produto', $produto);

    }

    public function novo() {
        return view('produtos.formulario');
    }

    public function adiciona(ProdutosRequest $request) {
      
        Produto::create($request->all());

        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));

    }

    public function remove($id){
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()
            ->action('ProdutoController@lista');
    }

    public function alterar($id) {
        $produto = Produto::find($id);

        if(empty($produto)) {
            return "Esse produto não existe";
        }

        return view('produtos.alterar')->with('produto', $produto);
    }

    public function update() {
        $data = Request::all();
        $produto = Produto::find($data['id']);
        
        $produto->nome = $data['nome'];
        $produto->descricao = $data['descricao'];
        $produto->valor = $data['valor'];
        $produto->quantidade = $data['quantidade'];

        $produto->save();

        return redirect()
            ->action('ProdutoController@lista');
    }

}