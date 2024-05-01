<?php

use Pecee\SimpleRouter\SimpleRouter;
SimpleRouter::setDefaultNamespace('sistema\Controlador');


SimpleRouter::get('cursos','ControladorCategoria@listaCategorias');
SimpleRouter::get("cursos/aulas/{id}","ControladorAulas@aulas");
SimpleRouter::get("cursos/admin/cadastrar","ControladorAulas@cadastrarAula");
SimpleRouter::post("cursos/admin/cadastrar","ControladorAulas@cadastrarAula");
SimpleRouter::get("cursos/admin/editar/{id}","ControladorAulas@editarAula");
SimpleRouter::post("cursos/admin/editar/{id}","ControladorAulas@editarAula");
SimpleRouter::get("cursos/admin/deletar/{id}","ControladorAulas@deletarAula");
SimpleRouter::get("cursos/categorias/{id}","ControladorCategoria@categorias");
SimpleRouter::get("cursos/admin/cadastrar/categoria","ControladorCategoria@cadastrarCategoria");
SimpleRouter::post("cursos/admin/cadastrar/categoria","ControladorCategoria@cadastrarCategoria");
SimpleRouter::get("cursos/admin/categoria/editar/{id}","ControladorCategoria@editarCategoria");
SimpleRouter::post("cursos/admin/categoria/editar/{id}","ControladorCategoria@editarCategoria");
SimpleRouter::get("cursos/admin/categoria/deletar/{id}","ControladorCategoria@deletarCategoria");

SimpleRouter::start();