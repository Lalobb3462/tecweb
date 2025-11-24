<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require 'vendor/autoload.php';
$app = AppFactory::create();
$app->setBasePath("/tecweb/practicas/p13_s4");

$app->get('/', function($request, $response, $args ) {
    $response->getBody()->write("Hola Mundo Slim!!!!");
    return $response;
});

$app->get("/hola[/{nombre}]", function ($request, $response, $args){
    $response->getBody()->write("Hola, " .$args["nombre"]);
    return $response;
});


$app->post("/pruebapost", function($request, $response, $args){
    $reqPost = $request->getParsedBody();
    $val1 = $reqPost["val1"];
    $val2 = $reqPost["val2"];

    $response->getBody()->write("Valores: " .$val1 . " " . $val2);
    return $response;
});


$app->get("/testjson", function($request, $response, $args){
    $data[0]["nombre"]="Carlos;";
    $data[0]["apellidos"]="Rojas Torres;";
    $data[1]["nombre"]="Karla;";
    $data[1]["apellidos"]="Ballinas Castro;";
    $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));
    return $response;
});

$app->run();

?>