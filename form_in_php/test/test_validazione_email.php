<?php


// elenco di situazioni in cui considero un email sbagliata 
$emails = [
    'a', ' ', 'a@', 'mario', '<h1>ciccio</h1>', 'a<@.it'
];


//require "";
$file = scandir("."); 
print_r($file);
//require "./form_in_php/class/validator/ValidateMail.php";

require "./form_in_php/class/validator/ValidateMail.php";


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