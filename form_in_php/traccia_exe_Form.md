### Form di registrazione PHP
- usare bootstrap
- usare filter_input per ottenere le informazioni

in [azzurro] sono indicati gli attributi name da utilizzare

create-user.php

- nome [first_name]
- cognome [last_name]
- data di nascita [birthday]
- luogo di nascita [birth_place]
- sesso (M/F) [gender]

- nome utente [usename]
- password [password]


Pagina che riceve i dati
register-user.php

------------------------------
validazione lato server

- whitespace char restituisce una stringa   | campo obbligatorio
- non compilo stringa "" | campo obbligatorio
- se compilato restituisce una stringa | success

- null se il form non passa il valore | errore o campo obbligatorio

devo ripulire i dati inseriti  (<script>alert("ti ho fregato")</script>) XSS 

- nome first_name  obbligatorio 
- cognome last_name obbligatorio
- data di nascita birthday  obbligatorio / data / 
- luogo di nascita birth_place obbligatorio 
- sesso (M/F)  gender obbligatorio 

- nome utente/email  username  obbligatorio / unico
- password password

codice fiscale


“nome” =>   “text  | required”

Field 
- Sanitize
    - toglie itaf

- Required
    - isValid
    - message

	OnlyAphanumeric
    - isValid
    - message


- Email 


- EmailUnque
    - isValid
    - message


- PasswordSecurity
    - -isValid
    - message

	Comune
    - -isValid
    - message
	
- Date
    - format: dd/mm/aaaa
        - -isValid
        - message

    - isNotGreaterTo
        - -isValid
        - message
	




- controlla se tutto è stato compilato

FieldGroup Array<Field>
	- -isValid



