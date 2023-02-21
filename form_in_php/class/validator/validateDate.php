<?php

class ValidateData {
// is valid è un metodo
    public function isValid(string $date) : bool {
// explode è una fuznione
        $parametriData = explode("-", $date);
        $anno = $parametriData[0];
        $mese = $parametriData[1];
        $giorno = $parametriData[2];
        
        
        return checkdate($mese, $giorno, $anno);
        
    }
}




?>