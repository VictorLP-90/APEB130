CREATE DATABASE IF NOT EXISTS sistema_inscripciones;

USE sistema_inscripciones;

CREATE TABLE IF NOT EXISTS cursos (
    id_curso INT AUTO_INCREMENT PRIMARY KEY,
    nombre_curso VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS inscritos (
    id_inscrito INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    id_curso INT,
    FOREIGN KEY (id_curso) REFERENCES cursos(id_curso)
);