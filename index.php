<?php 
require_once("dbconfig.php");

function ler ($id)
{
$arquivo = "db.json";
if ($GLOBALS['conn']){
    $base = json_decode($arquivo);

    $sql  = "select * from certrede where chatid='".$id."'";
    $exe = mysqli_query($GLOBALS['conn'],$sql);
    $result = mysqli_fetch_assoc($exe); 
    print_r($result);


   // echo ("arquivo encontrado");
}
else{
    echo ("falha ao ler o registro");
}
}
function registra ($valor)
{
$arquivo = "db.json";
if (file_exists($arquivo)){
    $valor = json_encode($valor);
    file_put_contents($arquivo,$valor);

    echo ("registrado");
}
else{
    echo ("Arquivo inexistente, falha no registro");
}
}

//iniciando codigo
$chatwootjson = file_get_contents("php://input");
$chatwootjson = json_decode($chatwootjson);


$content = $chatwootjson->content;
if (isset($content))
{
    file_get_contents("https://webhook.site/5851d9c9-27dd-4861-859d-332af9db0e42");
    $valor = array (
        "chatid" => 1,
        "mesagem" =>"ola"

    );
    registra ($valor);
}