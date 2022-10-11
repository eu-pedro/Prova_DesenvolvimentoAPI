<?php

namespace App\model;
use App\model\Conexao;
use \Exception;


class ExoDAO{

  private $tabela = "exo";

  // get
  public function consultar(){
    $comando = "SELECT * FROM {$this->tabela}";

    $preparacao = Conexao::getConexao()->prepare($comando);
    $preparacao->execute();

    if($preparacao-> rowCount() > 0){
      return $preparacao->fetchAll(\PDO::FETCH_ASSOC);
    }
    else{
      throw new \Exception("Nenhum dado encontrado");
    }
    
  }
  
  // post
  public function inserir($dados){
    $comando = "INSERT INTO {$this->tabela} VALUES(NULL,:titulo,:situacao, :data_inicio, :area)";

    $preparacao = Conexao::getConexao()->prepare($comando);

    $preparacao->bindValue(":titulo",$dados["titulo"]);
    $preparacao->bindValue(":situacao", $dados["situacao"]);
    $preparacao->bindValue(":data_inicio", $dados["data_inicio"]);
    $preparacao->bindValue(":area", $dados["area"]);

    $preparacao->execute();

    if($preparacao->rowCount() > 0){
      return "Dados inseridos com sucesso";
    }
    else{
      throw new \Exception("Erro ao inserir os dados");
    }
  }

  // put
  public function atualizar($id){
    
  }
  
  // delete
  public function delete($id){

  }
}