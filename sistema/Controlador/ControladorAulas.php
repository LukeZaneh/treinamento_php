<?php

namespace sistema\Controlador;
use sistema\Nucleo\Controlador;
use sistema\Modelo\Aula;
use Pecee\Http\Response;
use Pecee\SimpleRouter\SimpleRouter;

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
       
    }

    public function cadastrarAula()
    {
        $objetoAula = new Aula();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') { 
            $categorias = $objetoAula->buscarCategorias();
            echo $this->template->renderizar('novaaula.html', [
                'categorias'=>$categorias,
            ]);
        }
        elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if(isset($dados)){
                $objetoAula->cadastrarAula($dados);
                $categoria = $dados['categoria'];
                //SimpleRouter::response()->redirect("http://localhost/cursos/aulas/{$categoria}");
            }
            SimpleRouter::response()->redirect("http://localhost/cursos/aulas/{$categoria}");
        }
    }


    public function editarAula($id){
        $objetoAula = new Aula();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $aula = $objetoAula->buscaPorId($id);
            $categorias = $objetoAula->buscarCategorias();
            
            echo $this->template->renderizar('editaraula.html', [
                'aula'=>$aula[0],
                'categorias'=>$categorias
            ]);
        }
        elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if(isset($dados)){
                $objetoAula->editarAula($dados, $id);
                $categoria = $dados['categoria'];
            }
            SimpleRouter::response()->redirect("http://localhost/cursos/aulas/{$categoria}");
        }
    }

    public function deletarAula($id){
        $objetoAula = new Aula();
        
        $aula = $objetoAula->buscaPorId($id);
        $categoria = $aula[0]->categoria;
        var_dump($categoria);
        $objetoAula->deletar($id);
        SimpleRouter::response()->redirect("http://localhost/cursos/aulas/{$categoria}");
        
    }

}