<?php

namespace App\controller;
use App\model\ExoDAO;

class ExoController{
  public function get(){
    $meuExo = new ExoDAO();
    return $meuExo->consultar();
  }
  public function post(){
    $meuExo = new ExoDAO();
    return $meuExo->inserir($_POST);
  }
  
}