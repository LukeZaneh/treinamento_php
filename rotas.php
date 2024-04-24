<?php

use Pecee\SimpleRouter\SimpleRouter;
SimpleRouter::setDefaultNamespace('sistema\Controlador');


SimpleRouter::get('cursos','ControladorSite@index');
SimpleRouter::get("cursos/aulas/{id}","ControladorAulas@aulas");
SimpleRouter::get("cursos/admin/nova","ControladorAulas@novaAula");
SimpleRouter::post("cursos/admin/aula","ControladorAulas@cadastrarAula");
SimpleRouter::start();