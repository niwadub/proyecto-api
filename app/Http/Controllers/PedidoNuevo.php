<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoNuevo extends Controller
{
    public function __construct()
    {
    }

    public function guardar(Request $request)
    {
        $input = $request->all();

        $result = DB::table('pedido')->insert([
            'IDUsuario' => $input['idu'],
            'IDcomida' => $input['idc'],
            'IDbebida' => $input['idb'],
            'IDpostre' => $input['idp'],
            'Estatus' => "Enviado",
            'Total' => $input['tt']
        ]);

        if($result){
            $respuesta = array(
                "datos"=> false,
                "error" => false,
                "msg" => "El pedido fue agregado"
            );
        }else{
            $respuesta = array(
                "datos"=> false,
                "error" => true,
                "msg" => "El pedido no se pudo agregar"
            );
        }
        return response()->json($respuesta,200,[
            'Access-Control-Allow-Headers' => 'Origin ,X-Requested-With ,Content-Type ,Accept ,Access-Control-Request-Method',
            'Access-Control-Allow-Methods' => 'GET ,POST ,OPTIONS ,PUT ,PATCH ,DELETE',
            'Access-Control-Allow-Origin' => '*'
        ]);
    }
}