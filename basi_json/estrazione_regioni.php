<?php
include "./config.php";


// file_get_contents('file che voglio aprire')
$province_string = file_get_contents('province.json');
//$province_string = file_get_contents('./province.json');

$province_object = json_decode($province_string); 
//var_dump($province_object);

//map() funzione degli array che serve a trasformare un array in un altro
//un array fatto solo di regioni
$regioni_array = array_map(function($provincia) {
    return $provincia -> regione;
}, $province_object);


//Rimuove i valori DUPLICATI da un array
// array_unique(array da ridurre);
$regioni_unique = array_unique($regioni_array);
//$regioni_unique = array_unique($regioni_array, SORT_ASC);

sort($regioni_unique);

//
$dsn = "mysql: host.=".DB_HOST.";dbname=".DB_NAME;


try {
    $conn = new PDO($dsn,DB_USER,DB_PASSWORD);

    // TRUNCATE TABLE : elimina i dati all'interno di una tabella, ma non la tabella stessa.
    $conn -> query('TRUNCATE TABLE regioni');

    foreach ($regioni_unique as $regione) {
     //addslashes() converte, fa escape di tutti caratteri che possono creare qualche conflitto
     //Restituisce una stringa con backslashes aggiunti prima dei caratteri di cui è necessario eseguire l'escape.
     // caratteri (  '   "   \   spazioVuoto)
    $regione =addslashes($regione);
    
    $sql = "INSERT INTO regioni(nome) VALUES('$regione');";
    echo $sql ."\n";
    $conn -> query($sql);
    }
}catch(\Throwable $th) {
    throw $th;
}

print_r($regioni_unique);


// ESERCIZIO 
//file che importa le province
//decodificare
//creare tabella con nome-Stringa, sigla-Char(2)/Varchar, regione
//invece di regione devi fare regione_id e metterci id giusto, facendo una query e leggere risultato 

//08/03
//cerca nella tabella regioni quella che sia chiam a"" e predni id

?>