<?php

namespace sistema\Modelo;

use sistema\Nucleo\Conexao;

class Categoria
{
    private $conexao;

    public function __construct()
    {
        // Armazene a instância do objeto PDO
        $this->conexao = Conexao::getInstancia();
    }


    public function buscaPorId($id)
    {   
        $query = "SELECT * FROM categorias WHERE id = {$id}";
        $stmt = $this->conexao->query($query);
        $resultado = $stmt->fetchAll();
        // var_dump($resultado);
        return $resultado;
    }

    public function cadastrarCategoria($dados)
    {
        $query = "INSERT INTO categorias (titulo) VALUES (?)";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute([$dados['titulo']]);
    }

    public function buscarCategorias()
    {
        $query = "SELECT * FROM categorias";
        $stmt = $this->conexao->query($query);
        $resultado = $stmt->fetchAll();
        return $resultado;
    }

    public function buscaPorTitulo($titulo)
    {
        // var_dump($titulo);
        $query = "SELECT * FROM categorias WHERE titulo = '{$titulo}'";
        $stmt = $this->conexao->query($query);
        $resultado = $stmt->fetchAll();
        return $resultado[0];
    }

    public function editarCategoria($dados ,$id){
        $query = "UPDATE categorias SET titulo = :titulo
        WHERE id = {$id}";
        var_dump($dados);
        $stmt = $this->conexao->prepare($query);
        $stmt->execute($dados);

    }

    public function deletar($id){
        $query = "DELETE FROM categorias WHERE id = {$id}";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
    }
}
