# PHP


## Metodi HTTP

[Metodi HTTP](https://it.wikipedia.org/wiki/Hypertext_Transfer_Protocol#Messaggio_di_richiesta)


- **action** dove verranno elaborati i dati inviati dal form
- **method** il metodo della richiesta HTTP
    - GET Ottenere informazioni
        - [**query-string**](https://it.wikipedia.org/wiki/Query_string) : Formato con cui passo dei parametri via GET
    - POST Inserire nuove informazioni
- **attributo name di input** : Permette di etichettare e passare un valore



## PHP come ottenere dati dal protocollo HTTP

 - [Dealing with Forms](https://www.php.net/manual/en/tutorial.forms.php)
 - [php form w3school](https://www.w3schools.com/php/php_forms.asp)


- [filter input](https://www.php.net/manual/en/function.filter-input.php)
- [FILTER_TYPE](https://www.php.net/manual/en/filter.filters.php)


curl http://localhost/corso_php_mysql_2223/form_in_php/log-in-response.php?6=sbagliata


### Esercitazione Form di registrazione PHP

[Indicazioni su GDrive](https://docs.google.com/document/d/1BhIxn2iPE7wDeC9XsIIngQUCE5-YEo9LZZc6OqII6GU/edit?usp=sharing)

curl http://localhost/corso_php_mysql_2223/form_in_php/log-in-response.php?email=sbagliata

https://www.w3schools.com/sql/sql_injection.asp
https://github.com/minimaxir/big-list-of-naughty-strings

## Estensioni per php

PHP Intelephense
https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client


## esercitazione php 02

Validazione e test

Scrivere due classi *ValidateRequired* e *ValidateDate*

- ValidateRequired campo obbligatorio, quindi non deve essere vuoto
- ValidateDate stabilisce se la data inserita è una data esistente nel formato gg/mm/aaaa e restituisce false se non una data valida
