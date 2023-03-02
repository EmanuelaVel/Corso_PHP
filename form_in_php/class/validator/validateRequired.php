<?php
/*
   - Preservare il valore iniziale valido (e ripulito-sanitizer) del campo di testo
   - visualizzare il messaggio di errore per il singolo campo
   - sapere se c'è un errore ** is valid() **
   - ripulire e controllare i valori (sicurezza)
   - ogni validazione ha il suo messaggio di errore
   - impostare la classe di bootstrap is-invalid
*/

class ValidateRequired implements Validable {
/** @var string rappresenta il valore immesso nel Form ripulito //non è un annotazione, non svolgerà nulla */
   private $value = '';

//con   suggerimento
public function __construct() {
   $this->value = '';
}



 public function isValid($value)
 {
    // '    '        => ''
    
    // posso scrivere tutto in una riga trim(strip_tag($value))
    $strip_tag = strip_tags($value);
    $valueWidoutSpace = trim($strip_tag);

    if($valueWidoutSpace == ''){
        return false;
    }

    $this->value = $valueWidoutSpace;
    return $valueWidoutSpace;    
    
 }

//  public function message()
//  {
//     return 'campo obbligatorio';
//  }


//fun  suggerimento
public function getValue()
{
   return $this->value;    

}
}