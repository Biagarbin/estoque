<?php

namespace App\Http\Controllers;

use App\Models\Saida;
use Illuminate\Http\Request;

class SaidaController
{
    public function index()
    {
        $saida = Saida::all();
        return response()->json($saida);
    }

    public function store(Request $request)
    {
    $saida = Saida::create([
        'id_produto'=>$request->id_produto,
        'id_cliente'=>$request->id_cliente,
        'quantidade'=>$request->quantidade
    ]);
    return response()->json($saida);
    }
}
