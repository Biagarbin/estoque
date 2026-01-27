<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ClienteController extends Controller
{
    public function index()
    {
    $clientes = Cliente::all();
    return response()->json($clientes);
    }
   
    public function store(Request $request)
    {
       $verificar = Cliente::where('cpf', '=', $request->cpf )->first ();
       if($verificar == null)
        {
        $cliente = Cliente::create([
            'id'=> $request->id,
            'nome'=> $request->nome,
            'idade'=> $request->idade,
            'cpf'=> $request->cpf
        ]);
        return response()->json($cliente);

       }else{
        return response()->json('Este Cpf já foi utilizado');
       }
    }

    public function update(Request $request, $id){
        $cliente = Cliente::all($id);
        if(!$cliente){
            return response()->json('cliente não encontrado');
        }
        if(isset($cliente->$request->nome)){
            
        }

        $cliente->update();
        return response()->json($cliente);
    }

      public function delete($id){
        $cliente = Cliente::all($id);
        if(!$cliente){
            return response ()->json(['mensagem não encontrada']);
        }
        $cliente ->delete();
        return response ()->json(['mensagem deletado com sucesso']);
    }


}
