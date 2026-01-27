<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradaController
{
    public function index()
    {
    $entrada = Entrada::all();
    return response()->json($entrada);
    }

    public function store(Request $request )
    {
     $entrada = Entrada::create([
        'id_produto'=> $request->id_produto,
        'quantidade'=> $request->quantidade
     ]);
     return response()->json($entrada);

    }

    public function delete($id_produto)
    {
        $entrada = Entrada::all($id_produto);
        if(!$entrada){
            return response ()->json(['novos produtos no estoque']);
        }
        $entrada->delete();
        return response ()->json(['não encontrado no estoque']);

    }
}
