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

    public function buscaPorFk($fk)
    {   
        $query = "SELECT * FROM aulas WHERE categoria = {$fk}";
        $stmt = $this->conexao->query($query);
        $resultado = $stmt->fetchAll();
        return $resultado;
    }

    public function buscaPorId($id)
    {   
        $query = "SELECT * FROM aulas WHERE id = {$id}";
        $stmt = $this->conexao->query($query);
        $resultado = $stmt->fetchAll();
        return $resultado;
    }

    public function buscarCategorias()
    {
        $query = "SELECT * FROM categorias";
        $stmt = $this->conexao->query($query);
        $resultado = $stmt->fetchAll();
        return $resultado;
    }

    public function cadastrarAula($dados)
    {
        $query = "INSERT INTO aulas (titulo, descricao, url, link, duracao, categoria) VALUES (?,?,?,?,?,?)";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute([$dados['titulo'], $dados['descricao'], $dados['url'], $dados['link'], $dados['duracao'], $dados['categoria']]);
    }

    public function editarAula($dados ,$id){
        $query = "UPDATE aulas SET titulo = :titulo, descricao = :descricao, url = :url, link = :link, duracao = :duracao, categoria = :categoria 
        WHERE id = {$id}";
        var_dump($dados);
        $stmt = $this->conexao->prepare($query);
        $stmt->execute($dados);

    }

    public function deletar($id){
        $query = "DELETE FROM aulas WHERE id = {$id}";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
    }
}
