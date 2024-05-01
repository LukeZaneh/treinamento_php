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

    public function listaCategorias() {
        $categorias = (new Categoria())->buscarCategorias();
        echo $this->template->renderizar('categorias.html', [
          'categorias'=>$categorias
        ]);
    }

    public function categorias($id)
    {
        $categorias = (new Categoria())->buscaPorId($id);
        echo $this->template->renderizar('categorias.html', [
          'categorias'=>$categorias
        ]);
    }

    public function cadastrarCategoria()
    {
        $objetoCategoria = new Categoria();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') { 
            $categorias = $objetoCategoria->buscarCategorias();
            echo $this->template->renderizar('novacategoria.html', [
                'categorias'=>$categorias,
            ]);
        }
        elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if(isset($dados)){
                $objetoCategoria->cadastrarCategoria($dados);
                $categoria = $objetoCategoria->buscaPorTitulo($dados['titulo']);
                var_dump($categoria);
                $categoria = (array) $categoria;
                //SimpleRouter::response()->redirect("http://localhost/cursos/aulas/{$categoria}");
            }
            //echo $categoria;
            $id = $categoria['id'];
            SimpleRouter::response()->redirect("http://localhost/cursos/categorias/{$id}");
        }
    }


    public function editarCategoria($id){
        $objetoCategoria = new Categoria();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $categoria = $objetoCategoria->buscaPorId($id);
            // var_dump($categoria);
            echo $this->template->renderizar('editarcategoria.html', [
                'categoria'=>(array)$categoria[0]
            ]);
        }
        elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if(isset($dados)){
                $objetoCategoria->editarCategoria($dados, $id);
                // var_dump($objetoCategoria);
                $categoria = $dados['titulo'];
            }
            SimpleRouter::response()->redirect("http://localhost/cursos/categorias/{$id}");
        }
    }

    public function deletarCategoria($id){
        $objetoCategoria = new Categoria();
        
        $objetoCategoria->deletar($id);
        SimpleRouter::response()->redirect("http://localhost/cursos");
        
    }

}