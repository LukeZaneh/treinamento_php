<?php
namespace sistema\Controlador;
use sistema\Nucleo\Controlador;

class ControladorSite extends Controlador
{
    public function __construct()
    {
        parent::__construct('sistema/templates/site/views');
    }
    public function index():void
    {
        echo 'Página inicial';
    }

    public function aulas():void
    {
        echo $this->template->renderizar('aulas.html', [
            'titulo' => 'teste de titulo',
            'subtitulo' => 'teste de subtitulo'
        ]);
    }
}