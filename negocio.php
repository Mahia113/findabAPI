<?php
  use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;

  $app->get('/negocios',function(Request $req,Response $res,$args){
    $negocio = Negocio::get();
    if($negocio->isEmpty()) return sendResponse(json_encode(array('message'=>'Not found')),$res,404);
    sendResponse($negocio->toJson(),$res,200);
  });
  $app->post('/negocios',function(Request $req,Response $res,$args){
    $data = $reques->getParsedBody();
    $negocio = new Negocio();
    $negocio->nombre = urfirst($data['nombre']);
    $negocio->descripcion = ucfist($data['descripcion']);
    $negocio->logo = ucfist($data['logo']);
    $negocio->portada = $data['portada'];
		$negocio->direccion = $data['direccion'];
    $negocio->coordenada_latitud = $data['lat'];
    $negocio->coordenada_altitud = $data['lng'];
    $negocio->web_url = $data['web_url'];
    $negocio->telefono1 = $data['telefono1'];
    $negocio->telefono2 = $data['telefono2'];

    $negocio->cliente_id = $data['cliente_id'];
    $negocio->ciudad_id = $data['ciudad_id'];

    if($negocio->save()){
      return sendResponse($negocio->id,$res,200);
    }
    sendResponse(json_encode(array('message'=>'error')),$res,500);

  });

?>
