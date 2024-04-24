<?php

use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app = AppFactory::create();

// Add error middleware
$app->addErrorMiddleware(true, true, true);

// Add routes
$app->get('cursos/aulas','sistema\Controlador\ControladorAulas:aulas');
// $app->get('/cursos/aulas', function (Request $request, Response $response) {
//     $response->getBody()->write('<a href="/hello/world">Try /hello/world</a>');
//     return $response;
// });
$app->run();