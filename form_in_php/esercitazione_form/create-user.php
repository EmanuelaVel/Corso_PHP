<?php
//spegenre errori a livello di server e anche runtime(durante esecuzione) 
error_reporting(E_ALL);   // E_ALL -> per accendere tutti gli errori
//error_reporting(0);  // 0  ->  per spegnere tutti gli errori, l'errore c'è ma non lo fa vedere

echo "<pre>" . print_r($_POST, true) . "</pre>";

require "../class/validator/Validable.php";
require "../class/validator/ValidateRequired.php";

//print_r($_POST);

$first_name=  new ValidateRequired('', 'Il nome è obbligatorio');
$last_name =  new ValidateRequired('', 'Il cognome è obbligatorio');
$birtday =  new ValidateRequired('', 'La data di nascita è obbligatorio');
$birth_place =  new ValidateRequired('', 'Il luogo di nascita è obbligatorio');
$gender =  new ValidateRequired('', 'Il nome è obbligatorio');


var_dump($validator_Name->getValid());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "dati inviati adesso li devo controllare";

    $first_name->isValid($_POST['first_name']);
    $last_name->isValid($_POST['last_name']);
    $birth_place->isValid($_POST['birth_place']);
    $gender->isValid($_POST['gender']);
    $validated_Mail = $validator_Mail->isValid($_POST['username']);
}


/* Questo script viene eseguito quando visualizzo per la "prima volta" il FORM di registrazione*/
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //$validatedName = false; per non far scattare il warning oppure usare isset
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form di registrazione PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <header class="bg-light p-1">
        <h1 class="display-6">Applicazione demo</h1>
    </header>

    <main class="container">

        <section class="row">
            <div class="col-sm-3">
            </div>

            <div class="col-sm-6">

                <form class="mt-1 mt-md-5" action="create-user.php" method="POST">

                    <div class="mb-3">
                        <label for="first_name" class="form-label">Nome</label>
                        <!--   </?=   scorciatoia per echo (senza /) -->
                        <input type="text" 
                            value="<?= $validator_Name->getValue() ?>" 
                            class="form-control <?php echo !$validator_Name->getValid() ? 'is-invalid' : '' ?>" 
                            name="first_name" 
                            id="first_name"
                        >

                        <!-- ToDo: mettere is-invalid -->
                        <?php
                        //var_dump($validator_Name->getValid());
                            if (!$validator_Name->getValid()) { ?>
                            <div class="invalid-feedback">
                            <?php echo $validator_Name->getMessage() ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Cognome</label>
                        <input type="text" class="form-control <?php echo $isValid_Last_Name_Class ?>" name="last_name" id="last_name">
                        <?php
                        if (isset($validated_Last_Name) && !$validated_Last_Name) { ?>
                            <div class="invalid-feedback">errore
                            </div>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <label for="birthday" class="form-label">Data di nascita</label>
                        <input type="date" class="form-control <?php echo $isValid_Birthday ?>" name="birthday" id="birthday">
                        <?php
                        if (isset($validated_Birthday) && !$validated_Birthday) { ?>
                            <div class="invalid-feedback">errore
                            </div>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <label for="birth_place" class="form-label">Luogo di nascita</label>
                        <input type="text" class="form-control <?php echo $isValid_Birth_Place ?> " name="birth_place" id="birth_place">
                        <?php
                        if (isset($validated_Birth_Place) && !$validated_Birth_Place) { ?>
                            <div class="invalid-feedback">errore
                            </div>
                        <?php } ?>
                    </div>


                    <div class="mb-3">
                        <span>Genere</span>
                        <div class="form-check">
                            <!-- TO DO: METTERE IS VALID SU ENTRAMBI I GENERI -->
                            <input class="form-check-input <?php echo $isValid_Gender ?> " type="radio" name="gender" value="M" id="gender_M">
                            <label class="form-check-label" for="gender_M">
                                Maschile
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input <?php echo $isValid_Gender ?> " type="radio" name="gender" value="F" id="gender_F">
                            <label class="form-check-label" for="gender_F">
                                Femminile
                            </label>
                            <?php
                            if (isset($validated_Gender) && !$validated_Gender) : ?>
                                <div class="invalid-feedback">errore
                                </div>
                            <?php 
                            endif //if() : endif sintassi alternativa if
                            ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label ">Nome utente</label>
                        <input type="text" class="form-control <?php echo $isValid_Username ?>" name="username" id="username">
                        <?php
                        if (isset($validated_Username) && !$validated_Username) { ?>
                            <div class="invalid-feedback">errore
                            </div>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control <?php echo $isValid_Passwords ?> " name="password" id="password">
                        <?php
                        if (isset($validated_Password) && !$validated_Password) { ?>
                            <div class="invalid-feedback">errore
                            </div>
                        <?php } ?>
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit">Registrati</button>

                </form>

            </div>

            <div class="col-sm-3">
            </div>

        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>