<?php
  use \Psr\Http\Message\ServerRequestInterface as Request;
  use \Psr\Http\Message\ResponseInterface as Response;

  $app->get('/negocio/tiempo',function(Request $req,Response $res,$args){
    $tiempo = Tiempo::get();
    if(count($tiempo)<=0) return sendResponse(json_encode(array('message'=>'No se encontaron tiempos')),$res,500);
    sendResponse($tiempo->toJson(),$res,200);
  });
?>
