<?php
// ValidateRequired campo obbligatorio, quindi non deve essere vuoto
// false

require "./form_in_php/class/validator/ValidateRequired.php";

//array
//suddivi de ogni caso in cosa mette dentro, e cosa mi aspetto
$testCase = [
    //true stampa 1
    //false non stampa nulla
    [
        //validazione
        'input' => '        ',
        'expected' => false,
    ],
    // spech= test
    [
        'input' => 'ciao ',
        'expected' => 'ciao'
    ],
    [
        //pulizia
        'input' => '  ciao ',
        'expected' => 'ciao' 
    ],
    [
        'input' => ' ciao',
        'expected' => 'ciao' 
    ],
    [
        'input' => '',
        'expected' => false 
    ],
    [
        //togliere i tag
        'input' => '<h1>ciao</h1>',
        'expected' => 'ciao'
    ],
    [
        'input' => '<b>ciao</b>',
        'expected' => 'ciao'
    ],
    [
        'input' => 'ciao</b>',
        'expected' => 'ciao'
    ],
    [
        'input' => '<b>ciao',
        'expected' => 'ciao'
    ],
    [
        'input' => '<b>   </b>',
        'expected' => false
    ],
    [
        'input' => '<b></b>  ',
        'expected' => false
    ],
    [
        'input' => '<b>  ',
        'expected' => false
    ],
    [
        'input' => 20,
        'expected' => 20
    ],
    [
        'input' => 0,
        'expected' => 0
    ]
];
//se non uso http posso farlo girare anche solo da browser


//test è un array
foreach ($testCase as $key => $test) {
    $input = $test['input'];
    $expected = $test['expected'];

    //tipo di validazione: validazione di tipo obbligatoria
    $v = new ValidateRequired();

    //quello che mi aspetto
    if($v->isValid($input) != $expected){
        echo "\nTest numero $key non superato mi aspettavo: ";
        var_dump($expected);
        echo "\nma ho trovato ";
        var_dump($v->isValid($input));

      //  echo stampa solo valori semplici, (string e numeri), ma non si riescono a capire gli spazi
    //var_dump  se c è una striga vuota con 2 spazi mi scrive: stringa 2, mi sccrive false...

    };

    //print_r($test['input']);


    //le classi sono tipi personalizzati
    //se hai una classe che descrive le date, vuol dire che hai creato una classe personalizzata
}