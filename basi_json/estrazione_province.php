<?php
include "./config.php";

// file_get_contents('file che voglio aprire') //è una STRINGA
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
    return 
    [
        'nome' => $provincia -> nome,
        'sigla' => $provincia -> sigla,
        'regione' => $provincia -> regione
       // 'regione_id' => $provincia -> regione

    ];

 }, $province_object);

 var_dump($province_array);
//cerca nella tabella regioni quella che sia chiam a"" e predni id


$dsn = "mysql: host.=".DB_HOST.";dbname=".DB_NAME;

//inseriamo le province nella tabella
try {
    //connection between PHP and a database server
    $conn = new PDO($dsn,DB_USER,DB_PASSWORD);

// TRUNCATE TABLE : elimina i dati all'interno di una tabella, ma non la tabella stessa
    $conn -> query('TRUNCATE TABLE province');

    //per ogni elemento $provincia dell array $province_array
    foreach ($province_array as $citta => $provincia) {

    $nome_provincia =addslashes($provincia ['nome']);
    $sigla_provincia =addslashes($provincia ['sigla']);
    $nome_regione  =addslashes($provincia ['regione']); 

    $query=  "SELECT regione_id FROM regioni WHERE nome = '$nome_regione';";

    $id_regione = $conn ->query($query)->fetchColumn(); 
  

    $sql = "INSERT INTO province(nome, sigla, regione_id) VALUES('$nome_provincia', '$sigla_provincia', '$id_regione');";
   echo $sql ."\n";
    $conn -> query($sql);
    }
}catch(\Throwable $th) {
    throw $th;
}



?>