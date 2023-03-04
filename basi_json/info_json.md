**JSON**
stringa **[]**  //era un ARRAY
stringa **{}**  //era un OGGETTO


**ENCODE()**
array php   -> stringa **[]** //era un ARRAY
oggetto php -> stringa **{}** //era un OGGETTO


**DECODE()**
stringa **[]** -> array php
stringa **{}** -> oggetto php

stringa **{}** -> json_decode($stringa, **true**) -> array associativo php


**STRINGA** JSON
```JSON
[
  {
    "nome": "Agrigento",
    "sigla": "AG",
    "regione": "Sicilia"
  },
  {
    "nome": "Alessandria",
    "sigla": "AL",
    "regione": "Piemonte"
  }
]
```

dopo `json_decode($stringa_JSON)`
**ARRAY di OGGETTI
```PHP
Array
(
    [0] => stdClass Object
        (
            [nome] => Agrigento
            [sigla] => AG
            [regione] => Sicilia
        )

    [1] => stdClass Object
        (
            [nome] => Alessandria
            [sigla] => AL
            [regione] => Piemonte
        )
)
```


dopo  `json_decode($stringa_JSON, true)`
Array di Array associativi
```PHP
Array
(
    [0] => Array
        (
            [nome] => Agrigento
            [sigla] => AG
            [regione] => Sicilia
        )

    [1] => Array
        (
            [nome] => Alessandria
            [sigla] => AL
            [regione] => Piemonte
        )
)
```



