-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

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
  `Nombre` VARCHAR(45) NULL DEFAULT NULL,
  `Descripcion` VARCHAR(225) NULL DEFAULT NULL,
  `imagen` VARCHAR(200) NULL DEFAULT NULL,
  `Precio` VARCHAR(45) NULL DEFAULT NULL,
  `Stock` VARCHAR(45) NULL DEFAULT NULL,
  `Estado` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`Codigo`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- datos de la tabla Productos
-- -----------------------------------------------------
INSERT INTO `MYMS`.`Productos` (`Codigo`, `Nombre`, `Descripcion`, `imagen`, `Precio`, `Stock`, `Estado`) VALUES
(1, 'Root Beer Float Cookie', 'Galleta marmoleada de vainilla y cerveza de raiz', 'imagenes/galletas/1.png', '15', '50', 'Disponible'),
(2, 'Peanut Butter Cup Cookie ft. REESEs', 'Galleta de mantequilla de mani', 'imagenes/galletas/1,5.png', '15', '50', 'Disponible'),
(3, 'Everything But The Dad Jokes Cookie', 'Galleta de caramelo y chips de mantequilla de mani', 'imagenes/galletas/3.png', '15', '50', 'Disponible'),
(4, 'Cookies & Cream Grill-It Cookie', 'Galleta y crema hecha en sarten', 'imagenes/galletas/4.png', '15', '50', 'Disponible'),
(5, 'Dubai-Style Chocolate Cheesecake', 'Tarta de queso con chocolate ', 'imagenes/galletas/6.png', '15', '50', 'Disponible'),
(6, 'Chocolate Chip Cookie', 'Clasica galleta de azucar con trozos de chocolate ', 'imagenes/galletas/7.png', '15', '50', 'Disponible'),
(7, 'Pink Sugar Cookie', 'Galleta de azucar y almendras', 'imagenes/galletas/8.png', '15', '50', 'Disponible'),
(8, 'Oreo Bliss', 'Croissant cubierto con chocolate blanco y galleta Oreo', 'imagenes/galletas/10.png', '15', '50', 'Disponible'),
(9, 'Caramel Crunch', 'Relleno con salsa de caramelo y nueces', 'imagenes/galletas/11.png', '15', '50', 'Disponible'),
(10, 'Berry Cream', 'Croissant con frambuesas frescas y crema', 'imagenes/galletas/12.png', '15', '50', 'Disponible'),
(11, 'Tropical Choco', 'Chocolate combinado con rodajas de kiwi y platano', 'imagenes/galletas/13.png', '15', '50', 'Disponible'),
(12, 'Strawberry Lovers', 'Fresas frescas en cobertura de chocolate', 'imagenes/galletas/14.png', '15', '50', 'Disponible'),
(13, 'Pistachio Dream', 'Crema de pistacho y pistachos sobre un croissant', 'imagenes/galletas/15.png', '15', '50', 'Disponible'),
(14, 'Coffee Crush', 'Frappe de cafe con crema batida y salsa de caramelo', 'imagenes/galletas/17.png', '15', '50', 'Disponible'),
(15, 'Caramel Vibes', 'Cafe helado con caramelo y crema batida.', 'imagenes/galletas/18.png', '15', '50', 'Disponible'),
(16, 'Berry Kiss', 'Batido de fresa con crema', 'imagenes/galletas/19.png', '15', '50', 'Disponible'),
(17, 'Cookies & Cream', 'Galletas Oreo trituradas y una base cremosa', 'imagenes/galletas/20.png', '15', '50', 'Disponible'),
(18, 'Matcha Mood', 'Leche fria, hielo y autentico matcha.', 'imagenes/galletas/21.png', '15', '50', 'Disponible'),
(19, 'Choco Latte Ice', 'Chocolate, cafe y leche fria sobre hielo', 'imagenes/galletas/22.png', '15', '50', 'Disponible');

