<?php

// simile classe in Java
class ValidateMail implements Validable {

    //validate : ritorna un booleano, verifica se è valido oppure no
    // sanitize, cambiano la stringa


    //mixed: perch non potete definire array e boolean, ma non è qualunque cosa
    public function isValid(mixed $email) : bool {
                        //  (stringa , costante)
        return filter_var($email, FILTER_VALIDATE_EMAIL);
        
    }
}



?>