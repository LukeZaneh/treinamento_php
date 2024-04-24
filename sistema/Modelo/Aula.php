<?php

namespace sistema\Modelo;
use sistema\Nucleo\Conexao;

class Aula
{
    public function buscaPorFk($fk)
    {   
        $query = "SELECT * FROM aulas WHERE categoria = {$fk}";
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

    public function cadastrarAula($dados)
    {
        $query = "INSERT INTO aulas (titulo, descricao, url, link, duracao, categoria) VALUES (?,?,?,?,?,?)";
        $stmt = Conexao::getInstancia()->prepare($query);
        $stmt->execute([$dados['titulo'], $dados['descricao'], $dados['url'], $dados['link'], $dados['duracao'], $dados['categoria']]);

    }
}
