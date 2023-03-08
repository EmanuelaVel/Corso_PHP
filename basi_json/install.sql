-- SQLBook: Code
-- 
use form_in_php;

CREATE TABLE regioni (
	regione_id int NOT NULL AUTO_INCREMENT,
	nome VARCHAR (255) NOT NULL,
	PRIMARY KEY (regione_id)
	) ;
	
	insert into regioni (nome) VALUE ('Abruzzo');
	
	select * from regioni;

	INSERT INTO regioni(nome) VALUES('Valle d\'Aosta/Vallée d\'Aoste');


	CREATE TABLE province (
	province_id INT NOT NULL AUTO_INCREMENT,
	nome VARCHAR (255) NOT NULL,
	sigla VARCHAR (2) NOT NULL,
	PRIMARY KEY (province_id)
	);