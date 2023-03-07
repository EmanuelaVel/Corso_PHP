<?php
//spegenre errori a livello di server e anche runtime(durante esecuzione) 
//error_reporting(E_ALL);   // E_ALL -> per accendere tutti gli errori
//error_reporting(0);  // 0  ->  per spegnere tutti gli errori, l'errore c'è ma non lo fa vedere

echo "<pre>" . print_r($_POST, true) . "</pre>";
/** Aggiungere la validazione del nome utente, deve essere un email corretta */
require "../class/validator/Validable.php";
require "../class/validator/ValidateRequired.php";
require "../class/validator/ValidateDate.php";
require "../class/validator/ValidateMail.php";
//require "./class/validator/ValidatePassword.php";

// print_r($_SERVER['REQUEST_METHOD']);
print_r($_POST);

$validator_Name = new ValidateRequired('', 'Il nome è obbligatorio');
$validator_LastName = new ValidateRequired('', 'Il cognome è obbligatorio');
$validator_Date = new ValidateRequired('', 'La data di nascita è obbligatorio');
$validator_Birthplace = new ValidateRequired('', 'Il luogo di nascita è obbligatorio');
$validator_Gender = new ValidateRequired('', 'Il genere è obbligatorio');

$validator_Email = new ValidateRequired('', "l'Username è obbligatorio");
$validator_Password = new ValidateRequired('', 'La Password è obbligatoria');



var_dump($validator_Name->getValid());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "dati inviati adesso li devo controllare";

    $validated_Name = $validator_Name->isValid($_POST['first_name']);
    $validated_LastName = $validator_LastName->isValid($_POST['last_name']);
    $validated_Date = $validator_Date->isValid($_POST['birthday']);
    $validated_Birthplace = $validator_Birthplace->isValid($_POST['birth_place']);
    //$value = isset($_POST['gender'])? $_POST['gender'] : '';
    $validated_Gender = $validator_Gender->isValid($value);
    $validated_Email = $validator_Email->isValid($_POST['username']);
    $validated_Password = $validator_Password->isValid($_POST['password']);
}

// } else {
//      echo "l'utente deve ancora compilare il form";
// }

// is-invalid
//<input type="text" class="form-control is-invalid" name="first_name" id="first_name">

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
    <title>Bootstrap demo</title>
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
                        <input type="text" 
                            value="<?= $validator_Name->getValue() ?>" 
                            class="form-control <?php echo !$validator_Name->getValid() ? 'is-invalid' : '' ?>" 
                            name="first_name" 
                            id="first_name"
                        >
                        <?php
                        //var_dump($validator_Name->getValid());
                            if (!$validator_Name->getValid()): ?>
                            <div class="invalid-feedback">
                                <!-- L'equivalente di (< ?php echo ... ?>) è (<=...?>)-->
                            <?= $validator_Name->getMessage() ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Cognome</label>
                        <input type="text" 
                            value="<?= $validator_LastName->getValue() ?>" 
                            class="form-control <?php echo !$validator_LastName->getValid() ? 'is-invalid' : '' ?>" 
                            name="last_name" 
                            id="last_name">
                        <?php
                             if (!$validator_LastName->getValid()) : ?>
                             <div class="invalid-feedback">
                             <?= $validator_LastName->getMessage() ?>
                             </div>
                        <?php endif ?>
                    </div>

                    <div class="mb-3">
                        <label for="birthday" class="form-label">Data di nascita</label>
                        <input type="date" 
                        class="form-control" 
                        name="birthday" id="birthday">
                            <div class="invalid-feedback">errore
                            </div>
                    </div>

                    <div class="mb-3">
                        <label for="birth_place" class="form-label">Luogo di nascita</label>
                        <input type="text" 
                        value="<?= $validator_Birthplace->getValue() ?>" 
                        class="form-control <?php echo !$validator_Birthplace->getValid() ? 'is-invalid' : '' ?> "
                        name="birth_place" id="birth_place">
                            <?php
                             if (!$validator_Birthplace->getValid()) : ?>
                             <div class="invalid-feedback">
                             <?= $validator_Birthplace->getMessage() ?>
                             </div>
                        <?php endif ?>
                    </div>


                    <div class="mb-3">
                        <span>Genere</span>
                        <div class="form-check">
                            <!-- TO DO: METTERE IS VALID SU ENTRAMBI I GENERI -->
                            <input class="form-check-input " 
                            type="radio" name="gender" value="M" 
                            id="gender_M">
                            <label class="form-check-label" for="gender_M">
                                Maschile
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" 
                            type="radio" name="gender" value="F" id="gender_F">
                            <label class="form-check-label" for="gender_F">
                                Femminile
                            </label>
                          
                             <div class="invalid-feedback">
                            
                             </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label ">Nome utente/Email</label>
                        <input type="text" 
                        value="<?= $validator_Email->getValue() ?>" 
                        class="form-control <?php echo !$validator_Email->getValid() ? 'is-invalid' : '' ?>" 
                        name="username" 
                        id="username">
                        <?php
                             if (!$validator_Email->getValid()) : ?>
                             <div class="invalid-feedback">
                             <?= $validator_Email->getMessage() ?>
                             </div>
                        <?php endif ?>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" 
                        value="<?= $validator_Password->getValue() ?>" 
                        class="form-control <?php echo !$validator_Password->getValid() ? 'is-invalid' : '' ?> " 
                        name="password" 
                        id="password">
                        <?php
                             if (!$validator_Password->getValid()) : ?>
                             <div class="invalid-feedback">
                             <?= $validator_Password->getMessage() ?>
                             </div>
                        <?php endif ?>
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