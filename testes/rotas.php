<?php

use CoffeeCode\Router\Router;


$router = new Router("http://localhost/cursos");
$router->namespace("cursos");

//$router->group(null);
$router->get("/", "Controller:index");




$router->dispatch();