-- -----------------------------------------------------
-- Table `MYMS`.`Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MYMS`.`Usuarios` (
  `CI` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL DEFAULT NULL,
  `Direccion` VARCHAR(45) NULL DEFAULT NULL,
  `Celular` VARCHAR(45) NULL DEFAULT NULL,
  `Rol` VARCHAR(45) NULL DEFAULT NULL,
  `Estado` VARCHAR(45) NULL DEFAULT NULL,
  `imagen` VARCHAR(200) NULL DEFAULT NULL,
  PRIMARY KEY (`CI`))
ENGINE = InnoDB;

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
-- Table `MYMS`.`Pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MYMS`.`Pedidos` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL DEFAULT NULL,
  `Fecha` DATE NULL DEFAULT NULL, 
  `Celular` INT NULL DEFAULT NULL,
  `Estado` VARCHAR(45) NULL DEFAULT NULL,
  `Direccion` VARCHAR(80) NULL DEFAULT NULL,
  `NombreVendedor` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- datos de la tabla Pedidos
-- -----------------------------------------------------
INSERT INTO `MYMS`.`Pedidos` (`ID`, `Nombre`, `Fecha`, `Celular`, `Estado`, `Direccion`, `NombreVendedor`) VALUES
(1, 'Carlos Mendoza', '2026-02-01', 71234567, 'Aceptado', 'Av. Heroínas #456', 'Adri'),
(2, 'María René Torrez', '2026-02-02', 72345678, 'Aceptado', 'Calle España #123', 'Mathy'),
(3, 'Jorge Claros', '2026-02-03', 73456789, 'Aceptado', 'Av. América #890', 'Aylen'),
(4, 'Lucía Fernández', '2026-02-04', 74567890, 'Aceptado', 'Calle Ayacucho #234', 'Teban'),
(5, 'Fernando Camacho', '2026-02-05', 75678901, 'Aceptado', 'Av. Salamanca #567', 'Adri'),
(6, 'Sofia Morales', '2026-02-06', 76789012, 'Aceptado', 'Calle Bolívar #345', 'Mathy'),
(7, 'Diego Rios', '2026-02-07', 77890123, 'Aceptado', 'Av. Ballivián #678', 'Aylen'),
(8, 'Valeria Gomez', '2026-02-08', 78901234, 'Aceptado', 'Calle Ecuador #901', 'Teban'),
(9, 'Gabriel Arce', '2026-02-09', 79012345, 'Aceptado', 'Av. Blanco Galindo km 2', 'Adri'),
(10, 'Camila Paz', '2026-02-10', 70123456, 'Aceptado', 'Calle Colombia #432', 'Mathy'),
(11, 'Mateo Quiroga', '2026-02-11', 71112233, 'Pendiente', 'Av. Santa Cruz #111', 'Aylen'),
(12, 'Natalia Suarez', '2026-02-12', 72223344, 'Pendiente', 'Calle Baptista #555', 'Teban'),
(13, 'Alejandro Vargas', '2026-02-13', 73334455, 'Aceptado', 'Av. Pando #777', 'Adri'),
(14, 'Daniela Roca', '2026-02-14', 74445566, 'Pendiente', 'Calle Mayor Rocha #333', 'Mathy'),
(15, 'Sebastian Guzman', '2026-02-15', 75556677, 'Pendiente', 'Av. Uyuni #222', 'Aylen'),
(16, 'Claudia Mendez', '2026-02-16', 76667788, 'Aceptado', 'Calle Jordán #888', 'Teban'),
(17, 'Hugo Gutierrez', '2026-02-17', 77778899, 'Pendiente', 'Av. Ramón Rivero #999', 'Adri'),
(18, 'Andrea Ortiz', '2026-02-18', 78889900, 'Aceptado', 'Calle Venezuela #444', 'Mathy'),
(19, 'Ricardo Paredes', '2026-02-19', 79990011, 'Pendiente', 'Av. Oquendo #666', 'Aylen'),
(20, 'Mariana Leyton', '2026-02-20', 70001122, 'Pendiente', 'Calle Mexico #123', 'Teban');

