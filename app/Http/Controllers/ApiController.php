<?php

namespace App\Http\Controllers;

use App\Clientes;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function cadastraCliente(Request $request) {
        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );
        $cliente = new Clientes();
        $cliente->nome      = $request->nome;
        $cliente->telefone  = $request->telefone;
        $cliente->cpf       = $request->cpf;
        $cliente->placa     = $request->placa;
        $cliente->save();
    
        return response()->json([
            "mensagem" => "Cliente cadastrado com sucesso!"
        ], 201, $header, JSON_UNESCAPED_UNICODE);
    }
    
    public function atualizaCliente(Request $request, $id) {
        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );
        if (Clientes::where('id', $id)->exists()) {
            $cliente = Clientes::find($id);
            $cliente->nome      = is_null($request->nome)       ? $cliente->nome        : $request->nome;
            $cliente->telefone  = is_null($request->telefone)   ? $cliente->telefone    : $request->telefone;
            $cliente->cpf       = is_null($request->cpf)        ? $cliente->cpf         : $request->cpf;
            $cliente->placa     = is_null($request->placa)      ? $cliente->placa       : $request->placa;
            $cliente->save();
    
            return response()->json([
                "mensagem" => "Cliente atualizado com sucesso"
            ], 200, $header, JSON_UNESCAPED_UNICODE);
            } else {
            return response()->json([
                "mensagem" => "Cliente não encontrado"
            ], 404, $header, JSON_UNESCAPED_UNICODE);
        }
    }

    public function deleteCliente($id) {
        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );
        if(Clientes::where('id', $id)->exists()) {
          $cliente = Clientes::find($id);
          $cliente->delete();
  
          return response()->json([
            "mensagem" => "Registro apagado"
          ], 202, $header, JSON_UNESCAPED_UNICODE);
        } else {
          return response()->json([
            "mensagem" => "Cliente não encontrado"
          ], 404, $header, JSON_UNESCAPED_UNICODE);
        }
      }

    public function consultaCliente($id) {
        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );
        if (Clientes::where('id', $id)->exists()) {
            $cliente = Clientes::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($cliente, 200, $header, JSON_UNESCAPED_UNICODE);
        } else {
            return response()->json([
                "mensagem" => "Cliente não encontrado"
            ], 404, $header, JSON_UNESCAPED_UNICODE);
        }
    }

    public function consultaTodosClientes() {
        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );
        $cliente = Clientes::all();
        return response()->json($cliente, 404, $header, JSON_UNESCAPED_UNICODE);
    }

    public function consultaPlacaCliente($placa) {
        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );
        if(Clientes::where('placa', 'like', '%'.$placa)->exists()){
            $cliente = Clientes::where('placa', 'like', '%'.$placa)->get()->toJson(JSON_PRETTY_PRINT);
            return response($cliente, 200, $header, JSON_UNESCAPED_UNICODE);
        } else {
            return response()->json([
                "mensagem" => "Placa não encontrada"
            ], 404, $header, JSON_UNESCAPED_UNICODE);
        }
    }

}

