<?php

class ValidateString {

    // : bool    ->  ritorna booleano
    public function isValid(string $string) : bool {
        return filter_var($string, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
// se il risultato è false non vi è stato nuessun sanitize? 



    }
}




?>