<?php

use Pecee\SimpleRouter\SimpleRouter;
SimpleRouter::setDefaultNamespace('sistema\Controlador');


SimpleRouter::get('cursos','ControladorSite@index');
SimpleRouter::get("cursos/aulas/{id}","ControladorAulas@aulas");
SimpleRouter::get("cursos/admin/cadastrar","ControladorAulas@cadastrarAula");
SimpleRouter::post("cursos/admin/cadastrar","ControladorAulas@cadastrarAula");
SimpleRouter::get("cursos/admin/editar/{id}","ControladorAulas@editarAula");
SimpleRouter::post("cursos/admin/editar/{id}","ControladorAulas@editarAula");
SimpleRouter::get("cursos/admin/deletar/{id}","ControladorAulas@deletarAula");

SimpleRouter::start();