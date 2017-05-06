<?php
  use \Psr\Http\Message\ServerRequestInterface as Request;
  use \Psr\Http\Message\ResponseInterface as Response;

  $app->get('/usuarios',function(Request $req,Response $res,$args){
    $usuarios = Usuario::get();
    if(count($usuarios)<=0) return sendResponse(json_encode(array('message'=>'No se encontro nada')),$res,404);
    sendResponse($usuarios->toJson(),$req,200);
  });
  $app->get('/usuarios/{id}',function(Request $req,Response $res,$args){
    $id = $args['id'];
    $usuarios = Usuario::where('id','=',$id);
    if(count($usuarios)<=0) return sendResponse(json_encode(array('message'=>'No se encontro')),$res,404);
    sendResponse($usuarios->toJson(),$res,200);
  });
  $app->post('/usuarios',function(Request $req,Response $res,$args){
    $data = $req->getParsedBody();
    $usuario = new Usuario();
    $usuario->nombre = $data['nombre'];
    $usuario->apellidos = $data['apellidos'];
    $usuario->correo = $data['correo'];
  });

?>
