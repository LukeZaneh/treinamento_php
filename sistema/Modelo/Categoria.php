<?php

namespace sistema\Modelo;

use sistema\Nucleo\Conexao;

class Aula
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
        return $resultado;
    }

    public function cadastrarCategorias($dados)
    {
        $query = "INSERT INTO categorias (titulo, id) VALUES (?,?)";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute([$dados['titulo'], $dados['id']]);
    }

    public function editarCategoria($dados ,$id){
        $query = "UPDATE categorias SET titulo = :titulo, id = :id
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
