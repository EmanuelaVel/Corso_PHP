<?php
require 'C:\xampp\htdocs\Corso_PHP\form_in_php\class\validator\validateDate.php';
require 'C:\xampp\htdocs\Corso_PHP\form_in_php\class\validator\ValidateMail.php';
require 'C:\xampp\htdocs\Corso_PHP\form_in_php\class\validator\validateString.php';
require 'C:\xampp\htdocs\Corso_PHP\form_in_php\class\validator\validateGender.php';

//<pre>  per stampare i valori uno sotto l'altro
echo "<pre>";
//array
//stampa i valori in un array
print_r($_POST);
echo "</pre>";

//la chiave dell'array associativo è presa dal name del tag


$nome = filter_input(INPUT_POST, "first_name");
$cognome = filter_input(INPUT_POST, "last_name");
$data_di_nascita = filter_input(INPUT_POST, "birthday");
$luogo_di_nascita = filter_input(INPUT_POST, "birth_place");
$sesso = filter_input(INPUT_POST, "gender");
$email = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");



// if($nome==false /*or $cognome==false  or $data_di_nascita==false or 
// $luogo_di_nascita==false or $sesso==false or $nome_utente==false or $password==false*/) {
//     echo "\nLa registrazione non è valida\n";
// } else {
//     echo "Registrazione avvenuta con successo";
// }
//             echo "<br>--------------------------------<br>";

// print_r($data_di_nascita);
//             echo "<br>------------data--------------------<br>";


// $dataNascita = new ValidateData();
// var_dump($dataNascita -> isValid($data_di_nascita));
// $verificaDataNascita = $dataNascita -> isValid($data_di_nascita);
//             echo "<br>--------------------------------<br>";


// print_r($email) ;
//             echo "<br>------------------email--------------<br>";

//             //istanziamo oggetto
// $mail = new ValidateMail();

// // per richiamare i metodi in php si usa la freccia
// var_dump($mail -> isValid($email));
// $verificaEmail = $mail -> isValid($email);
// // if ($mail -> isValid($email) == false) {
// //     echo "Email non valida";
// // }else {
// //     echo "Email valida";
// // }
//             echo "<br>--------------gender------------------<br>";


// $gender = new validateGender();
// // $sesso = 'altro';
// var_dump($gender -> isValid($sesso));
// $verificaGender = $gender -> isValid($sesso);

//             echo "<br>--------------------------------<br>";


// $nome1 = new ValidateString();

// var_dump($nome1 -> isValid($nome));
// $verificaNome = $nome1 -> isValid($nome);

//             echo "<br>--------------------------------<br>";

// $cognome1 = new ValidateString();
// var_dump($cognome1-> isValid($cognome));
// $verificaCognome = $cognome1 -> isValid($cognome);
//             echo "<br>--------------------------------<br>";

// $luogo_di_nascita1 = new ValidateString();
// var_dump($luogo_di_nascita1 -> isValid($luogo_di_nascita));
// $verificaLuogoNascita = $luogo_di_nascita1 -> isValid($luogo_di_nascita);

//             echo "<br>--------------------------------<br>";

// $password1 = new ValidateString();
// var_dump($password1 -> isValid($password));
// $verificaPassword = $password1 -> isValid($password);

//             echo "<br>--------------------------------<br>";


// if($verificaNome==false or $verificaCognome==false  or $verificaDataNascita==false 
//     or $verificaLuogoNascita==false or $verificaGender==false 
//     or $verificaEmail==false or $verificaPassword==false) {
//     echo "\nLa registrazione non è valida\n";
// } else {
//     echo "Registrazione avvenuta con successo";
// }
echo "<br>--------------------------------<br>";


$errore = 0;
foreach ($_POST as $i => $value) {
    // echo $i;
    if ($i == 'birthday') {
        $dataNascita = new ValidateDate();
        $verificaDataNascita = $dataNascita->isValid($value);

        if ($verificaDataNascita == false) {
            echo "birthday è sbagliato<br>";
            $errore ++;
        }
    } elseif ($i == 'username') {
        $mail = new ValidateMail();
        $verificaEmail = $mail->isValid($value);

        if ($verificaEmail == false) {
            echo "username è sbagliato<br>";
            $errore ++;
        }
    } elseif ($i == 'gender') {
        $gender = new validateGender();
        $verificaGender = $gender->isValid($value);

        if ($verificaGender == false) {
            echo "gender è sbagliato<br>";
            $errore ++;
        }
    } else {
        $string = new ValidateString();
        $verificaString = $string->isValid($value);

        if ($verificaString == false) {
            echo $i . " è sbagliato<br>";
            $errore ++;
        }
    }
}
if ($errore == 0) {
    echo "Registrazione avvenuta con successo";
}else {
    echo "Registrazione fallita";
}
echo "<br>--------------------------------<br>";

var_dump($luogo_di_nascita);

