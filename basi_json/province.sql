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


	SELECT regione_id from regioni
	where nome = 'marche';