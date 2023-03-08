-- SQLBook: Code
use form_in_php;

CREATE TABLE province (
	province_id INT NOT NULL AUTO_INCREMENT,
	nome VARCHAR (255) NOT NULL,
	sigla VARCHAR (2) NOT NULL,
	PRIMARY KEY (province_id)
	);

	CREATE TABLE province (
	province_id INT NOT NULL AUTO_INCREMENT,
	nome VARCHAR (255) NOT NULL,
	sigla VARCHAR (2) NOT NULL,
	regione_id int NOT NULL,
	PRIMARY KEY (province_id)
	);


	SELECT regione_id FROM regioni
	WHERE nome = 'Marche';


	-- Agrigento --> Sicilia
	/*
	{
    "nome": "Agrigento",
    "sigla": "AG",
    "regione": "Sicilia"
	"regione_id": 15
   },
  	*/
SELECT regione_id FROM regioni WHERE nome ='Sicilia';
-- regione 15 


/*
$conn -> query("SELECT regione_id FROM regioni WHERE nome ='$regione';");

//viene restituioto un oggetto da cui possiamo ottentere risultato
$regione_id= $pdo_stn->fetchColumn();
print_r($regione_id);
*/
INSERT INTO province (nome, sigla, regione_id)
VALUES('Agrigento', 'AG', 15)