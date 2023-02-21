<?php

// simile classe in Java
class ValidateMail {

    //validate : ritorna un booleano, verifica se è valido oppure no
    // sanitize, cambiano la stringa

    public function isValid(string $email) : bool {
                        //  (stringa , costante)
        return filter_var($email, FILTER_VALIDATE_EMAIL);
        
    }
}



?>