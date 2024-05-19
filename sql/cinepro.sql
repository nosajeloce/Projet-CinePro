CREATE DATABASE cinepro;
USE cinepro;

CREATE TABLE compte(
    id_compte INT PRIMARY KEY AUTO_INCREMENT,
    prenom VARCHAR(50) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    courriel VARCHAR(80) NOT NULL UNIQUE,
    pwd VARCHAR(50) NOT NULL,
    type_compte ENUM("client","agent","admin") NOT NULL,
    nombre_points INT,
    nombre_billets_gratuits INT
    
);

CREATE TABLE cinema(
    id_cinema INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(60) NOT NULL,
    adresse VARCHAR(60) NOT NULL,
    ville VARCHAR(60) NOT NULL,
    province VARCHAR(20) NOT NULL,
    code_postal VARCHAR(7) NOT NULL,
    CONSTRAINT contrainte_cinemas UNIQUE (adresse,ville,province,code_postal)
);

CREATE TABLE salle(
    id_salle INT PRIMARY KEY AUTO_INCREMENT,
    numero_salle INT NOT NULL,
    id_cinema INT NOT NULL,
    FOREIGN KEY (id_cinema) REFERENCES cinema(id_cinema)
);

CREATE TABLE siege(
    id_siege INT PRIMARY KEY AUTO_INCREMENT,
    code_siege VARCHAR(3) NOT NULL,
    id_salle INT NOT NULL,
    FOREIGN KEY (id_salle) REFERENCES salle(id_salle)
);


CREATE TABLE horaire(
    id_horaire INT PRIMARY KEY AUTO_INCREMENT,
    date_heure DATETIME NOT NULL
);

-- Attendre après les tables Akram, Youcef et Moubarak avant de d'exécuter le code de cette table.
CREATE TABLE reservation(
    id_reservation INT PRIMARY KEY AUTO_INCREMENT,
    reserve TINYINT(1) NOT NULL,
    id_film INT NOT NULL,
    id_cinema INT NOT NULL,
    id_siege INT NOT NULL,
    id_horaire INT NOT NULL,
    id_compte_client INT,
    CONSTRAINT contrainte_reservations UNIQUE (id_film,id_cinema,id_siege,id_horaire),
    FOREIGN KEY (id_film) REFERENCES film(id_film),
    FOREIGN KEY (id_cinema) REFERENCES cinema(id_cinema),
    FOREIGN KEY (id_siege) REFERENCES siege(id_siege),
    FOREIGN KEY (id_horaire) REFERENCES horaire(id_horaire),
    FOREIGN KEY (id_compte_client) REFERENCES compte(id_compte)
);


