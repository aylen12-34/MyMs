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
  `Detallado` VARCHAR(1000) NULL DEFAULT NULL,
  PRIMARY KEY (`Codigo`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- datos de la tabla Productos
-- -----------------------------------------------------
INSERT INTO `MYMS`.`Productos` (`Codigo`, `Nombre`, `Descripcion`, `imagen`, `Precio`, `Stock`, `Estado`, `Detallado`) VALUES
(1, 'Root Beer Float Cookie', 'Galleta marmoleada de vainilla y cerveza de raiz', 'imagenes/galletas/1.png', '15', '50', 'Disponible', 'Esta galleta está pensada para disfrutar de un antojo dulce cuidando el cuerpo y la digestión. Está horneada con una mezcla de avena integral sin gluten y harinas suaves que le dan una textura tierna, densa y casera, enriquecida con proteína aislada para que sea un snack que de verdad sacie y aporte energía limpia.Al morderla, se encuentran dos masas entrelazadas: una suave con el sabor clásico y reconfortante de la vainilla pura, y otra con el toque aromático, ligeramente especiado y dulce de la cerveza de raíz.Para terminar, la parte superior lleva un copete de crema batida hecha a base de coco, que es muy ligera, suave y cae bien al estómago. El toque final lo da una cereza natural, que aporta frescura y el contraste dulce perfecto en cada bocado. Es una opción completa, ligera, libre de lácteos y gluten, ideal para comer después de entrenar o a media tarde.'),
(2, 'Peanut Butter Cup Cookie ft. REESEs', 'Galleta de mantequilla de mani', 'imagenes/galletas/1,5.png', '15', '50', 'Disponible', 'Esta galleta combina el sabor clásico y reconfortante de la mantequilla de maní con el chocolate en una versión pensada para nutrir y caer bien al estómago. Está horneada con una base de avena integral sin gluten y enriquecida con proteína aislada, logrando una textura suave, densa y masticable que sacia el hambre de forma saludable.La masa principal lleva mantequilla de maní pura y natural, entrelazada con trozos o vetas de un chocolate oscuro libre de lácteos, recreando la experiencia del famoso dulce de chocolate y cacahuate, pero de manera limpia y ligera.En la parte superior, el postre se suaviza con un copete de crema batida hecha a base de coco, que aporta una textura muy ligera, cremosa y de fácil digestión. El toque final lo da una cereza natural, que corona la galleta aportando una nota de frescura frutal que equilibra la intensidad de la mantequilla de maní. Es un snack energético y completo, perfecto para un empujón antes de entrenar o como un antojo especial a media tarde.'),
(3, 'Everything But The Dad Jokes Cookie', 'Galleta de caramelo y chips de mantequilla de mani', 'imagenes/galletas/3.png', '15', '50', 'Disponible', 'Esta galleta juega con un contraste de sabores dulces y salados en una versión diseñada para aportar energía limpia y digerirse fácilmente. Está horneada con una base de avena integral sin gluten y proteína aislada, lo que le da una textura densa, suave y muy satisfactoria que ayuda a mantener la saciedad por más tiempo.La base de la masa tiene un suave sabor a caramelo natural, la cual se complementa con chispas de mantequilla de maní casera distribuidas por toda la galleta. Esta combinación ofrece un equilibrio perfecto entre lo tostado del cacahuate y la dulzura cremosa del caramelo, sin necesidad de azúcares refinados.En la parte superior, se decora con un copete de crema batida de coco ligera, que aporta una textura etérea y suave que contrasta muy bien con la densidad de la galleta. El cierre lo pone una cereza natural, que corona el postre aportando una nota de frescura frutal. Es un snack divertido, energético y completamente libre de lácteos y gluten, ideal para un antojo a mitad del día o después de un entrenamiento fuerte.'),
(4, 'Cookies & Cream Grill-It Cookie', 'Galleta y crema hecha en sarten', 'imagenes/galletas/4.png', '15', '50', 'Disponible', 'Esta opción reinventa el clásico sabor de galletas y crema en un formato caliente hecho en sartén, ideal para un postre reconfortante que cuida la digestión. Está elaborada con una base de avena integral sin gluten y enriquecida con proteína aislada, logrando esa textura única de las galletas en sartén: suave y cremosa en el centro, con los bordes ligeramente tostados.La masa base de vainilla suave viene cargada con trozos de galletas de chocolate oscuras y crujientes hechas sin gluten ni lácteos, logrando el equilibrio perfecto entre la masa tibia y los tropezones crujientes de cacao en cada bocado.Al salir del fuego, se corona con un copete de crema batida a base de coco, que comienza a derretirse suavemente con el calor de la sartén creando una textura irresistible. El toque final lo da una cereza natural, aportando una nota de frescura frutal que corta la riqueza del chocolate y la crema. Es un postre completo, energético, libre de alérgenos y perfecto para compartir o disfrutar después de un día activo.'),
(5, 'Dubai-Style Chocolate Cheesecake', 'Tarta de queso con chocolate ', 'imagenes/galletas/6.png', '15', '50', 'Disponible', 'Esta tarta recrea la famosa combinación de texturas del chocolate viral de Dubái en una versión nutritiva y ligera para el estómago. Está elaborada sobre una base de avena integral sin gluten y enriquecida con proteína aislada, logrando un cuerpo suave y una consistencia cremosa que sacia sin dejar sensación de pesadez. El corazón de la tarta destaca por su relleno de queso crema vegano (sin lácteos) mezclado con cacao puro, que se entrelaza con una capa crujiente de pasta kataifi tostada y crema de pistacho natural. Este contraste entre la suavidad del chocolate y el crujiente especiado del pistacho ofrece una experiencia única en cada cucharada. La parte superior se aligera con un copete de crema batida de coco, que aporta una textura etérea y suave, coronada con una cereza natural fresca que suma una nota frutal. Es un postre premium, energético y completamente libre de alérgenos comunes, perfecto para disfrutar de un gusto sofisticado cuidando la alimentación diaria.'),
(6, 'Chocolate Chip Cookie', 'Clasica galleta de azucar con trozos de chocolate ', 'imagenes/galletas/7.png', '15', '50', 'Disponible', 'Esta es la versión saludable del clásico más querido, pensada para disfrutar de un sabor tradicional mientras cuidas tu digestión y tus metas nutricionales. Está horneada con una base de avena integral sin gluten y enriquecida con proteína aislada, logrando esa textura ideal de las galletas caseras: ligeramente crujiente en los bordes y suave en el centro.La masa, con un toque sutil y dulce que recuerda a la clásica galleta de azúcar, está repleta de trozos de chocolate oscuro puro y libre de lácteos. Al morderla, el chocolate se funde suavemente, ofreciendo el equilibrio perfecto con la masa horneada.En la parte superior, el postre se complementa con un copete de crema batida a base de coco, que aporta una ligereza cremosa muy fácil de digerir. El cierre clásico lo pone una cereza natural, que corona la galleta y añade una nota de frescura frutal que contrasta muy bien con el chocolate. Es un snack reconfortante, energético y libre de alérgenos, ideal para cualquier momento del día.'),
(7, 'Pink Sugar Cookie', 'Galleta de azucar y almendras', 'imagenes/galletas/8.png', '15', '50', 'Disponible', 'Esta galleta ofrece un perfil de sabor suave, dulce y delicado, diseñado para aportar energía limpia sin causar pesadez ni inflamación. Está horneada con una mezcla de avena integral sin gluten, harina de almendras y proteína aislada, lo que le da una textura increíblemente tierna, suave y reconfortante.La masa combina una base ligera tipo galleta de azúcar con un toque sutil y aromático de extracto de almendras naturales. El característico color rosa se logra de forma completamente natural utilizando un toque de concentrado de betabel (remolacha) u otros pigmentos vegetales, evitando por completo los colorantes artificiales.En la parte superior, se adorna con un copete de crema batida a base de coco, que aporta una textura muy ligera, cremosa y de fácil digestión. El contraste final lo da una cereza natural, que corona el postre aportando una nota de frescura frutal que combina a la perfección con el toque de almendra. Es un snack equilibrado, nutritivo y libre de alérgenos comunes, perfecto para un antojo especial a media tarde.'),
(8, 'Oreo Bliss', 'Croissant cubierto con chocolate blanco y galleta Oreo', 'imagenes/galletas/10.png', '15', '50', 'Disponible', 'Esta opción transforma la experiencia de la bollería clásica en un bocado crujiente y ligero, diseñado para aportar energía estable y cuidar la salud digestiva. Está elaborado con una masa hojaldrada sin gluten, enriquecida con proteína aislada para lograr un perfil más nutritivo y saciante sin dejar sensación de pesadez.El croissant se cubre con una capa suave de chocolate blanco vegano y libre de lácteos, la cual sirve de base para una lluvia de trozos crujientes de galletas de chocolate oscuras estilo Oreo, elaboradas también sin gluten. Este contraste entre la cobertura cremosa y el crujiente del cacao puro ofrece una textura increíble en cada mordida.En la parte superior, el postre se complementa con un copete de crema batida a base de coco, que aporta una ligereza etérea muy fácil de digerir. El cierre clásico lo pone una cereza natural, que corona la pieza aportando una nota de frescura frutal que equilibra perfectamente el dulzor del chocolate blanco. Es un snack energético, sofisticado y libre de alérgenos comunes, ideal para disfrutar a media mañana o después de entrenar.'),
(9, 'Caramel Crunch', 'Relleno con salsa de caramelo y nueces', 'imagenes/galletas/11.png', '15', '50', 'Disponible', 'Esta opción combina lo crujiente de los frutos secos con la textura suave de un hojaldre funcional, diseñado para aportar energía duradera y digerirse de forma ligera. Está elaborado con una masa hojaldrada sin gluten y enriquecida con proteína aislada, logrando una textura aireada que sacia el apetito sin causar pesadez.El Relleno: En su interior esconde un corazón fluido de salsa de caramelo casera y nueces picadas, elaborada a base de ingredientes vegetales para mantenerla completamente libre de lácteos.La Cobertura: Por fuera, el croissant se baña con un dulce de leche vegano (hecho a base de leche de coco o almendras), el cual sostiene una capa súper crujiente de almendras fileteadas, nueces tostadas y hojuelas de avena integral sin gluten.Para terminar, la parte superior lleva el sello de la casa: un delicado copete de crema batida de coco muy ligera y una cereza natural fresca, que aporta un toque de acidez frutal para equilibrar la riqueza del caramelo y los frutos secos. Es un snack denso, energético y lleno de texturas, ideal para recuperar fuerzas después de un entrenamiento o disfrutar como un capricho saludable.'),
(10, 'Berry Cream', 'Croissant con frambuesas frescas y crema', 'imagenes/galletas/12.png', '15', '50', 'Disponible','Esta opción ofrece un perfil fresco, frutal y equilibrado, combinando la ligereza de las bayas con una textura hojaldrada que aporta energía limpia y saciante. Está elaborado con una masa hojaldrada sin gluten y enriquecida con proteína aislada, lo que garantiza una digestión ligera y sin inflamación.El Relleno: Su interior está generosamente cubierto con una crema suave a base de fresas naturales, cremosa pero ligera, elaborada completamente sin lácteos para cuidar tu salud digestiva.La Cobertura: Por fuera, el croissant se baña con un delicado hilo de leche condensada vegana (hecha a base de coco o avena), decorado con frambuesas frescas picadas y hojuelas de avena integral sin gluten, aportando un toque crujiente y rústico.Para cerrar con el toque de la casa, la parte superior lleva un copete de crema batida de coco etérea y una cereza natural fresca en la cima, logrando el balance perfecto entre el dulzor de la leche condensada y la agradable acidez de los frutos rojos. Es un postre o snack funcional vibrante, nutritivo y perfecto para disfrutar a cualquier hora del día.'),
(11, 'Tropical Choco', 'Chocolate combinado con rodajas de kiwi y platano', 'imagenes/galletas/13.png', '15', '50', 'Disponible', 'Esta opción combina la frescura de las frutas tropicales con la intensidad del chocolate en una versión ligera, hojaldrada y diseñada para aportar energía limpia sin causar pesadez. Está elaborado con una masa sin gluten y enriquecida con proteína aislada, garantizando una digestión cómoda y un gran poder saciante.El Relleno: En su interior esconde una suave y aromática compota casera de frutas tropicales (como piña, mango y maracuyá), elaborada únicamente con los azúcares naturales de la fruta para mantener un perfil saludable.La Cobertura: Por fuera, el croissant se baña con un hilo de chocolate líquido oscuro y puro (libre de lácteos), decorado con trozos frescos de kiwi y banana, logrando un contraste perfecto de texturas, dulzor y acidez frutal.Para mantener la firma de toda tu línea, la parte superior se corona con un copete de crema batida a base de coco muy ligera y una cereza natural fresca en la cima. Es un postre vibrante, nutritivo y lleno de color, ideal como snack energético antes de entrenar o como un capricho refrescante a media tarde.'),
(12, 'Strawberry Lovers', 'Fresas frescas en cobertura de chocolate', 'imagenes/galletas/14.png', '15', '50', 'Disponible', 'Esta opción transforma el clásico y querido antojo de fresas con chocolate en un snack funcional, ligero y diseñado para aportar energía limpia sin inflamar el estómago. Está elaborado utilizando fresas frescas y enteras, seleccionadas en su punto óptimo de dulzor para garantizar la mejor calidad.La Cobertura: Las fresas se bañan generosamente en una cobertura de chocolate oscuro puro y libre de lácteos, la cual ha sido enriquecida con proteína aislada. Esto logra un contraste crujiente por fuera y jugoso por dentro, aportando además un excelente valor nutricional que ayuda a mantener la saciedad.El Toque Final: Siguiendo la firma de toda tu línea, se corona con un delicado copete de crema batida a base de coco muy ligera y de fácil digestión, finalizando en la cima con una cereza natural fresca que aporta un toque extra de color y acidez frutal.Es un postre elegante, refrescante, rico en antioxidantes y completamente libre de alérgenos comunes, ideal para disfrutar como un capricho saludable a cualquier hora del día o como un extra de energía limpia.'),
(13, 'Pistachio Dream', 'Crema de pistacho y pistachos sobre un croissant', 'imagenes/galletas/15.png', '15', '50', 'Disponible', 'Esta opción está diseñada para los amantes de los frutos secos que buscan un sabor sofisticado, una textura crujiente y una digestión ligera. Está elaborado con una masa hojaldrada sin gluten y enriquecida con proteína aislada, logrando una estructura aireada y saciante que aporta energía de forma estable sin causar pesadez.La Cobertura: El croissant se cubre con una generosa capa de crema de pistacho artesanal, elaborada de forma 100% vegetal (sin lácteos) para mantener su perfil saludable. Sobre ella, se espolvorea una lluvia de pistachos tostados y picados, aportando una textura intensamente crujiente y grasas saludables beneficiosas para el cuerpo.El Toque Final: Manteniendo la firma inconfundible de toda tu línea, la parte superior lleva un delicado copete de crema batida a base de coco muy ligera y una cereza natural fresca en la cima, logrando el equilibrio perfecto entre el toque salado y tostado del pistacho y la sutil dulzura de la crema.Es un postre o snack premium, energético y libre de alérgenos comunes, perfecto para disfrutar a media tarde o como un premio nutritivo después de un buen entrenamiento.'),
(14, 'Coffee Crush', 'Frappe de cafe con crema batida y salsa de caramelo', 'imagenes/galletas/17.png', '15', '50', 'Disponible', 'Esta opción transforma el clásico antojo de café helado en una bebida cremosa, refrescante y altamente nutritiva, diseñada para darte un impulso de energía limpia sin inflamar el estómago. Está elaborado con una base de café espresso de especialidad licuado con hielo, leche vegetal (como almendra o avena sin gluten) y enriquecido con proteína aislada, logrando una textura densa, suave y súper saciante.Los Complementos: El frappé se mezcla y se decora con hilos de una salsa de caramelo casera libre de lácteos, aportando notas dulces y tostadas que equilibran la intensidad del café sin necesidad de azúcares refinados.La Corona del Postre: Para mantener la firma inconfundible de toda tu línea, se sirve con una generosa base de crema batida de coco ligera, un toque extra de caramelo y, en la cima, una cereza natural fresca que aporta un toque de color y un contraste frutal perfecto.Es la bebida ideal para activar tus mañanas, usarla como un poderoso pre-entrenamiento o simplemente disfrutar de un capricho helado, energético y 100% amigable con tu salud digestiva.'),
(15, 'Caramel Vibes', 'Cafe helado con caramelo y crema batida.', 'imagenes/galletas/18.png', '15', '50', 'Disponible', 'Esta opción es perfecta para quienes buscan un impulso de energía refrescante, ligero y lleno de sabor, ideal para reactivar el día o tomar después de un buen entrenamiento. Está elaborado con una base de café espresso de alta calidad infusionado en frío o con hielo, mezclado con leche vegetal (como almendra o avena sin gluten) y enriquecido con proteína aislada, logrando una textura suave, sedosa y muy reconfortante.Los Toques de Caramelo: La bebida se endulza e infusiona de manera natural con una salsa de caramelo casera y libre de lácteos, logrando ese equilibrio perfecto entre el amargor del café y las notas tostadas y dulces del caramelo, sin causar pesadez estomacal.El Sello de la Casa: Siguiendo la firma inconfundible de toda tu línea, el vaso se corona con una porción de crema batida a base de coco muy ligera y etérea, decorada con hilos extra de caramelo y una cereza natural fresca en la cima que aporta el toque de color definitivo.Es un café helado premium, nutritivo, saciante y completamente libre de alérgenos comunes, diseñado para disfrutar del placer del café con caramelo cuidando al 100% tu bienestar y digestión.'),
(16, 'Berry Kiss', 'Batido de fresa con crema', 'imagenes/galletas/19.png', '15', '50', 'Disponible', 'Esta opción ofrece una experiencia refrescante, cremosa y llena de frescura frutal, diseñada para aportar antioxidantes y energía limpia sin inflamar el estómago. Está elaborado con una base densa de fresas naturales licuadas con leche vegetal (como almendra o coco) y enriquecido con proteína aislada, logrando una textura suave y muy reconfortante que ayuda a mantener la saciedad.El Interior Sorpresa: Dentro del batido se encuentran trozos de frutilla (fresa) fresca y láminas de almendra tostada, aportando un contraste masticable increíble y grasas saludables que benefician al cuerpo.La Cobertura Helada y el Sello de la Casa: El vaso viene decorado con una capa envolvente de crema helada vegetal, creando una textura tipo postre. Para mantener la firma inconfundible de toda tu línea, se corona en la parte superior con un delicado copete de crema batida a base de coco y una frutilla entera seleccionada en su punto óptimo de dulzor.Es el batido ideal para refrescar tus tardes, disfrutar como un snack post-entrenamiento o consentirte con un antojo frutal, nutritivo y 100% amigable con tu salud digestiva.'),
(17, 'Cookies & Cream', 'Galletas Oreo trituradas y una base cremosa', 'imagenes/galletas/20.png', '15', '50', 'Disponible', 'Galletas Oreo trituradas y una base cremosa, con un toque de crema batida y cereza en la parte superior.'),
(18, 'Matcha Mood', 'Leche fria, hielo y autentico matcha.', 'imagenes/galletas/21.png', '15', '50', 'Disponible', 'Leche fria, hielo y autentico matcha, con un toque de crema batida y cereza en la parte superior.'),
(19, 'Choco Latte Ice', 'Chocolate, cafe y leche fria sobre hielo', 'imagenes/galletas/22.png', '15', '50', 'Disponible', 'Chocolate, cafe y leche fria sobre hielo, con un toque de crema batida y cereza en la parte superior.');

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
(6, 10, 5, 75),
(1, 11, 1, 15),
(2, 11, 1, 15),
(3, 11, 1, 15),
(5, 12, 2, 30),
(15, 12, 2, 30),
(8, 13, 3, 45),
(10, 14, 1, 15),
(12, 14, 1, 15),
(16, 14, 2, 30),
(7, 15, 4, 60),
(4, 16, 2, 30),
(9, 17, 1, 15),
(13, 17, 2, 30),
(14, 18, 3, 45),
(2, 19, 2, 30),
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