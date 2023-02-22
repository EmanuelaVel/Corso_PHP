<?php


class ValidateDate implements Validable {

    public function isValid($value) 
    {
        $sanitize = trim(strip_tags($value));

        $dt = DateTime::createFromFormat('d/m/Y', $sanitize);
        //echo $value."\n";
       //var_dump($dt);
        echo $dt -> format('d/m/Y') . " === " . $sanitize . "\n";
        print_r($dt && $dt->format('d/m/Y') === $sanitize); 

        //per interrompere
        die();

        if($dt && $dt->format('d/m/Y') === $sanitize) {
            return $dt->format('d/m/Y');
        } else {
            return false;
        };
    }


   public function message()
{
    return 'data non valida';
}

}




// class ValidateData implements Validable {
// // is valid è un metodo
//     public function isValid(string $date) : bool {
// // explode è una funzione
//         $parametriData = explode("-", $date);
//         $anno = $parametriData[0];
//         $mese = $parametriData[1];
//         $giorno = $parametriData[2];
        
        
//         return checkdate($mese, $giorno, $anno);
        
//     }
// }
