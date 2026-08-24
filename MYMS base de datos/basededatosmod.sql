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
-- Table `MYMS`.`pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MYMS`.`pedidos` (
  `ID` INT(11) NOT NULL,
  `Nombre` VARCHAR(45) NULL DEFAULT NULL,
  `Fecha` DATE NULL DEFAULT NULL,
  `Celular` INT(11) NULL DEFAULT NULL,
  `Estado` VARCHAR(45) NULL DEFAULT NULL,
  `Direccion` VARCHAR(80) NULL DEFAULT NULL,
  `NombreVendedor` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `MYMS`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MYMS`.`productos` (
  `Codigo` INT(11) NOT NULL,
  `Nombre` VARCHAR(45) NULL DEFAULT NULL,
  `Descripcion` VARCHAR(225) NULL DEFAULT NULL,
  `imagen` VARCHAR(200) NULL DEFAULT NULL,
  `Precio` INT(45) NULL DEFAULT NULL,
  `Stock` INT(45) NULL DEFAULT NULL,
  `Estado` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`Codigo`))
ENGINE = InnoDB

-- -----------------------------------------------------
-- datos de la tabla Productos
-- -----------------------------------------------------

INSERT INTO `MYMS`.`Productos` (`Codigo`, `Nombre`, `Descripcion`, `imagen`, `Precio`, `Stock`, `Estado`) VALUES
(1, 'Root Beer Float Cookie', 'Galleta marmoleada de vainilla y cerveza de raiz', 'imagenes/galletas/1.png', '15', '50', 'Activo'),
(2, 'Peanut Butter Cup Cookie ft. REESEs', 'Galleta de mantequilla de mani', 'imagenes/galletas/1,5.png', '15', '50', 'Activo'),
(3, 'Everything But The Dad Jokes Cookie', 'Galleta de caramelo y chips de mantequilla de mani', 'imagenes/galletas/3.png', '15', '50', 'Activo'),
(4, 'Cookies & Cream Grill-It Cookie', 'Galleta y crema hecha en sarten', 'imagenes/galletas/4.png', '15', '50', 'Activo'),
(5, 'Dubai-Style Chocolate Cheesecake', 'Tarta de queso con chocolate ', 'imagenes/galletas/6.png', '15', '50', 'Activo'),
(6, 'Chocolate Chip Cookie', 'Clasica galleta de azucar con trozos de chocolate ', 'imagenes/galletas/7.png', '15', '50', 'Activo'),
(7, 'Pink Sugar Cookie', 'Galleta de azucar y almendras', 'imagenes/galletas/8.png', '15', '50', 'Activo'),
(8, 'Oreo Bliss', 'Croissant cubierto con chocolate blanco y galleta Oreo', 'imagenes/galletas/10.png', '15', '50', 'Activo'),
(9, 'Caramel Crunch', 'Relleno con salsa de caramelo y nueces', 'imagenes/galletas/11.png', '15', '50', 'Activo'),
(10, 'Berry Cream', 'Croissant con frambuesas frescas y crema', 'imagenes/galletas/12.png', '15', '50', 'Activo'),
(11, 'Tropical Choco', 'Chocolate combinado con rodajas de kiwi y platano', 'imagenes/galletas/13.png', '15', '50', 'Activo'),
(12, 'Strawberry Lovers', 'Fresas frescas en cobertura de chocolate', 'imagenes/galletas/14.png', '15', '50', 'Activo'),
(13, 'Pistachio Dream', 'Crema de pistacho y pistachos sobre un croissant', 'imagenes/galletas/15.png', '15', '50', 'Activo'),
(14, 'Coffee Crush', 'Frappe de cafe con crema batida y salsa de caramelo', 'imagenes/galletas/17.png', '15', '50', 'Activo'),
(15, 'Caramel Vibes', 'Cafe helado con caramelo y crema batida.', 'imagenes/galletas/18.png', '15', '50', 'Activo'),
(16, 'Berry Kiss', 'Batido de fresa con crema', 'imagenes/galletas/19.png', '15', '50', 'Activo'),
(17, 'Cookies & Cream', 'Galletas Oreo trituradas y una base cremosa', 'imagenes/galletas/20.png', '15', '50', 'Activo'),
(18, 'Matcha Mood', 'Leche fria, hielo y autentico matcha.', 'imagenes/galletas/21.png', '15', '50', 'Activo'),
(19, 'Choco Latte Ice', 'Chocolate, cafe y leche fria sobre hielo', 'imagenes/galletas/22.png', '15', '50', 'Activo');

-- -----------------------------------------------------
-- Table `MYMS`.`carrito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MYMS`.`carrito` (
  `Productos_Codigo` INT(11) NOT NULL,
  `Pedidos_ID` INT(11) NOT NULL,
  `Cantidad` INT(11) NULL DEFAULT NULL,
  `CostoTotal` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`Productos_Codigo`, `Pedidos_ID`),
  INDEX `fk_Productos_has_Pedidos_Pedidos1_idx` (`Pedidos_ID` ASC) ,
  INDEX `fk_Productos_has_Pedidos_Productos1_idx` (`Productos_Codigo` ASC) ,
  CONSTRAINT `fk_Productos_has_Pedidos_Pedidos1`
    FOREIGN KEY (`Pedidos_ID`)
    REFERENCES `MYMS`.`pedidos` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Productos_has_Pedidos_Productos1`
    FOREIGN KEY (`Productos_Codigo`)
    REFERENCES `MYMS`.`productos` (`Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `MYMS`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MYMS`.`usuarios` (
  `CI` INT(11) NOT NULL,
  `Nombre` VARCHAR(45) NULL DEFAULT NULL,
  `Direccion` VARCHAR(45) NULL DEFAULT NULL,
  `Celular` INT(45) NULL DEFAULT NULL,
  `Rol` VARCHAR(45) NULL DEFAULT NULL,
  `Estado` VARCHAR(45) NULL DEFAULT NULL,
  `imagen` VARCHAR(200) NULL DEFAULT NULL,
  PRIMARY KEY (`CI`))
ENGINE = InnoDB

-- -----------------------------------------------------
-- datos de la tabla Usuarios
-- -----------------------------------------------------
INSERT INTO `MYMS`.`Usuarios` (`CI`, `Nombre`, `Direccion`, `Celular`, `Rol`, `Estado`, `imagen`) VALUES
(9494740, 'Adri', 'Chimba', '64886153', 'vendedor', 'Activo', 'imagenes/perfil/adri.jpg'),
(13419857, 'Gene', 'IC', '60387793', 'administrador', 'Activo', 'imagenes/perfil/gene.jpg'),
(13876211, 'Zhair', 'Pando', '75973977', 'administrador', 'Activo', 'imagenes/perfil/tungtung.jpg'),
(9406369, 'Mathy', 'URB', '64831363', 'vendedor', 'Activo', 'imagenes/perfil/mathy.jpg'),
(12936658, 'Aylen', 'Casa', '65514288', 'vendedor', 'Activo', 'imagenes/perfil/aylen.jpg'),
(14150392, 'Teban', 'Cole', '67505739', 'vendedor', 'Activo', 'imagenes/perfil/teban.jpg');




-- -----------------------------------------------------
-- Table `MYMS`.`ventas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MYMS`.`ventas` (
  `ID` INT(11) NOT NULL,
  `Pedidos_ID` INT(11) NOT NULL,
  `Costototal` DECIMAL(10,2) NULL DEFAULT NULL,
  `Estado` VARCHAR(45) NULL DEFAULT NULL,
  `Metodo` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`ID`, `Pedidos_ID`),
  INDEX `fk_Ventas_Pedidos1_idx` (`Pedidos_ID` ASC) ,
  CONSTRAINT `fk_Ventas_Pedidos1`
    FOREIGN KEY (`Pedidos_ID`)
    REFERENCES `MYMS`.`pedidos` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
