<?php

session_start();

if (!isset($_SESSION["logado"]) || $_SESSION["logado"] !== true) {
    header("location: index.php");
    exit;

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$ra = $_POST['ra'];

$arquivo = "arquivo.txt";

if(!file_exists($arquivo)){
    $arquivoAberto = fopen($arquivo, "w");
}else{
    $arquivoAberto = fopen($arquivo, "a");
}


fwrite($arquivoAberto, "Nome: $nome | Sobrenome: $sobrenome | RA: $ra\n");
fflush($arquivoAberto);
fclose($arquivoAberto);


$arquivoAberto = fopen($arquivo, "r");
while(!feof($arquivoAberto)){
    $line = fgets($arquivoAberto);
    echo $line . "<br>";
}

fclose($arquivoAberto);
    
?>
