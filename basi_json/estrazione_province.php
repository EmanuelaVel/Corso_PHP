<?php
include "./config.php";

// file_get_contents('file che voglio aprire')
//è una sTRINGA
$province_string = file_get_contents('province.json');
//var_dump($province_string)


// json_decode() : DECODIFICARE una stringa JSON in un oggetto/array PHP
// in questo caso diventa un ARRAY di oggetti 
$province_object = json_decode($province_string); 
//var_dump($province_object);


//map() funzione degli array che serve a trasformare un array in un altro
//$provincia = oggetto dell'array
//array_map(funtion($elemento_array){}, array da cambiare)
 $province_array = array_map(function($provincia) {
    return $provincia -> nome;

 }, $province_object);

 //var_dump($province_array);

$sigle_array = array_map(function($provincia) {
    return $provincia -> sigla;
}, $province_object);

//var_dump($sigle_array);


sort($province_array);
//var_dump($province_array);

sort($sigle_array);
//var_dump($sigle_array);


$dsn = "mysql: host.=".DB_HOST.";dbname=".DB_NAME;

//inseriamo le province nel db
try {
    //connection between PHP and a database server
    $conn = new PDO($dsn,DB_USER,DB_PASSWORD);

// TRUNCATE TABLE : elimina i dati all'interno di una tabella, ma non la tabella stessa
    $conn -> query('TRUNCATE TABLE province');

    //per ogni elemento $provincia dell array $province_array
    foreach ($province_array as $provincia) {
    $provincia = addslashes($provincia);

    
    $sql = "INSERT INTO province(nome) VALUES('$provincia');";
    echo $sql ."\n";
    $conn -> query($sql);
    }
}catch(\Throwable $th) {
    throw $th;
}



?>