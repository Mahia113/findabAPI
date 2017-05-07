<?php
  use \Psr\Http\Message\ServerRequestInterface as Request;
  use \Psr\Http\Message\ResponseInterface as Response;

  $app->get('/favoritos',function(Request $req,Response $res,$args){
    $fav = Favoritos::get();
    if($fav) return sendResponse(json_encode(array('message'=>'no se encontro nada')),$res,404);
    sendResponse($fav->toJson(),$res,200);
  });
  $app->get('/favoritos/{id}',function(Request $req,Response $res,$args){
    $id = $args['id'];
    $fav = Favoritos::findOrFail(id)->get();
    sendResponse($fav->toJson(),$res,200);
  });
  
?>
