<?php

/**
 *  $ -< variabile  (se non metti $ lui capisce cstante indefinita)
 * " "/' '  -> stringa
 * CICCIO 
 */

/** tutte le costanti sono globali,  */

// [] hanno il significato di opzionale
$test = filter_input(INPUT_GET, 'email' ,  FILTER_VALIDATE_EMAIL);

// == === è lo stesso signuificato javascript
if($test === false) {
    echo "\nla mail non è valida\n";
} else {
    echo "grazie la tua email è valida: $test";
}
?>