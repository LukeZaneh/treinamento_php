<?php

namespace sistema\Controlador;
use sistema\Nucleo\Controlador;
use sistema\Modelo\Aula;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class ControladorAulas extends Controlador
{
    public function __construct()
    {
        parent::__construct('sistema/templates/site/views');
    }

    public function aulas($fk)
    {
        $aulas = (new Aula())->buscaPorFk($fk);
        echo $this->template->renderizar('aulas.html', [
            'aulas'=>$aulas
        ]);
    }

    public function novaAula()
    {
       
        $categorias = (new Aula())->buscarCategorias();
        echo $this->template->renderizar('novaaula.html', [
            'categorias'=>$categorias,
            'eu' => "oi"
        ]);
    }

    public function cadastrarAula()
    {
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(isset($dados)){
            // $titulo = $_POST['titulo'];
            // $descricao = $_POST['descricao'];
            // $url = $_POST['url'];
            // $link = $_POST['link'];
            // $duracao = $_POST['duracao'];
            // $categoria = $_POST['categoria'];
            (new Aula())->cadastrarAula($dados);
        }
        
        echo $this->template->renderizar('index.html', [
        ]);
    }


}