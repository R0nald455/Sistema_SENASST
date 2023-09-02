CREATE DATABASE pregupruebas;
USE pregupruebas;

CREATE TABLE pruebas(
	PruID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    PruNumero INT NOT NULL UNIQUE, 
    PruTema VARCHAR(255) NOT NULL,
	PruComplejidad VARCHAR(255) NOT NULL,
	PruDificultad VARCHAR(255) NOT NULL,
    PruTiempo INT NOT NULL,
    PruPuntos INT NOT NULL, 
    PruFecha DATE, 
    PruNumPreguntas INT NOT NULL
);


CREATE TABLE preguntas (
	PreID INT AUTO_INCREMENT NOT NULL PRIMARY KEY, 
    PreNumPrueba INT NOT NULL,
    PreNumPregunta INT NOT NULL,
    PreArchivo BLOB NULL,
	PrePreguntaEnun TEXT NULL,
	PreComplejidad VARCHAR(255) NOT NULL,
    PreDificultad VARCHAR(255) NOT NULL,
    PreTiempo INT NOT NULL,
    PrePuntos INT NOT NULL,
    PreA VARCHAR(255) NOT NULL,
    PreB VARCHAR(255) NOT NULL,
    PreC VARCHAR(255) NOT NULL,
    PreD VARCHAR(255) NOT NULL,
    PreKeyA INT NULL,
    PreKeyB INT NULL,
    PreKeyC INT NULL,
    PreKeyD INT NULL,
    PrePuntoA INT NULL,
    PrePuntoB INT NULL,
    PrePuntoC INT NULL,
    PrePuntoD INT NULL,
    FOREIGN KEY (PreNumPrueba) REFERENCES pruebas (PruNumero)
);


CREATE TABLE retro(
	RetroID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    RetroPrueba INT NOT NULL,
    RetroPruebaId INT NOT NULL,
    RetroNumPregunta INT NOT NULL,
    RetroRetroali TEXT NULL,
    RetroReferencia TEXT NULL,
    RetroOpcionPregABCD VARCHAR(1) NULL,
	FOREIGN KEY (RetroPrueba) REFERENCES pruebas (PruNumero),
	FOREIGN KEY (RetroPruebaId) REFERENCES preguntas (PreID)
);
