<?php

//     $dbHost = 'localhost';
//     $dbUsername = 'root';
//     $dbPassword = 'rootroot';
//     $dbName= 'igreja_batista3';
   
   

//$conexao = new mysqli($dbHost,  $dbUsername,  $dbPassword , $dbName);

//     if (!$conexao -> connect_error) {
//      echo "Erro";

//     }

//     else {
//        echo"Conexão efetuada";
//    }   

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'igreja_batista3';
//$dbName = 'petshop';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

?>

