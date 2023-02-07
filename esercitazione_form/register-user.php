<h1> Registrazione effetuata con successo </h1>

<?php
echo"<pre>";
print_r($_POST);
echo"</pre>";

$nome = filter_input(INPUT_POST, "first_name");
$cognome = filter_input(INPUT_POST, "last_name");
$data_di_nascita = filter_input(INPUT_POST, "birthday");
$luogo_di_nascita = filter_input(INPUT_POST, "birth_place");
$sesso = filter_input(INPUT_POST, "gender");
$nome_utente = filter_input(INPUT_POST, "nome_utente");
$password = filter_input(INPUT_POST, "password");


if($nome == false ) {
    echo "\nla registrazione non valida\n";
} else {
    echo "Registrazione avvenuta con successo";
}


?>
