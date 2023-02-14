<?php

/**
 *  $ -< variabile  
 * " "/' '  -> stringa
 * CICCIO 
 */

//echo $_POST['email'];

$test = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($test === false) {
    echo "\nL'email non è valida\n";
} else {
    echo "Grazie la tua email è valida: $test";
}


echo"<pre>";
print_r($_POST);
echo"</pre>";


?>