<?php

namespace sistema\Nucleo;

use PDO;
use PDOException;


class Conexao
{
    private static $instancia;

    public static function getInstancia()
    {
        if(empty(self::$instancia)){
            try{
                self::$instancia = new PDO('mysql:host=localhost;port=3306;dbname=academia', 'root', '',[
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_CASE => PDO::CASE_NATURAL
                ]);
            } catch(PDOException $ex){
                die("Erro de conexão:: ".$ex->getMessage());
            }
            return self::$instancia;
        }
    }

    protected function __construct()
    {

    }

    private function __clone():void
    {
        
    }
}