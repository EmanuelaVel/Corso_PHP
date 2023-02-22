<?php

class ValidateRequired implements Validable{

    //fun (scortcut)
    public function isValid($value)
    {
        //trim elimina gli spazi bianchi(tab, spazi, \n\r\t\v\x00...)
        // '    '        => ''

    // posso scrivere tutto in una riga trim(strip_tag($value))
        $strip_tag = strip_tags($value);
        $valueWidoutSpace = trim($strip_tag);

        // var_dump($value);
        // var_dump($valueWidoutSpace);

        if($valueWidoutSpace == '') {
            return false;
        }
        return $valueWidoutSpace;
    }


    public function getMessage()
    {
        return $this ->message;
    }
}

?>