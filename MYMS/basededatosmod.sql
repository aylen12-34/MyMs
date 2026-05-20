-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema MYMS
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema MYMS
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `MYMS` DEFAULT CHARACTER SET utf8 ;
USE `MYMS` ;

-- -----------------------------------------------------
-- Table `MYMS`.`Productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MYMS`.`Productos` (
  `Codigo` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL,
  `Descripcion` VARCHAR(45) NULL,
  `Precio` VARCHAR(45) NULL,
  `Stock` VARCHAR(45) NULL,
  PRIMARY KEY (`Codigo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `MYMS`.`Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MYMS`.`Usuarios` (
  `CI` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL,
  `Direccion` VARCHAR(45) NULL,
  `Celular` VARCHAR(45) NULL,
  `Rol` VARCHAR(45) NULL,
  `Estado` VARCHAR(45) NULL,
  PRIMARY KEY (`CI`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
