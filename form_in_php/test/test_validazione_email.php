<?php

//da TERMINALE
//Scan derectory --> fammi vedere la directory in cui mi trovo, come ls
// dalla cartella dove sei .
//entra dentro /
//$file = scandir(".form_in_php/class/validator/ValidateMail.php);
//print_r($file); //chiedo il risultato

//per IMPRTARE una classe che ho in un altro file
//require "./form_in_php/class/validator/ValidateMail.php";
require "./form_in_php/class/validator/ValidateMail.php";

// elenco= array di situazioni email sbagliata, dati con cui voglio fare le prove, in cui considero un email sbagliata 
//non sono obbligata a compilare il form
$emails = [
    'a', '  ', 'a@', 'mario', '<h1>ciccio</h1>', 'a<@.it'
];


//require "";
$file = scandir("."); 
print_r($file);




$v = new ValidateMail();

//in java per chiamare il metodo
    // v.isValid('a');
// in php uso 
    // $v -> isValid($email);


foreach ($emails as $index => $email) {

// isValid restituisce un booleano
   if( $v -> isValid($email) == false) {
         echo "Test superato per $email\n";
    } else {
        echo "Test numero $index non superato per [$email]\n";
    };
    // $v -> getMessage();

}

?>