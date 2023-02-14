<?php

// simile classe in Java
class ValidateMail {


    public function isValid(string $email) : bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
        
    }
}




?>