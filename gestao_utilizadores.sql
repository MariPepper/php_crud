CREATE DATABASE IF NOT EXISTS gestao_utilizadores;
USE gestao_utilizadores;

CREATE TABLE IF NOT EXISTS utilizadores (    
id INT AUTO_INCREMENT PRIMARY KEY,    
nome_utilizador VARCHAR(50) NOT NULL UNIQUE,    
palavra_passe VARCHAR(255) NOT NULL,    
email VARCHAR(100) NOT NULL UNIQUE,    
data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP);

INSERT INTO utilizadores (nome_utilizador, palavra_passe, email) VALUES('admin', 'admin123', 'admin@exemplo.com'),('usuario', 'senha123', 'usuario@exemplo.com'),('teste', 'teste123', 'teste@exemplo.com');

DELIMITER //
 
CREATE TRIGGER before_insert_utilizadores
BEFORE INSERT ON utilizadores
FOR EACH ROW
BEGIN
    SET NEW.palavra_passe = SHA2(NEW.palavra_passe, 256);
END;
//
 
CREATE TRIGGER before_update_utilizadores
BEFORE UPDATE ON utilizadores
FOR EACH ROW
BEGIN
    SET NEW.palavra_passe = SHA2(NEW.palavra_passe, 256);
END;
//
 
DELIMITER ;
