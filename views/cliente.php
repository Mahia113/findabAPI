<?php
  use \Psr\Http\Message\ServerRequestInterface as Request;
  use \Psr\Http\Message\ResponseInterface as Response;
  $app->get('/clientes',function(Request $req,Response $res,$args){
    $clientes = Cliente::where('habilitado',1)->get();
    if($clientes->isEmpty()) return sendResponse(json_encode(array('message'=>'no se encontro')),$res,404);

    sendResponse($clientes->toJson(),$res,200);
  });
  $app->get('/clientes/{idCliente}',function(Request $req,Response $res,$args){
    $idCliente = $args['clientes'];
    $cliente = Cliente::findOrFail($idCliente);
    sendResponse($cliente->toJson(),$res,200);
  });

?>
