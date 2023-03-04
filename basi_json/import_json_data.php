<?php

//per lanciare questo script sul TERMINALE
// php basi_json/import_json_data.php


//// file_get_contents() : LEGGE il file posizionato a questo indirizzo 
$province = file_get_contents('https://gist.githubusercontent.com/stockmind/8bcbbf9ac41bc196401b96084ec8c5d3/raw/2edda5cd32eb2b99d3d9b45413bc8b1135564260/province-italia.json');

//// file_put_contents() : SCRIVE nel file 'province.json' il contenuto della variabile $province
//file_put_contents('province.json', $province);
// ora lanciando lo script, mi aggiunge il file.json contenuto in $province

//// file_get_contents() :LEGGE il contenuto del file 'province.json' 
//$province = file_get_contents('province.json');
//echo $province;


//// json_decode() : DECODIFICARE una stringa JSON in un oggetto/array PHP
/// in questo caso diventa un ARRAY di oggetti 
$province_object = json_decode($province);
//stamperà l'array di oggetti
//print_r($province_object);


// accede all'elemento 4 dell'array  
$province_object[4];
//print_r($province_object[4]);


// accede all'elemento 4 dell'array e prende l'attributo 'nome'
$province_object[4]->nome;
//print_r($province_object[4]->nome);


// per ogni elemento dell'array AS mettilo in $provincia_object
foreach ($province_object as $provincia_object) {
    // stampa nome(sigla)
   //echo $provincia_object->nome." (".$provincia_object->sigla.")\n";
}



// DECODIFICARE il JSON in array associativi
// json_decode(stringa_JSON, true) 
$province_associative_array = json_decode($province, true);
//print_r($province_associative_array);


// stampa l'elemento 4 dell'array
//print_r($province_associative_array[4]);


// accede all'elemento 4 dell'array e prende l'attributo 'nome'
//print_r($province_associative_array[4]['nome']);


// per ogni elemento dell'array AS mettilo in $provincia
foreach ($province_associative_array as $provincia) {
    //echo "{$provincia['nome']} ({$provincia['sigla']}) \n";
}





?>