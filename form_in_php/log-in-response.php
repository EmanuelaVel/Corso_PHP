<h1> sono la risposta (RESPONSE) </h1>

<?php

echo "get:Array";

echo"<pre>";
print_r($_GET);
echo"</pre>";

echo "post:Array";

echo"<pre>";
print_r($_POST);
echo"</pre>";

echo "La tua email è <br>";

//se sto entrando con il metodo post posso scrivre:$_POST
echo "<strong>".$_POST ['email']."</strong>";

?>