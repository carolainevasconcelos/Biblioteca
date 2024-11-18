CREATE DATABASE IF NOT EXISTS Biblioteca;

USE Biblioteca;

CREATE TABLE usuarios (
    idUsuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    ibsn VARCHAR(20) NOT NULL UNIQUE,
    ano INT NOT NULL,
    genero VARCHAR(100) NOT NULL,
    editora VARCHAR(255),
    descricao TEXT,
    autor_id INT,  
    FOREIGN KEY (autor_id) REFERENCES autores(id)  
);

CREATE TABLE IF NOT EXISTS autores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL UNIQUE
);

SELECT livros.id, livros.titulo, livros.ibsn, livros.ano, livros.genero, livros.editora, livros.descricao, autores.nome 
AS autor 
FROM livros 
LEFT JOIN autores ON livros.autor_id = autores.id
ORDER BY livros.titulo DESC;