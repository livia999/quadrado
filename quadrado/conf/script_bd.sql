CREATE SCHEMA `recparalela` ;

CREATE TABLE `recparalela`.`quadrado` (
  `idQuadrado` INT NOT NULL AUTO_INCREMENT,
  `ladoQuadrado` VARCHAR(45) NULL,
  `corQuadrado` VARCHAR(45) NULL,
  PRIMARY KEY (`idQuadrado`));

INSERT INTO `recparalela`.`quadrado` (`ladoQuadrado`, `corQuadrado`) VALUES ('100', 'azul');
INSERT INTO `recparalela`.`quadrado` (`ladoQuadrado`, `corQuadrado`) VALUES ('150', 'amarelo');
INSERT INTO `recparalela`.`quadrado` (`ladoQuadrado`, `corQuadrado`) VALUES ('125', 'verde');
INSERT INTO `recparalela`.`quadrado` (`ladoQuadrado`, `corQuadrado`) VALUES ('200', 'laranja');

ALTER TABLE `recparalela`.`quadrado` 
CHANGE COLUMN `ladoQuadrado` `ladoQuadrado` INT NULL DEFAULT NULL ;


CREATE TABLE `recparalela`.`tabuleiro` (
  `idTabuleiro` INT NOT NULL AUTO_INCREMENT,
  `lado` INT NULL,
  PRIMARY KEY (`idTabuleiro`));

ALTER TABLE `recparalela`.`tabuleiro` 
CHANGE COLUMN `lado` `ladoTabuleiro` INT NULL DEFAULT NULL ;

CREATE TABLE `recparalela`.`usuario` (
  `idUsuario` INT NOT NULL,
  `nomeUsuario` VARCHAR(250) NULL,
  `loginUsuario` VARCHAR(45) NULL,
  `senhaUsuario` VARCHAR(250) NULL,
  PRIMARY KEY (`idUsuario`));

  ALTER TABLE `recparalela`.`quadrado` 
ADD COLUMN `idTabuleiro` INT(250) NULL AFTER `corQuadrado`;

ALTER TABLE `recparalela`.`quadrado` 
ADD INDEX `idTabuleiro_idx` (`idTabuleiro` ASC) VISIBLE;
;
ALTER TABLE `recparalela`.`quadrado` 
ADD CONSTRAINT `idTabuleiro`
  FOREIGN KEY (`idTabuleiro`)
  REFERENCES `recparalela`.`tabuleiro` (`idTabuleiro`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