-- -----------------------------------------------------
-- Table `MYMS`.`Carrito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MYMS`.`Carrito` (
  `Productos_Codigo` INT NOT NULL,
  `Pedidos_ID` INT NOT NULL,
  `Cantidad` INT NULL DEFAULT NULL,
  `CostoTotal` INT NULL DEFAULT NULL,
  PRIMARY KEY (`Productos_Codigo`, `Pedidos_ID`),
  INDEX `fk_Productos_has_Pedidos_Pedidos1_idx` (`Pedidos_ID` ASC) ,
  INDEX `fk_Productos_has_Pedidos_Productos1_idx` (`Productos_Codigo` ASC) ,
  CONSTRAINT `fk_Productos_has_Pedidos_Productos1`
    FOREIGN KEY (`Productos_Codigo`)
    REFERENCES `MYMS`.`Productos` (`Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Productos_has_Pedidos_Pedidos1`
    FOREIGN KEY (`Pedidos_ID`)
    REFERENCES `MYMS`.`Pedidos` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- datos de la tabla Carrito
-- -----------------------------------------------------
INSERT INTO `MYMS`.`Carrito` (`Productos_Codigo`, `Pedidos_ID`, `Cantidad`, `CostoTotal`) VALUES
(1, 1, 2, 30),
(6, 1, 1, 15),
(2, 2, 3, 45),
(14, 2, 2, 30),
(5, 3, 1, 15),
(10, 3, 2, 30),
(18, 3, 1, 15),
(4, 4, 4, 60),
(3, 5, 2, 30),
(7, 5, 2, 30),
(8, 6, 1, 15),
(9, 6, 3, 45),
(11, 7, 2, 30),
(12, 7, 2, 30),
(13, 7, 1, 15),
(15, 8, 3, 45),
(16, 8, 2, 30),
(17, 9, 1, 15),
(19, 9, 4, 60),
(6, 10, 5, 75),
(1, 11, 1, 15),
(2, 11, 1, 15),
(3, 11, 1, 15),
(5, 12, 2, 30),
(15, 12, 2, 30),
(8, 13, 3, 45),
(18, 13, 2, 30),
(10, 14, 1, 15),
(12, 14, 1, 15),
(16, 14, 2, 30),
(7, 15, 4, 60),
(4, 16, 2, 30),
(9, 17, 1, 15),
(13, 17, 2, 30),
(14, 18, 3, 45),
(19, 18, 1, 15),
(2, 19, 2, 30),
(17, 19, 2, 30),
(3, 20, 1, 15),
(6, 20, 2, 30),
(11, 20, 1, 15);

-- -----------------------------------------------------
-- Table `MYMS`.`Ventas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MYMS`.`Ventas` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Pedidos_ID` INT NOT NULL,
  `Costototal` DECIMAL(10,2) NULL DEFAULT NULL,
  `Estado` VARCHAR(45) NULL DEFAULT NULL,
  `Metodo` VARCHAR(45) NULL DEFAULT NULL,
  INDEX `fk_Ventas_Pedidos1_idx` (`Pedidos_ID` ASC) ,
  PRIMARY KEY (`ID`, `Pedidos_ID`),
  CONSTRAINT `fk_Ventas_Pedidos1`
    FOREIGN KEY (`Pedidos_ID`)
    REFERENCES `MYMS`.`Pedidos` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- datos de la tabla Ventas
-- -----------------------------------------------------
INSERT INTO `MYMS`.`Ventas` (`ID`, `Pedidos_ID`, `Costototal`, `Estado`, `Metodo`) VALUES
(1, 1, 45.00, 'Activo', 'Efectivo'),
(2, 2, 75.00, 'Activo', 'QR'),
(3, 3, 60.00, 'Activo', 'Tarjeta'),
(4, 4, 60.00, 'Activo', 'Efectivo'),
(5, 5, 60.00, 'Activo', 'QR'),
(6, 6, 60.00, 'Activo', 'Efectivo'),
(7, 7, 75.00, 'Activo', 'Tarjeta'),
(8, 8, 75.00, 'Activo', 'QR'),
(9, 9, 75.00, 'Activo', 'Efectivo'),
(10, 10, 75.00, 'Activo', 'QR');


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;