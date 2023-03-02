<?php
//spegenre errori a livello di server e anche runtime(durante esecuzione) 
//Per visualizzare gli errori
error_reporting(E_ALL);   // E_ALL -> per accendere tutti gli errori
//error_reporting(0);  // 0  ->  per spegnere tutti gli errori, l'errore c'è ma non lo fa vedere

echo "<pre>" . print_r($_POST, true) . "</pre>";

require "../class/validator/Validable.php";
require "../class/validator/ValidateRequired.php";

//print_r($_POST);

$validator_Name =  new ValidateRequired('', 'Il nome è obbligatorio');

var_dump($validator_Name->getValid());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "dati inviati adesso li devo controllare";

    $validated_Name = $validator_Name->isValid($_POST['first_name']);
}


/* Questo script viene eseguito quando visualizzo per la "prima volta" il FORM di registrazione*/
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //$validatedName = false; per non far scattare il warning oppure usare isset
}


?>

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
                ciccio
            </div>

            <div class="col-sm-6">

                <form class="mt-1 mt-md-5" action="create-user.php" method="POST">

                    <div class="mb-3">
                        <label for="first_name" class="form-label">Nome</label>
                        <input type="text" value="<?= $validator_Name->getValue() ?>" class="form-control <?php echo !$validator_Name->getValid() ? 'is-invalid' : '' ?>" name="first_name" id="first_name">
                        <!-- <input type="text" value="</?php echo $_POST['first_name'] ?>" class="form-control </?php echo $isValidNameClass ?>" name="first_name" id="first_name" > -->
                        <!--   </?=   scorciatoia per echo (senza /) -->

                        <!-- ToDo: mettere is-invalid -->
                        <?php
                        var_dump($validator_Name->getValid());
                        // GET isset($validated_Name) prova a usare una variabile e se non esiste(false) non dà warning
                        //POST isset($validated_Name) in questo caso dà true, nel nostro caso
                        if ($validator_Name->getValid()) { ?>
                            <div class="invalid-feedback">
                                <?php echo $validator_Name->getMessage() ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Cognome</label>
                        <input type="text" class="form-control <?php echo $isValid_Last_name_Class ?>" name="last_name" id="last_name">
                        <?php
                        if (isset($validated_Last_name) && !$validated_Last_name) { ?>
                            <div class="invalid-feedback">errore
                            </div>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <label for="birthday" class="form-label">Data di nascita</label>
                        <input type="date" class="form-control <?php echo $isValid_Birthday_Class ?>" name="birthday" id="birthday">
                        <?php
                        if (isset($validated_Birthday) && !$validated_Birthday) { ?>
                            <div class="invalid-feedback">errore
                            </div>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <label for="birth_place" class="form-label">Luogo di nascita</label>
                        <input type="text" class="form-control <?php echo $isValid_Birth_place ?> " name="birth_place" id="birth_place">
                        <?php
                        if (isset($validated_Birth_place) && !$validated_Birth_place) { ?>
                            <div class="invalid-feedback">errore
                            </div>
                        <?php } ?>
                    </div>

                    <!-- <div class="mb-3">
                        <label for="birth_place" class="form-label">Luogo di nascita</label>
                        <select name="birth_place" id="birth_place">
                            <option value="">Seleziona</option>
                            <option value="ag">agrigento</option>
                            <option value="al">alessandria</option>
                            <option value="an">ancona</option>
                            <option value="ao">aosta</option>
                            <option value="ar">arezzo</option>
                            <option value="ap">ascoli piceno</option>
                            <option value="at">asti</option>
                            <option value="av">avellino</option>
                            <option value="ba">bari</option>
                            <option value="bt">barletta-andria-trani</option>
                            <option value="bl">belluno</option>
                            <option value="bn">benevento</option>
                            <option value="bg">bergamo</option>
                            <option value="bi">biella</option>
                            <option value="bo">bologna</option>
                            <option value="bz">bolzano</option>
                            <option value="bs">brescia</option>
                            <option value="br">brindisi</option>
                            <option value="ca">cagliari</option>
                            <option value="cl">caltanissetta</option>
                            <option value="cb">campobasso</option>
                            <option value="ci">carbonia-iglesias</option>
                            <option value="ce">caserta</option>
                            <option value="ct">catania</option>
                            <option value="cz">catanzaro</option>
                            <option value="ch">chieti</option>
                            <option value="co">como</option>
                            <option value="cs">cosenza</option>
                            <option value="cr">cremona</option>
                            <option value="kr">crotone</option>
                            <option value="cn">cuneo</option>
                            <option value="en">enna</option>
                            <option value="fm">fermo</option>
                            <option value="fe">ferrara</option>
                            <option value="fi">firenze</option>
                            <option value="fg">foggia</option>
                            <option value="fc">forli’-cesena</option>
                            <option value="fr">frosinone</option>
                            <option value="ge">genova</option>
                            <option value="go">gorizia</option>
                            <option value="gr">grosseto</option>
                            <option value="im">imperia</option>
                            <option value="is">isernia</option>
                            <option value="sp">la spezia</option>
                            <option value="aq">l’aquila</option>
                            <option value="lt">latina</option>
                            <option value="le">lecce</option>
                            <option value="lc">lecco</option>
                            <option value="li">livorno</option>
                            <option value="lo">lodi</option>
                            <option value="lu">lucca</option>
                            <option value="mc">macerata</option>
                            <option value="mn">mantova</option>
                            <option value="ms">massa-carrara</option>
                            <option value="mt">matera</option>
                            <option value="vs"> medio campidano</option>
                            <option value="me">messina</option>
                            <option value="mi">milano</option>
                            <option value="mo">modena</option>
                            <option value="mb">monza e della brianza</option>
                            <option value="na">napoli</option>
                            <option value="no">novara</option>
                            <option value="nu">nuoro</option>
                            <option value="og">ogliastra</option>
                            <option value="ot">olbia-tempio</option>
                            <option value="or">oristano</option>
                            <option value="pd">padova</option>
                            <option value="pa">palermo</option>
                            <option value="pr">parma</option>
                            <option value="pv">pavia</option>
                            <option value="pg">perugia</option>
                            <option value="pu">pesaro e urbino</option>
                            <option value="pe">pescara</option>
                            <option value="pc">piacenza</option>
                            <option value="pi">pisa</option>
                            <option value="pt">pistoia</option>
                            <option value="pn">pordenone</option>
                            <option value="pz">potenza</option>
                            <option value="po">prato</option>
                            <option value="rg">ragusa</option>
                            <option value="ra">ravenna</option>
                            <option value="rc">reggio di calabria</option>
                            <option value="re">reggio nell’emilia</option>
                            <option value="ri">rieti</option>
                            <option value="rn">rimini</option>
                            <option value="rm">roma</option>
                            <option value="ro">rovigo</option>
                            <option value="sa">salerno</option>
                            <option value="ss">sassari</option>
                            <option value="sv">savona</option>
                            <option value="si">siena</option>
                            <option value="sr">siracusa</option>
                            <option value="so">sondrio</option>
                            <option value="ta">taranto</option>
                            <option value="te">teramo</option>
                            <option value="tr">terni</option>
                            <option value="to">torino</option>
                            <option value="tp">trapani</option>
                            <option value="tn">trento</option>
                            <option value="tv">treviso</option>
                            <option value="ts">trieste</option>
                            <option value="ud">udine</option>
                            <option value="va">varese</option>
                            <option value="ve">venezia</option>
                            <option value="vb">verbano-cusio-ossola</option>
                            <option value="vc">vercelli</option>
                            <option value="vr">verona</option>
                            <option value="vv">vibo valentia</option>
                            <option value="vi">vicenza</option>
                            <option value="vt">viterbo</option>
                        </select>
                        <div class="invalid-feedback">errore</div>
                    </div> -->

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
                            <?php if ($validatedGender) : ?>
                                <div class="invalid-feedback">errore
                                </div>
                            <?php endif ?>
                        </div>


                        <?php
                        if (isset($validatedGender) && !$validatedGender) : ?>
                            <div class="invalid-feedback">
                                il genere è obbligatorio
                            </div>
                        <?php
                        endif //if() : endif sintassi alternativa if 
                        ?>



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
                        <input type="password" class="form-control <?php echo $isValid_Password_Class ?> " name="password" id="password">
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