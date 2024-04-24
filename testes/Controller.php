<?php
namespace sistema\Controlador;
use sistema\Nucleo\Controlador;

class Controller
{ 
    public function index($data):void
    {
        echo 'Página inicial';
        var_dump($data);
    }
   
}