<h1>Sono
    la
    risposta
    (RESPONSE)
</h1>

<?php
echo "<pre>";
echo "get:";
print_r($_GET);

echo "post:";
print_r($_POST);
echo "</pre>";


//echo "La tua email è: <br>";
// genera un errore/warning perche ECHO può "visualizzare" solo string e number 
//echo "<strong>" . $_POST['email'] . "</strong>";


/*
  $ -> variabile  
  "" / ''  ->  stringa
  CICCIO -> costante
 */

 
//echo $_POST['email'];




$test = filter_input(INPUT_GET,'email',FILTER_VALIDATE_EMAIL);

if($test === false) {
    echo "\nLa mail non è valida\n";
}else{
    echo "Grazie la tua email è valida: $test";
}




?>