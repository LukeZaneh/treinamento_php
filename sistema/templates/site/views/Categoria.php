<?php

namespace sistema\Modelo;
use sistema\Nucleo\Conexao;

class Categoria
{
    public function buscaPorId($id)
    {   
        $query = "SELECT * FROM categorias WHERE id = {$id}";
        $stmt = Conexao::getInstancia()->query($query);
        $resultado = $stmt->fetchAll();
        return $resultado;
    }

    public function buscarCategorias()
    {
        $query = "SELECT * FROM categorias";
        $stmt = Conexao::getInstancia()->query($query);
        $resultado = $stmt->fetchAll();
       
        return $resultado;
    }

    public function cadastrarCategoria($dados)
    {
        $query = "INSERT INTO categorias (titulo, id) VALUES (?,?)";
        $stmt = Conexao::getInstancia()->prepare($query);
        $stmt->execute([$dados['titulo'], $dados['id']]);

    }
}
