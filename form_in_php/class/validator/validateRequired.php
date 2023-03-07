<?php
/*
   - [x] Preservare il valore iniziale valido (e ripulito-sanitizer) del campo di testo
   - visualizzare il messaggio di errore per il singolo campo
   - [x] sapere se c'è un errore ** is valid() **
   - [x] ripulire e controllare i valori (sicurezza)
   - ogni validazione ha il suo messaggio di errore
   - impostare la classe di bootstrap 'is-invalid'
*/

class ValidateRequired implements Validable {

    /** @var string rappresenta il valore immesso nel Form ripulito //non è un annotazione, non svolgerà nulla */
    /* Attributi*/ 
    private $value;
    private $message;
    private $hasMessage;
    /* se il valore è valido e se devo visualizzaare il messaggio */
    private $valid;

    //con   suggerimento
    public function __construct($default_value='', $message='è obbligatorio') {
      $this->value = $default_value;
      $this->message = $message;
      $this->valid = true;

      // $this->value = 'sono il valore predefinito';
    }

    
    public function isValid($value)
    // ritorna o false o valueWithoutSpace
    {
        // '    '        => ''
        
        //$valueWithoutSpace = trim(strip_tags($value));

        // posso scrivere tutto in una riga trim(strip_tag($value))
        // strip_tags() — Elimina i tag HTML e PHP da una stringa
        $strip_tag = strip_tags($value);
        //trim() — Elimina gli spazi bianchi (o altri caratteri) dall'inizio e dalla fine di una stringa
        $valueWithoutSpace = trim($strip_tag);
        
        if($valueWithoutSpace == ''){
          $this->valid = false;
            return false;
        }

        $this->value = $valueWithoutSpace;
        return $valueWithoutSpace;     
    }


      //fun  suggerimento
      public function getValue()
      {
        return $this->value;
      }

      public function getMessage()
      {
        return $this->message;
      }

      public function getValid()
      {
        return $this->valid;
      }


      }

?>