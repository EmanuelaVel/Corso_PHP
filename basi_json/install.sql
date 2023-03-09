use form_in_php;

	DROP TABLE regioni;

CREATE TABLE regioni (
	regione_id int NOT NULL AUTO_INCREMENT,
	nome VARCHAR (255) NOT NULL,
	PRIMARY KEY (regione_id)
	) ;
	
	DROP TABLE province;


	CREATE TABLE province (
	provincia_id INT NOT NULL AUTO_INCREMENT,
	nome VARCHAR (255) NOT NULL,
	sigla VARCHAR (2) NOT NULL,
	regione_id int NOT NULL,
	PRIMARY KEY (provincia_id),
	FOREIGN KEY (regione_id) REFERENCES regioni(regione_id)

	);

INSERT INTO regioni (nome) VALUE ('Abruzzo');

INSERT INTO regioni(nome) VALUES('Valle d\'Aosta/Vallée d\'Aoste');


