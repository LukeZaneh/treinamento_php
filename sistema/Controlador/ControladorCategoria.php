<?php

namespace sistema\Controlador;
use sistema\Nucleo\Controlador;
use sistema\Modelo\Categoria;
use Pecee\SimpleRouter\SimpleRouter;

class ControladorCategoria extends Controlador
{ 
    public function __construct()
    {
        parent::__construct('sistema/templates/site/views');
    }

    public function categorias($id)
    {
        $categorias = (new Categoria())->buscaPorId($id);
        echo $this->template->renderizar('categorias.html', [
          'categorias'=>$categorias
        ]);
    }

    public function criarCategoria()
    {
        $objetoCategoria = new Categoria();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') { 
            $categorias = $objetoCategoria->buscarCategorias();
            echo $this->template->renderizar('categorias.html', [
                'categorias'=>$categorias,
            ]);
        }
        elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if(isset($dados)){
                $objetoCategoria->cadastrarCategoria($dados);
                $categoria = $dados['categoria'];
                //SimpleRouter::response()->redirect("http://localhost/cursos/aulas/{$categoria}");
            }
            SimpleRouter::response()->redirect("http://localhost/cursos/categorias/{$categoria}");
        }
    }


    public function editarCategoria($id){
        $objetoCategoria = new Categoria();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $categoria = $objetoCategoria->buscaPorId($id);
            
            echo $this->template->renderizar('editarcategoria.html', [
                'categorias'=>$categoria
            ]);
        }
        elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if(isset($dados)){
                $objetoCategoria->$this->editarCategoria($dados, $id);
                $categoria = $dados['categoria'];
            }
            SimpleRouter::response()->redirect("http://localhost/cursos/aulas/{$categoria}");
        }
    }

    public function deletarCategoria($id){
        $objetoCategoria = new Categoria();
        
        $categoria = $objetoCategoria->buscaPorId($id);
        $categoria = $categoria[0]->categoria;
        var_dump($categoria);
        $objetoCategoria->$this->deletar($id);
        SimpleRouter::response()->redirect("http://localhost/cursos/categorias/{$categoria}");
        
    }

}