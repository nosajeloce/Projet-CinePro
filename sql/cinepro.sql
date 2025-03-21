USE if0_38002107_cinepro;

CREATE TABLE categorie(
    id_categorie INT PRIMARY KEY AUTO_INCREMENT,
    url_image VARCHAR(50) NOT NULL,
    titre VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE film(
    id_film INT PRIMARY KEY AUTO_INCREMENT,
    duree VARCHAR(5) NOT NULL,
    titre VARCHAR(50) NOT NULL,
    url_image VARCHAR(50) NOT NULL,
    bande_annonce VARCHAR(100) NOT NULL UNIQUE,
    prix float NOT NULL,
    id_categorie INT NOT NULL,
    FOREIGN KEY(id_categorie) REFERENCES categorie(id_categorie)
);

CREATE TABLE cinema(
    id_cinema INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    adresse VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE salle(
    id_salle INT PRIMARY KEY AUTO_INCREMENT,
    numero_salle ENUM("1","2","3") NOT NULL,
    id_cinema INT NOT NULL,
    FOREIGN KEY(id_cinema) REFERENCES cinema(id_cinema)
);

CREATE TABLE siege(
    id_siege INT PRIMARY KEY AUTO_INCREMENT,
    code VARCHAR(4) NOT NULL,
    id_salle INT NOT NULL,
    FOREIGN KEY(id_salle) REFERENCES salle(id_salle)
);

CREATE TABLE horaire(
    id_horaire INT PRIMARY KEY AUTO_INCREMENT,
    date_heure DATETIME NOT NULL
);

CREATE TABLE compte(
    id_compte INT PRIMARY KEY AUTO_INCREMENT,
    prenom VARCHAR(50) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    courriel VARCHAR(75) NOT NULL UNIQUE,
    pwd VARCHAR(50) NOT NULL,
    type_compte ENUM("client", "agent", "admin") NOT NULL,
    nombre_points INT,
    nombre_billets_gratuits INT
);

CREATE TABLE retroaction(
    id_retroaction INT PRIMARY KEY AUTO_INCREMENT,
    objet VARCHAR(50) NOT NULL,
    message_retroaction VARCHAR(500) NOT NULL,
    id_compte INT NOT NULL,
    FOREIGN KEY(id_compte) REFERENCES compte(id_compte)

);

CREATE TABLE item_recompense(
    id_item_recompense INT PRIMARY KEY AUTO_INCREMENT,
    cout_points INT NOT NULL,
    url_image VARCHAR(100) NOT NULL,
    nom VARCHAR(30) NOT NULL
);

CREATE TABLE panier(
    id_panier INT PRIMARY KEY AUTO_INCREMENT,
    id_compte INT NOT NULL,
    FOREIGN KEY(id_compte) REFERENCES compte(id_compte)
);

CREATE TABLE reclamation(
    id_reclamation INT PRIMARY KEY AUTO_INCREMENT,
    id_item_recompense INT NOT NULL,
    id_panier INT NOT NULL,
    statut_recompense INT NOT NULL,
    FOREIGN KEY(id_item_recompense) REFERENCES item_recompense(id_item_recompense),
    FOREIGN KEY(id_panier) REFERENCES panier(id_panier)
);

CREATE TABLE plan_reservation(
    id_plan_reservation INT PRIMARY KEY AUTO_INCREMENT,
    id_film INT NOT NULL,
    id_cinema INT NOT NULL,
    id_horaire INT NOT NULL,
    id_siege INT NOT NULL,
    statut ENUM("0","1") NOT NULL,
    id_compte INT NOT NULL,
    FOREIGN KEY(id_film) REFERENCES film(id_film),
    FOREIGN KEY(id_cinema) REFERENCES cinema(id_cinema),
    FOREIGN KEY(id_horaire) REFERENCES horaire(id_horaire),
    FOREIGN KEY(id_siege) REFERENCES siege(id_siege),
    FOREIGN KEY(id_compte) REFERENCES compte(id_compte)
);

CREATE TABLE panier_planreservation(
    id_panier_planreservation INT PRIMARY KEY AUTO_INCREMENT,
    id_panier INT NOT NULL,
    id_plan_reservation INT NOT NULL,
    FOREIGN KEY(id_panier) REFERENCES panier(id_panier),
    FOREIGN KEY(id_plan_reservation) REFERENCES plan_reservation(id_plan_reservation)
);
