<?php

require "./form_in_php/class/validator/Validateble.php";
require "./form_in_php/class/validator/ValidateDate.php";


$testCase = [
  
    [
        'input' => '08/09/2019',
        'expected' => '08/09/2019',
    ],
    [
        'input' => '   08/09/2019   ',
        'expected' => '08/09/2019'
    ],
    [
        'input' => '33/09/2019',
        'expected' => false
    ],
    [
        'input' => '08/09/2019',
        'expected' => '08/09/2019'
    ],
    [
        'input' => '08/33/2019' ,
        'expected' => false
    ],
    [
        'input' => '08/09/2019',
        'expected' => '08/09/2019' 
    ],
    [
        'input' => '08/09/20193',
        'expected' => false 
    ],
    [
        'input' => '08-09-2019',
        'expected' => false
    ],
   
];


foreach ($testCase as $key => $test) {
    $input = $test['input'];
    $expected = $test['expected'];

    $v = new ValidateDate();

    if($v->isValid($input) != $expected){
        echo "\nTest numero $key non superato mi aspettavo\n ";
        var_dump($expected);
        echo "\nma ho trovato\n";
        var_dump($v->isValid($input));


    };
}
    //print_r($test['input']);


?>