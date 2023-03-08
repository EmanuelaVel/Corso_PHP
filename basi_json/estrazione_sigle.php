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




$sigle_array = array_map(function($provincia) {
    return $provincia -> sigla;
}, $province_object);

sort($sigle_array);
//var_dump($sigle_array);


$dsn = "mysql: host.=".DB_HOST.";dbname=".DB_NAME;

//per la SIGLA
try {

     //connection between PHP and a database server
     $conn = new PDO($dsn,DB_USER,DB_PASSWORD);

     // TRUNCATE TABLE : elimina i dati all'interno di una tabella, ma non la tabella stessa.
         $conn -> query('TRUNCATE TABLE province');


    foreach ($sigle_array as $sigla_provincia) {
        //addslashes() converte, fa escape di tutti caratteri che possono creare qualche conflitto
       $sigla_provincia =addslashes($sigla_provincia);
       
       $sql = "INSERT INTO province(sigla) VALUES('$sigla_provincia');";
       echo $sql ."\n";
       $conn -> query($sql);
       }

    }catch(\Throwable $th) {
        throw $th;
    }

?>