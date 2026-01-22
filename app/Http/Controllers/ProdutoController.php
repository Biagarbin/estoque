<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
    $produtos = Produto::all();
    return response()->json($produtos);
    }
   
    public function store(Request $request){
      $produto = Produto::create([
        'marca' => $request->marca,
        'descricao' => $request->descricao,
        'valor_unitario' => $request->valor_unitario,
        'quantidade_estoque'=> $request->quantidade_estoque,
        'faixa_etaria_minima' =>$request->faixa_etaria_minima
      ]);
        
    return response()->json($produto);

      }

      

    public function update(Request $request, $id){
        $produto = Produto::find($id);
        if(!$produto) {
        return response()->json('produto não econtrado');
        }

        if(isset($request->marca)){
            $produto->marca = $request->marca;
        }

        if(isset($request->descricao)){
            $produto->descricao = $request->descricao;
        }

        if(isset($request->valor_unitario)){
            $produto->valor_unitario = $request->valor_unitario;
        }

        if(isset($request->quantidade_estoque)){
            $produto->quantidade_estoque = $request->quantidade_estoque;
        }

        if(isset($request->faixa_etaria_minima)){
            $produto->faixa_etaria_minima = $request->faixa_etaria_minima;
        }
        $produto->update();
        return response()->json($produto);
    }

     public function delete($id)
     {
        $produto = Produto::find($id);
        if(!$produto){
            return response ()->json(['mensagem não encontrada']);
        }
        $produto->delete();
        return response ()->json(['mensagem deletado com sucesso']);
    }
}