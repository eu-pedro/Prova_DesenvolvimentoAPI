<?php

header("Content-type: application/json");


require_once("vendor/autoload.php");

$rota = !empty($_GET["url"]) ? $_GET["url"] : "Nada aqui";

// echo "<hr>";


$rota = explode("/", $rota);


if($rota[0] === "api"){
  array_shift($rota);
  

  if(!file_exists("App\controller\\". $rota[0]. "controller.php")){
    echo "não existe";
  }
  else{
    $servico = "App\controller\\".ucfirst($rota[0]). "Controller";

    array_shift($rota);

    $verboHTTP = strtolower($_SERVER["REQUEST_METHOD"]);

    try {
      $resposta = call_user_func_array(array (new $servico, $verboHTTP), $rota);

      

      echo json_encode(array('status' => 'sucesso', 'data' => $resposta), JSON_UNESCAPED_UNICODE);

    } catch (\Exception $erro) {
      http_response_code(404);
      json_encode(array('status' => 'erro', 'data' => $erro->getMessage()));
    }
  }


}
else{
  echo "não é aqui";
}