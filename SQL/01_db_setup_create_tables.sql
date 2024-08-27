CREATE DATABASE IF NOT EXISTS `marfit`;

CREATE TABLE IF NOT EXISTS `marfit`.`produtos` (
    `id` INT NOT NULL AUTO_INCREMENT, 
    `tipo` VARCHAR(45) NOT NULL, 
    `nome` VARCHAR(45) NOT NULL, 
    `descricao` VARCHAR(90) NOT NULL, 
    `imagem` VARCHAR(80) NOT NULL, 
    `preco` DECIMAL(5,2) NOT NULL, 
PRIMARY KEY (`id`));
