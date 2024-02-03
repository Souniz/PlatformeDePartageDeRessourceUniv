-- Active: 1663022284758@@127.0.0.1@3306@SectionInformatique
CREATE OR REPLACE TABLE Admin
(
     id integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
     login varchar(30) NOT NULL,
     motPasse varchar(30) NOT NULL,
     constraint unik UNIQUE (login,motPasse) on delete cascade
);
INSERT INTO(login,motPasse) VALUES('asta10','drame5')
ALTER TABLE Admin
ADD CONSTRAINT UQ_maTable_colonnesConstituantLeTupleAdmi
  UNIQUE (login,motPasse);
CREATE OR REPLACE TABLE Professeur
(
    immatriculation VARCHAR(30) not NULL,
    nom VARCHAR(30) not null,
    prenom VARCHAR(30) NOT NULL,
    dateNais DATE not null,
    sexe varchar(1) ,
    mail VARCHAR(30) not NULL,
    statu VARCHAR(30) not null,
    Telephone VARCHAR(30),
    login VARCHAR(30) not null,  
    motPasse VARCHAR(30) not null,
    pprofile TEXT not null,
    PRIMARY KEY( immatriculation)
);
ALTER TABLE Professeur
ADD CONSTRAINT UQ_maTable_colonnesConstituantLeTupleProf
  UNIQUE (login,motPasse);
CREATE OR REPLACE TABLE Classe
(
    libelle VARCHAR(30) ,
    profResp VARCHAR(30) ,
    Constraint pk PRIMARY KEY(libelle),
    Constraint fk FOREIGN KEY (profResp) REFERENCES Professeur(immatriculation) on delete cascade
);
ALTER TABLE Classe
ADD CONSTRAINT 
   FOREIGN KEY (profResp) REFERENCES Professeur(immatriculation) on delete cascade;
CREATE OR REPLACE TABLE Enseigner
(
    idProf VARCHAR(30) not null, 
    classe VARCHAR(30) not null,
    PRIMARY KEY(idProf,classe ),
    constraint fk1 FOREIGN KEY (idProf) REFERENCES Professeur(immatriculation) ON delete cascade,
    constraint fk2 FOREIGN KEY (classe) REFERENCES Classe(libelle) ON delete cascade
);

CREATE OR REPLACE TABLE Etudiant
(
    identification VARCHAR(30) NOT NULL,
    nom VARCHAR(30) not null,
    prenom VARCHAR(30) NOT NULL,
    dateNais DATE not null,
    sexe varchar(1),
    mail VARCHAR(30) not NULL,
    profile TEXT not null,
    lieu VARCHAR(30) not null,
    login VARCHAR(30) not null,  
    motPasse VARCHAR(30) not null,
    classe VARCHAR(30) not null,
    Constraint pr_key PRIMARY KEY( identification),
    Constraint fk3 FOREIGN KEY(classe) REFERENCES Classe(libelle) ON delete cascade
);
ALTER TABLE Etudiant
ADD CONSTRAINT OncascadEtudi
   FOREIGN KEY (classe) REFERENCES Classe(libelle) ON delete cascade;
ALTER TABLE Etudiant
ADD CONSTRAINT UQ_maTable_colonnesConstituantLeTupleQuiDoitEtreUnique
  UNIQUE (login,motPasse);
  DELETE from `Etudiant`;
CREATE  or REPLACE TABLE Module
(
    libelle VARCHAR(30) PRIMARY KEY,
    idProf VARCHAR(30) not null,
    idClasse VARCHAR(30) not null,
    FOREIGN KEY (idProf) REFERENCES Professeur(immatriculation) ON delete cascade,
    FOREIGN KEY (idClasse) REFERENCES Classe(libelle) ON delete cascade
);
ALTER TABLE Module
ADD CONSTRAINT Module_ibfk
   FOREIGN KEY (idClasse) REFERENCES Classe(libelle) ON delete cascade;
CREATE OR REPLACE TABLE Ressource
(
    libelle varchar(200),
    idModul VARCHAR(30),
    type VARCHAR(30),
    PRIMARY KEY(libelle),
    FOREIGN KEY( idModul) REFERENCES Module(libelle) ON delete cascade
);
CREATE OR REPLACE TABLE Consulter
(
    id integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idEtudiant VARCHAR(30),
    idRessour VARCHAR(200),
    dateConsul DATETIME,
     FOREIGN KEY(idEtudiant) REFERENCES Etudiant(identification) ON delete cascade,
    FOREIGN KEY( idRessour) REFERENCES Ressource(libelle) ON delete cascade
);
CREATE OR REPLACE TABLE Message
(
    id integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
    contenu TEXT,
    idProf VARCHAR(30),
    ladate DATETIME,
    FOREIGN KEY (idProf) REFERENCES Professeur(immatriculation) ON delete cascade
);
CREATE TABLE Notification(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    message TEXT,
    Ladate DATETIME ,
    idClasse VARCHAR(30),
    FOREIGN KEY (idClasse) REFERENCES Classe(libelle) ON delete cascade
) ;

