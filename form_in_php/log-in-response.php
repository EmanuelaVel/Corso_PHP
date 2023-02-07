<?php

/**
 *  $ -> variabile  
 * " "/' '  -> stringa
 * CICCIO 
 */


$test = filter_input(INPUT_GET, 'email' ,  FILTER_VALIDATE_EMAIL);

// == === è lo stesso significato javascript
if($test === false) {
    echo "\nla mail non è valida\n";
} else {
    echo "grazie la tua email è valida: $test";
}
?>