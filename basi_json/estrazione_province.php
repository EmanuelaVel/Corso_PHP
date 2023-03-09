<?php
include "./config.php";

// file_get_contents('file che voglio aprire') //è una STRINGA
$province_string = file_get_contents('province.json');
//var_dump($province_string)


// json_decode() :diventa un oggetto
$province_object = json_decode($province_string); 
//var_dump($province_object);


$dsn = "mysql: host.=".DB_HOST.";dbname=".DB_NAME;

try {

    $conn = new PDO($dsn,DB_USER,DB_PASSWORD);

    $conn -> query('TRUNCATE TABLE province');

    foreach ($province_object as $provincia) {

    $nome_provincia =addslashes($provincia->nome);
    $sigla_provincia =addslashes($provincia ->sigla);
    $regione_id = $provincia->regione;

    $regione_id = $conn->query ("SELECT regione_id FROM regioni WHERE nome =\"$regione_id\"")->fetchColumn();

    print_r($regione_id);

    $sql = "INSERT INTO province(nome, sigla, regione_id) VALUES('$nome_provincia', '$sigla_provincia', '$regione_id');";
    echo $sql ."\n";
     $conn -> query($sql);
    
    }
}catch(\Throwable $th) {
    throw $th;
}



?>