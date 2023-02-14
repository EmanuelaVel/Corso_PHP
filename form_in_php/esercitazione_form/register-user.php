<?php
require 'ValidateMail.php';


//<pre>  per stampare i valori uno sotto l'altro
echo"<pre>";
//array
//stampa i valori in un array
print_r($_POST);
echo"</pre>";

//la chiave dell'array associativo è presa dal name del tag


$nome = filter_input(INPUT_POST, "first_name");
$cognome = filter_input(INPUT_POST, "last_name");
$data_di_nascita = filter_input(INPUT_POST, "birthday");
$luogo_di_nascita = filter_input(INPUT_POST, "birth_place");
$sesso = filter_input(INPUT_POST, "gender");
$email = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");



if($nome==false /*or $cognome==false  or $data_di_nascita==false or 
$luogo_di_nascita==false or $sesso==false or $nome_utente==false or $password==false*/) {
    echo "\nLa registrazione non è valida\n";
} else {
    echo "Registrazione avvenuta con successo";
}
            echo "<br>--------------------------------<br>";

print_r($data_di_nascita);
            echo "<br>--------------------------------<br>";

$parametriData = explode("-", $data_di_nascita);
$anno = $parametriData[0];
$mese = $parametriData[1];
$giorno = $parametriData[2];

var_dump(checkdate($mese, $giorno, $anno));
            echo "<br>--------------------------------<br>";


print_r($email) ;
            echo "<br>--------------------------------<br>";


$mail = new ValidateMail();

// per richiamare i metodi in php si usa la freccia
$mail -> isValid($email);

if ($mail -> isValid($email) == false) {
    echo "Email non valida";
}else {
    echo "Email valida";
}
            echo "<br>--------------------------------<br>";

?>