INSERT INTO cinema (nom,adresse, ville,province,code_postal) VALUES ("Starlight Cinema","48 Kenmount Rd","St. John's","NL","A1B 1W3");
INSERT INTO cinema (nom,adresse, ville,province,code_postal) VALUES ("Burin Cinema","1 Pleasantview Rd","Burin Bay Arm","NL","A0E 1G0");
INSERT INTO cinema (nom,adresse, ville,province,code_postal) VALUES ("Sydney Cinema","325 Prince St","Sydney","NS","B1P 5K6");
INSERT INTO cinema (nom,adresse, ville,province,code_postal) VALUES ("Scotiabank theater","190 Chain Lake Dr","Halifax","NS","B3S 1C5");
INSERT INTO cinema (nom,adresse, ville,province,code_postal) VALUES ("Cinema C","27 rue Costigan","Edmundston","NB","E3V 1W7");
INSERT INTO cinema (nom,adresse, ville,province,code_postal) VALUES ("Atlantic Cinemas","115 Everett St","Woodstock","NB","E7M 3R1");
INSERT INTO cinema (nom,adresse, ville,province,code_postal) VALUES ("Charlottetown Cinema","670 University Ave","Charlottetown","PE","C1A 7M4");
INSERT INTO cinema (nom,adresse, ville,province,code_postal) VALUES ("Cinemas summerside","130 Ryan St","Summerside","PE","C1N 6G2");
INSERT INTO cinema (nom,adresse, ville,province,code_postal) VALUES ("Cinema Odeon Ste-Foy","1200, A. 540","Québec","QC","G2G 2B5");
INSERT INTO cinema (nom,adresse, ville,province,code_postal) VALUES ("Ste-Catherine Cinema","2313 Saint-Catherine St W #101","Montreal","QC","H3H 1N2");
INSERT INTO cinema (nom,adresse, ville,province,code_postal) VALUES ("Victoria Cinema","141 Ontario St N","Kitchener","ON","N2H 4Y5");
INSERT INTO cinema (nom,adresse, ville,province,code_postal) VALUES ("Dundas Cinema","10 Dundas St E #402","Toronto","ON","M5B 2G9");
INSERT INTO cinema (nom,adresse, ville,province,code_postal) VALUES ("Winnipeg Cinema","1225 St Mary's Rd #160","Winnipeg","MB","R2M 5E5");
INSERT INTO cinema (nom,adresse, ville,province,code_postal) VALUES ("McGillivray theater","2190 McGillivray Blvd","Winnipeg","MB","R3Y 1S6");
INSERT INTO cinema (nom,adresse, ville,province,code_postal) VALUES ("Saskatoon theater","347 2 Ave S","Saskatoon","SK","S7K 1L1");
INSERT INTO cinema (nom,adresse, ville,province,code_postal) VALUES ("Roxy theater","320 20th St W","Saskatoon","SK","S7M 0X2");
INSERT INTO cinema (nom,adresse, ville,province,code_postal) VALUES ("Sherwood Park","2020 Sherwood Dr","Sherwood Park","AB","T8A 3H9");
INSERT INTO cinema (nom,adresse, ville,province,code_postal) VALUES ("Pacific cinemas","5 St SW","Calgary","AB","T2H 0L1");
INSERT INTO cinema (nom,adresse, ville,province,code_postal) VALUES ("The Park Theater","3440 Cambie St","Vancouver","BC","V5Z 2W8");
INSERT INTO cinema (nom,adresse, ville,province,code_postal) VALUES ("Burrard Cinema","2110 Burrard St","Vancouver","BC","V6J 3H6");

INSERT INTO horaire (date_heure) VALUES ("2024-05-24 14:00");
INSERT INTO horaire (date_heure) VALUES ("2024-05-24 16:00");
INSERT INTO horaire (date_heure) VALUES ("2024-05-24 18:00");
INSERT INTO horaire (date_heure) VALUES ("2024-05-24 20:00");
INSERT INTO horaire (date_heure) VALUES ("2024-05-25 14:00");
INSERT INTO horaire (date_heure) VALUES ("2024-05-25 16:00");
INSERT INTO horaire (date_heure) VALUES ("2024-05-25 18:00");
INSERT INTO horaire (date_heure) VALUES ("2024-05-25 20:00");
INSERT INTO horaire (date_heure) VALUES ("2024-05-26 14:00");
INSERT INTO horaire (date_heure) VALUES ("2024-05-26 16:00");
INSERT INTO horaire (date_heure) VALUES ("2024-05-26 18:00");
INSERT INTO horaire (date_heure) VALUES ("2024-05-26 20:00");
INSERT INTO horaire (date_heure) VALUES ("2024-05-27 14:00");
INSERT INTO horaire (date_heure) VALUES ("2024-05-27 16:00");
INSERT INTO horaire (date_heure) VALUES ("2024-05-27 18:00");
INSERT INTO horaire (date_heure) VALUES ("2024-05-27 20:00");
INSERT INTO horaire (date_heure) VALUES ("2024-05-28 14:00");
INSERT INTO horaire (date_heure) VALUES ("2024-05-28 16:00");
INSERT INTO horaire (date_heure) VALUES ("2024-05-28 18:00");
INSERT INTO horaire (date_heure) VALUES ("2024-05-28 20:00");