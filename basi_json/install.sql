-- SQLBook: Code
-- 
use form_in_php;

CREATE TABLE regioni (
	regione_id int NOT NULL AUTO_INCREMENT,
	nome VARCHAR (255) NOT NULL,
	PRIMARY KEY (regione_id)
	) ;
	
INSERT INTO regioni (nome) VALUE ('Abruzzo');
	
SELECT * FROM regioni;

INSERT INTO regioni(nome) VALUES('Valle d\'Aosta/Vallée d\'Aoste');


