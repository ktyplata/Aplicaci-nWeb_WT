-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2016 a las 01:26:24
-- Versión del servidor: 10.1.9-MariaDB-log
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `respaldo_agencia2`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addCliente` (IN `idC` INT, IN `nom` VARCHAR(100), IN `tel` VARCHAR(100), IN `dir` VARCHAR(100))  BEGIN
    DECLARE cant INT;
		SET cant=(SELECT count(idCliente) FROM cliente WHERE Nombre=nom);
	IF cant >0 then 
		SELECT "YA EXISTE";
    ELSE
	IF length( trim(nom))=0 THEN
		SELECT "Falta el nombre";
    ELSE 
    IF length( trim(tel))= 0 THEN
		SELECT "Falta el telefono";
    ELSE 
    IF length( trim(dir))= 0 THEN
		SELECT "Falta la dirección";
  
    ELSE 
INSERT INTO cliente VALUES (0, nom, tel, dir);
    	
END IF;
     END IF;
END IF;
END IF;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addCotizar` (IN `idVia` INT(11), IN `otel` INT(11), IN `pre` INT(11))  begin
	insert into cotizacionviaje values(0,idVia,otel,pre);
    
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addD` (IN `idD` INT, IN `lu` VARCHAR(100), IN `hora` DATETIME(5), IN `idH` INT)  BEGIN	
declare des int;
if length(ltrim(rtrim(lu)))>0 and length(ltrim(rtrim(hora)))>0 and length(ltrim(rtrim(idH )))>0 then
		set des = (select count(lu) from destino where  LugarLlegada=lu);
IF des> 0 then 
	SELECT "Ya existe";
ELSE 
		
	if des = 0 THEN 			
		INSERT INTO destino VALUES (0,lu,hora,idH );
	SELECT "Registro Agregado";
	
END IF;
END IF;
	else SELECT "Los campos estan vacios";
end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_adddescripcion` (IN `idVia` INT(11), IN `otel` INT(11))  begin
	insert into DescripcionHotel values(0,idVia,otel);
    if otel >= 7000 THEN
    SELECT "Es Hotel 5 estrellas 1 diamante";

   ELSE 
   if otel <= 7000 THEN
    SELECT "Es Hotel 5 estrellas";
    ELSE
    	SELECT"no hay registros";
    end IF;
    end IF;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addH` (IN `idH` INT, IN `cost` VARCHAR(100))  BEGIN
    DECLARE cant INT;
    SET cant=(SELECT count(idHotel) FROM hotel

WHERE idHotel=idH);

IF cant = 0 then 
SELECT "No Existe";
    ELSE
		UPDATE hotel SET costoHotel = cost  WHERE hotel.idHotel = idH;
		
    	if cost >= 7000 THEN
    SELECT "Es Hotel 5 estrellas 1 diamante";
    
   ELSE 
   if cost <= 7000 THEN
    SELECT "Es Hotel 5 estrellas";
    ELSE
    	SELECT"no hay registros";
    end IF;
END IF;

END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addHotel` (IN `idH` INT, IN `nomHot` VARCHAR(100), IN `dir` VARCHAR(100), IN `tel` VARCHAR(100), IN `cost` VARCHAR(100))  BEGIN
    DECLARE cant INT;
		SET cant=(SELECT count(idHotel) FROM hotel WHERE NombreHotel=nomHot);
	IF cant >0 then 
		SELECT "YA EXISTE";
    ELSE
	IF length( trim(nomHot))=0 THEN
		SELECT "Falta el nombre del hotel";
    ELSE 
    IF length( trim(dir))= 0 THEN
		SELECT "Falta la dirección";
    ELSE 
    IF length( trim(tel))= 0 THEN
		SELECT "Falta el telefono";
    ELSE 
    IF length( trim(cost))= 0 THEN
		SELECT "Falta el costo";
    ELSE 
INSERT INTO hotel VALUES (idH, nomHot, dir, tel, cost);
    	if cost >= 7000 THEN
    SELECT "Es Hotel 5 estrellas 1 diamante";

   ELSE 
   if cost <= 7000 THEN
    SELECT "Es Hotel 5 estrellas";
    ELSE
    	SELECT"no hay registros";
    end IF;
END IF;
     END IF;
END IF;
     END IF;
END IF;
END IF;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addPro` (IN `idP` INT, IN `lu` VARCHAR(100), IN `HoS` DATETIME(5), IN `idPro` INT)  BEGIN
DECLARE numL INT;

SET numL=(SELECT count(idProcedencia) FROM procedencia

WHERE LugarSalida = lu);

IF numL >0 then 

SELECT "Ya existe";

ELSE 
	if length(ltrim(rtrim(lu)))>0 and length(ltrim(rtrim(HoS)))>0 
	and length(ltrim(rtrim(idPro)))>0 then
INSERT INTO procedencia VALUES (0, lu, HoS, idPro);
	ELSE 
    SELECT "Faltan datos";
    
  END IF;
END IF ;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addProv` (IN `idP` INT, IN `nombre` VARCHAR(100), IN `tel` VARCHAR(100), IN `mail` VARCHAR(100), IN `dir` VARCHAR(100), IN `idT` INT)  BEGIN
	
declare nom int;
   	
if length(ltrim(rtrim(idP)))>0 and length(ltrim(rtrim(nombre)))>0 
    
and length(ltrim(rtrim(tel)))>0 and length(ltrim(rtrim(mail)))>0
   
 and length(ltrim(rtrim(dir)))>0 and length(ltrim(rtrim(idT)))>0 then
		
set nom = (select count(nombre) from proveedortransporte where Nombre= nombre);
		
if nom = 0 THEN 			
	INSERT INTO proveedortransporte  VALUES (0, nombre, tel, mail, dir, idT);
    
		SELECT "Registro Agregado";
	
END IF;
	else
		
SELECT "Los campos estan vacios";
end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addT` (IN `idT` INT, IN `lu` INT, IN `nom` VARCHAR(100))  BEGIN	
declare tra int;

	if length(ltrim(rtrim(lu)))>0 and length(ltrim(rtrim(nom)))>0 then
		set tra = (select count(lu) from transporte where  NomTransporte=nom);
IF tra > 0 then 
	SELECT "Ya existe";
ELSE 
		
	if tra = 0 THEN 			
		INSERT INTO transporte  VALUES (0,lu,nom );
	SELECT "Registro Agregado";
	
END IF;
END IF;
	else SELECT "Los campos estan vacios";
end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addV` (IN `idP` INT, IN `nom` VARCHAR(100), IN `pre` VARCHAR(100), IN `num` VARCHAR(100), IN `iti` VARCHAR(100), IN `lu` VARCHAR(100), IN `idC` INT, IN `idPr` INT, `idD` INT)  BEGIN
	
declare nov int;
   	
if length(ltrim(rtrim(idP)))>0 and length(ltrim(rtrim(nom)))>0 
    
and length(ltrim(rtrim(pre)))>0 and length(ltrim(rtrim(num)))>0
   
 and length(ltrim(rtrim(iti)))>0 and length(ltrim(rtrim(lu)))>0 
 and length(ltrim(rtrim(idC )))>0 and length(ltrim(rtrim(idPr)))>0 
 and length(ltrim(rtrim(idD)))>0 then
		
set nov = (select count(nom) from viajes where Nombre= nom);
		
if nov = 0 THEN 			
	INSERT INTO viajes  VALUES (0, nom, pre, num, iti,  lu, idC, idPr , idD );
		SELECT "Registro Agregado";
	
END IF;
	else
		
SELECT "Los campos estan vacios";
end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_BorrarCli` (IN `idC` INT)  BEGIN
    DECLARE cant INT;
    
	SET cant=(SELECT count(idCliente) FROM cliente
    WHERE idCliente=idC);
    
    IF cant = 0 then 
    
SELECT "No Existe";
    ELSE
		IF cant >= 5 then 
		SELECT "No se puede borrar el registro";
	ELSE 
    	DELETE FROM cliente WHERE cliente.idCliente = idC;
		IF cant <= 5 then 
		SELECT "Registro Borrado";
	END IF;    
	END IF;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_BorrarP` (IN `idP` INT)  BEGIN
    DECLARE cant INT;
    
	SET cant=(SELECT count(idProcedencia) FROM procedencia
    WHERE idProcedencia=idP);
    
    IF cant = 0 then 
    
SELECT "No Existe";
    ELSE
	DELETE FROM procedencia WHERE procedencia.idProcedencia = idP;
		IF cant <= 5 then 
		SELECT "Registro Borrado";
	ELSE 
		IF cant >= 5 then 
		SELECT "No se puede borrar el registro";
	END IF;    
	END IF;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delCotizar` (IN `idC` INT(11))  begin
	
    DELETE FROM cotizacionviaje  WHERE cotizacionviaje.idCotizacion=idC;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delDes` (IN `idD` INT)  BEGIN
    DECLARE des INT;
    
     set des= (select count(idDestino) from destino where idDestino=idD);
       IF des = 0 then 
    
SELECT "No Existe";
    ELSE
	DELETE FROM  destino WHERE destino.idDestino=idD;
		IF des <= 5 then 
		SELECT "Registro Borrado";
	ELSE 
		IF des >= 5 then 
		SELECT "No se puede borrar el registro";
	END IF;    
	END IF;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_deldescripcion` (IN `idD` INT(11))  begin
	
    DELETE FROM descripcionhotel WHERE descripcionhotel.idDesc=idD;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delHo` (IN `idH` INT)  BEGIN
    DECLARE cant INT;
    SET cant=(SELECT count(idHotel) FROM hotel

WHERE idHotel=idH);

IF cant = 0 then 
SELECT "No Existe";
    ELSE
		
        DELETE FROM hotel WHERE hotel.idHotel = idH;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delProv` (IN `idP` INT)  BEGIN
    DECLARE cant INT;
    
	SET cant=(SELECT count(idProveedor) FROM proveedortransporte 
    WHERE idProveedor=idP);
    
    IF cant = 0 then 
    
SELECT "No Existe";
    ELSE
	DELETE FROM proveedortransporte  WHERE proveedortransporte.idProveedor = idP;
		IF cant <= 5 then 
		SELECT "Registro Borrado";
	ELSE 
		IF cant >= 5 then 
		SELECT "No se puede borrar el registro";
	END IF;    
	END IF;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delT` (IN `idT` INT)  BEGIN
    DECLARE cant INT;
    
	SET cant=(SELECT count(idTransporte) FROM transporte 
    WHERE idTransporte = idT);
    
    IF cant = 0 then 
    
SELECT "No Existe";
    ELSE
	DELETE FROM transporte  WHERE transporte.idTransporte = idT;
		IF cant <= 5 then 
		SELECT "Registro Borrado";
	ELSE 
		IF cant >= 5 then 
		SELECT "No se puede borrar el registro";
	END IF;    
	END IF;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delV` (IN `idV` INT)  BEGIN
    DECLARE vi INT;
    set vi = (select count(idViajes) from viajes where idViajes=idV);
    
     IF vi = 0 then 
    
SELECT "No Existe";
    ELSE
	DELETE FROM  viajes  WHERE viajes.idViajes=idV;
		IF vi <= 5 then 
		SELECT "Registro Borrado";
	ELSE 
		IF vi >= 5 then 
		SELECT "No se puede borrar el registro";
	END IF;    
	END IF;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_upCliente` (IN `idC` INT, IN `nom` VARCHAR(100), IN `tel` VARCHAR(100), IN `dir` VARCHAR(100))  BEGIN
    DECLARE cant INT;
		SET cant=(SELECT count(idCliente) FROM cliente WHERE Nombre=nom);
if cant = 0 THEN
	IF length( trim(nom))=0 THEN
		SELECT "Falta el nombre";
    ELSE 
    IF length( trim(tel))= 0 THEN
		SELECT "Falta el telefono";
    ELSE 
    IF length( trim(dir))= 0 THEN
		SELECT "Falta la dirección";
  
    ELSE 
	
    UPDATE cliente SET Nombre=nom,  Telefono=tel, Direccion=dir  WHERE cliente.idCliente = idC;
     END IF;
END IF;
     END IF;
END IF;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_upD` (IN `idD` INT, IN `lu` VARCHAR(100), IN `hora` DATETIME(5), IN `idH` INT)  BEGIN	
declare des int;

set des = (select count(lu) from destino where  LugarLlegada=lu);

if length(ltrim(rtrim(lu)))>0 and length(ltrim(rtrim(hora)))>0 and length(ltrim(rtrim(idH )))>0 then

UPDATE  destino SET LugarLlegada=lu, HorarioLlegada=hora, idHotel=idH
    WHERE destino.idDestino=idD ;
		SELECT "Registro Actualizado";
	ELSE 
    SELECT "Faltan datos";
    
  END IF;

 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_upDes` (IN `idD` INT, IN `idV` INT(11), IN `ch` INT(11), IN `p` INT(11))  BEGIN	
declare des int;

set des = (select count(idV) from cotizacionviaje where  idViajes=idV);

if length(ltrim(rtrim(idV)))>0 and length(ltrim(rtrim(ch)))>0 and length(ltrim(rtrim(p )))>0 then

UPDATE  cotizacionviaje SET idViajes=idV, Costohotel=ch, Precio=p
    WHERE cotizacionviaje.idCotizacion=idD ;
		SELECT "Registro Actualizado";
	ELSE 
    SELECT "Faltan datos";
    
  END IF;

 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_upHote` (IN `idH` INT, IN `nom` VARCHAR(100), IN `dir` VARCHAR(100), IN `tel` VARCHAR(100), `cost` VARCHAR(100))  BEGIN
DECLARE can INT;

SET can=(SELECT count(idHotel) FROM hotel

WHERE idHotel = idH);
IF can = 0 then 

SELECT "No existe";

ELSE 
	UPDATE hotel  SET NombreHotel=nom, Direccion=dir, Telefono=tel, CostoHotel= cost 
    WHERE hotel.idHotel = idH;
    
    IF cost <=(SELECT MAX(CostoHotel) FROM hotel) then 
SELECT "El Precio es más barato";
	
ELSE 
IF cost >=(SELECT MIN(CostoHotel) FROM hotel) then 
SELECT "El Precio es caro";

END IF ;
END IF ;
END IF ;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_upHotel` (IN `idH` INT, IN `nomHot` VARCHAR(100), IN `dir` VARCHAR(100), IN `tel` VARCHAR(100), IN `cost` VARCHAR(100))  BEGIN
    DECLARE cant INT;
    SET cant=(SELECT count(idHotel) FROM hotel
WHERE NombreHotel=nomHot);
if cant = 0 THEN

	IF length( trim(nomHot))=0 THEN
		SELECT "Falta el nombre del hotel";
    ELSE 
    IF length( trim(dir))= 0 THEN
		SELECT "Falta la dirección";
    ELSE 
    IF length( trim(tel))= 0 THEN
		SELECT "Falta el telefono";
    ELSE 
    IF length( trim(cost))= 0 THEN
		SELECT "Falta el costo";
    ELSE 
    UPDATE hotel SET NombreHotel=nomHot, Direccion=dir, Telefono=tel, costoHotel = cost  WHERE hotel.idHotel = idH;
     END IF;
END IF;
     END IF;
END IF;
END IF;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_upPro` (IN `idP` INT, IN `lu` VARCHAR(100), IN `HoS` DATETIME(5), IN `idPro` INT)  BEGIN
DECLARE numL INT;

SET numL=(SELECT count(idProcedencia) FROM procedencia

WHERE idProcedencia = idP);

IF numL =0 then 

SELECT "No existe";

ELSE 
	if length(ltrim(rtrim(lu)))>0 and length(ltrim(rtrim(HoS)))>0 
	and length(ltrim(rtrim(idPro)))>0 then
UPDATE procedencia   SET LugarSalida = lu, HorarioSalida=HoS, idProveedor=idProveedor
    WHERE procedencia.idProcedencia = idP;
		SELECT "Registro Actualizado";
	ELSE 
    SELECT "Faltan datos";
    
  END IF;
END IF ;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_upProv` (IN `idP` INT, IN `nombre` VARCHAR(100), IN `tel` VARCHAR(100), IN `mail` VARCHAR(100), IN `dir` VARCHAR(100), IN `idT` INT)  BEGIN
	
declare pro int;
set pro = (select count(nombre) from proveedortransporte where Nombre= nombre);

if length(ltrim(rtrim(idP)))>0 and length(ltrim(rtrim(nombre)))>0 
    
and length(ltrim(rtrim(tel)))>0 and length(ltrim(rtrim(mail)))>0
   
 and length(ltrim(rtrim(dir)))>0 and length(ltrim(rtrim(idT)))>0 then
		
UPDATE proveedortransporte  SET Nombre=nombre, Telefono=telefono, Email=mail, Direccion=dir, idTransporte=idT
    WHERE proveedortransporte.idProveedor=idP;
		SELECT "Registro Actualizado";
	ELSE 
    SELECT "Faltan datos";
    
  END IF;

 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_upT` (IN `idT` INT, IN `lu` INT, IN `nom` VARCHAR(100))  BEGIN
DECLARE L INT;

SET L=(SELECT count(idTransporte) FROM transporte

WHERE idTransporte = idT);

IF L =0 then 

SELECT "No existe";

ELSE 
	if length(ltrim(rtrim(lu)))>0 and length(ltrim(rtrim(nom)))>0 then
UPDATE  transporte  SET NumLugares = lu, NomTransporte=nom
    WHERE transporte.idTransporte = idT;
		SELECT "Registro Actualizado";
	ELSE 
    SELECT "Faltan datos";
    
  END IF;
END IF ;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_upV` (IN `idV` INT, IN `nom` VARCHAR(100), IN `pre` VARCHAR(100), IN `num` VARCHAR(100), IN `iti` VARCHAR(100), IN `lu` VARCHAR(100), IN `idC` INT, IN `idPr` INT, `idD` INT)  BEGIN

	declare vi int;
set vi = (select count(nom) from viajes where Nombre= nom);


	if length(ltrim(rtrim(idV)))>0 and length(ltrim(rtrim(nom)))>0 
    
and length(ltrim(rtrim(pre)))>0 and length(ltrim(rtrim(num)))>0
   
 and length(ltrim(rtrim(iti)))>0 and length(ltrim(rtrim(lu)))>0 
 and length(ltrim(rtrim(idC )))>0 and length(ltrim(rtrim(idPr)))>0 
 and length(ltrim(rtrim(idD)))>0 then
		
UPDATE  viajes SET Nombre= nom, Precio= pre, NumEntradas =num, Itinerario= iti, LugaresVisitados=lu, idCliente=idC, idProcedencia=idPr, idDestino=idD
    WHERE viajes.idViajes=idV ;
		SELECT "Registro Actualizado";
	ELSE 
    SELECT "Faltan datos";
    
  END IF;

 END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `NombreC` varchar(100) NOT NULL,
  `Telefono` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `NombreC`, `Telefono`, `Direccion`) VALUES
(1, 'Katerine Plata', '4323456789', 'Maravatio'),
(2, 'Elena Carrillo', '1234543245', 'Puerto, Uripitio'),
(3, 'Josue Estrada', '7654565434', 'Puerto de Cabras'),
(4, 'Octavio Guerra Mora', '4323456876', 'Acambaro Gto.'),
(9, 'Pedro Suarez', '345696543 ', ' far far away  222'),
(10, 'Daniela', '879768978', 'jh'),
(11, 'JJ', '786', 'hgj'),
(12, 'kkk', '77777777777777777', 'jh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacionviaje`
--

CREATE TABLE `cotizacionviaje` (
  `idCotizacion` int(11) NOT NULL,
  `idViajes` int(11) NOT NULL,
  `Costohotel` int(11) NOT NULL,
  `Precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cotizacionviaje`
--

INSERT INTO `cotizacionviaje` (`idCotizacion`, `idViajes`, `Costohotel`, `Precio`) VALUES
(19, 2, 6789, 7890),
(20, 8, 4560, 13456),
(21, 3, 9087, 4567),
(23, 4, 9876, 8978),
(26, 1, 4560, 8907);

--
-- Disparadores `cotizacionviaje`
--
DELIMITER $$
CREATE TRIGGER `tg_Cot` AFTER INSERT ON `cotizacionviaje` FOR EACH ROW begin 
	
    update viajes set TotalViaje = TotalViaje +( new.CostoHotel + new.Precio) where  idViajes = new.idViajes;
    
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg_delCot` AFTER DELETE ON `cotizacionviaje` FOR EACH ROW begin 
	
    update viajes set TotalViaje = TotalViaje -( old.CostoHotel + old.Precio) where  idViajes = old.idViajes;
    
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcionhotel`
--

CREATE TABLE `descripcionhotel` (
  `idDesc` int(11) NOT NULL,
  `idViajes` int(11) NOT NULL,
  `CostoHotel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `descripcionhotel`
--

INSERT INTO `descripcionhotel` (`idDesc`, `idViajes`, `CostoHotel`) VALUES
(11, 12, 6789),
(12, 1, 4560),
(13, 2, 6789);

--
-- Disparadores `descripcionhotel`
--
DELIMITER $$
CREATE TRIGGER `tg_Descr` AFTER INSERT ON `descripcionhotel` FOR EACH ROW begin 

    update viajes set Preciohotel = Preciohotel + new.CostoHotel where  idViajes = new.idViajes;
    
     
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg_delDescr` AFTER DELETE ON `descripcionhotel` FOR EACH ROW begin 

    update viajes set Preciohotel = Preciohotel - old.CostoHotel where  idViajes = old.idViajes;
    
     
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `idDestino` int(11) NOT NULL,
  `LugarLlegada` varchar(100) NOT NULL,
  `HorarioLlegada` datetime(5) NOT NULL,
  `idHotel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`idDestino`, `LugarLlegada`, `HorarioLlegada`, `idHotel`) VALUES
(3, 'Cancun', '2016-01-28 04:14:00.00000', 1),
(4, 'Veracruz', '2016-01-29 08:19:00.00000', 2),
(5, 'Oaxaca', '2016-01-30 10:22:00.00000', 3),
(6, 'ChiapasSS', '2016-01-30 11:19:00.00000', 4),
(8, 'Acapulco', '2016-03-14 10:00:00.00000', 4),
(9, 'Mexico', '2016-08-12 18:00:00.00000', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `idHotel` int(11) NOT NULL,
  `NombreHotel` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Telefono` varchar(100) NOT NULL,
  `CostoHotel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`idHotel`, `NombreHotel`, `Direccion`, `Telefono`, `CostoHotel`) VALUES
(1, 'Fiesta Inn', 'Cancun calle', '567654567', '4560'),
(2, 'Hotel Dorado', 'Veracruz', '5679877655', '6789'),
(3, '5 Estrellas', 'Quintana Roo', '7654354678', '4567'),
(4, 'American Hotel', 'Yucatan', '6534578978', '9876'),
(6, 'Trivago', 'Merida', '46965477777', '9575'),
(8, 'Hotel California', 'calle ww', '345690654', '7890'),
(9, 'Diamantes', 'Por ahi', '6678990', '9654'),
(17, 'Villa Blanca', 'por donde', '2345', '9032'),
(18, 'Villa Real', 'lejos', '2345', '9032');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `inf_transporte`
--
CREATE TABLE `inf_transporte` (
`NumLugares` int(11)
,`NomTransporte` varchar(100)
,`nombre` varchar(100)
,`telefono` varchar(100)
,`email` varchar(100)
,`direccion` varchar(100)
,`LugarSalida` varchar(100)
,`HorarioSalida` datetime(5)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `lista completa de transporte`
--
CREATE TABLE `lista completa de transporte` (
`Nombre` varchar(100)
,`LugarSalida` varchar(100)
,`NomTransporte` varchar(100)
,`NumLugares` int(11)
,`HorarioSalida` datetime(5)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `lista de precios hotel-viaje`
--
CREATE TABLE `lista de precios hotel-viaje` (
`Promedio Costo Hotel` double
,`Presupuesto Costo Hotel` double
,`Máximo Costo Hotel` varchar(100)
,`Mínimo Costo Hotel` varchar(100)
,`Promedio Precios` double
,`Presupuesto Viajes` double
,`Máximo Precio` varchar(100)
,`Mínimo Precio` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `precios_v`
--
CREATE TABLE `precios_v` (
`CostoHotel` varchar(100)
,`nombre` varchar(100)
,`NombreHotel` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedencia`
--

CREATE TABLE `procedencia` (
  `idProcedencia` int(11) NOT NULL,
  `LugarSalida` varchar(100) NOT NULL,
  `HorarioSalida` datetime(5) NOT NULL,
  `idProveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `procedencia`
--

INSERT INTO `procedencia` (`idProcedencia`, `LugarSalida`, `HorarioSalida`, `idProveedor`) VALUES
(1, 'Acambaro', '2016-01-13 05:23:00.00000', 1),
(2, 'Celaya', '2016-01-14 11:25:00.00000', 2),
(3, 'Maravatio', '2016-01-16 12:18:00.00000', 3),
(4, 'Taranda', '2016-01-17 11:21:00.00000', 4),
(5, 'Atlacomulco', '2016-03-17 04:09:00.00000', 1),
(6, 'Santa Elena', '2016-02-17 04:09:00.00000', 2),
(7, 'Campo Hermoso', '2016-07-29 13:00:00.00000', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedortransporte`
--

CREATE TABLE `proveedortransporte` (
  `idProveedor` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Telefono` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `idTransporte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedortransporte`
--

INSERT INTO `proveedortransporte` (`idProveedor`, `Nombre`, `Telefono`, `Email`, `Direccion`, `idTransporte`) VALUES
(1, 'Juan Rios', '567545667', 'w@w.com', 'por ahi tambien', 1),
(2, 'Felipe Cruz', '5678976546789', 'f@f.com', 'ahi merito', 2),
(3, 'Luis Garcia', '6897556909', 'h@h.com', 'acambarito centro', 3),
(4, 'Anneth P', '43547787887', 'p@p.com.es', 'centrillo', 4),
(7, 'Nancy Rivera', '34455645', 'w@e', 'callecita', 1),
(8, 'Fernando V', '565745756', 'ktyplatacoffi13@gmail.com', 'hgfh', 1),
(9, 'Sara Garcia Rios', '456565465', 'ktyplatacoffi13@gmail.com', 'hjhgj', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `total cotización`
--
CREATE TABLE `total cotización` (
`Total Cotización` double
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE `transporte` (
  `idTransporte` int(11) NOT NULL,
  `NumLugares` int(11) NOT NULL,
  `NomTransporte` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transporte`
--

INSERT INTO `transporte` (`idTransporte`, `NumLugares`, `NomTransporte`) VALUES
(1, 3, 'Carro'),
(2, 2, 'Camion'),
(3, 5, 'combi'),
(4, 45, 'autobus'),
(5, 45, 'combi gde'),
(6, 23, 'taxi'),
(7, 21, 'carro'),
(8, 21, 'carro'),
(9, 21, 'carro'),
(10, 55, 'combi gde eeeexx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUsuario` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUsuario`, `user`, `password`) VALUES
(1, 'itati', '123'),
(2, 'elena', '1'),
(4, 'josue', 'j'),
(5, 'rodolfo', 'j'),
(9, 'sara', '3'),
(10, 'u', 'u'),
(11, 'josue', '122'),
(12, 'katy', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `idViajes` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Precio` varchar(100) NOT NULL,
  `NumEntradas` varchar(100) NOT NULL,
  `Itinerario` varchar(100) NOT NULL,
  `LugaresVisitados` varchar(100) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idProcedencia` int(11) NOT NULL,
  `idDestino` int(11) NOT NULL,
  `TotalViaje` int(11) NOT NULL,
  `Preciohotel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`idViajes`, `Nombre`, `Precio`, `NumEntradas`, `Itinerario`, `LugaresVisitados`, `idCliente`, `idProcedencia`, `idDestino`, `TotalViaje`, `Preciohotel`) VALUES
(1, 'Cancun', '8907', '5', 'muchos paseos', '7', 1, 1, 3, 13467, 4560),
(2, 'Veracruz', '7890', '4', 'paseos', '2', 2, 2, 4, 14679, 6789),
(3, 'Oaxaca', '9087', '6', 'paseos', '4', 3, 3, 5, 13654, 0),
(4, 'Chiapas', '8978', '5', 'muchos paeos', '8', 4, 4, 6, 18854, 0),
(7, 'Queretaro', '9027', '4', 'muchos paseosAAA', '7', 1, 1, 3, 0, 0),
(8, 'San Luis Potosi', '13456', '9', 'muchosisissimos', '3', 1, 2, 3, 18016, 0),
(10, 'Sinaloa', '5678', '7', 'nhcvbnv', '3', 9, 6, 3, 0, 0),
(11, 'Acapulco Guerrero', '6789', '9', 'lugarcillo', '9', 9, 4, 8, 0, 0),
(12, 'Chihuahua', '1234', '5', 'ghg', '3', 10, 1, 8, 0, 9876);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `viajes cliente`
--
CREATE TABLE `viajes cliente` (
`idCliente` int(11)
,`LugarSalida` varchar(100)
,`Nombre` varchar(100)
,`Precio` varchar(100)
,`LugarLlegada` varchar(100)
,`NombreHotel` varchar(100)
,`CostoHotel` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `viaje_destino`
--
CREATE TABLE `viaje_destino` (
`nombre` varchar(100)
,`precio` varchar(100)
,`NumEntradas` varchar(100)
,`LugarSalida` varchar(100)
,`LugarLlegada` varchar(100)
,`HorarioSalida` datetime(5)
,`HorarioLlegada` datetime(5)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `viaje_hotel`
--
CREATE TABLE `viaje_hotel` (
`nombre` varchar(100)
,`LugarSalida` varchar(100)
,`NombreHotel` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `inf_transporte`
--
DROP TABLE IF EXISTS `inf_transporte`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inf_transporte`  AS  select `transporte`.`NumLugares` AS `NumLugares`,`transporte`.`NomTransporte` AS `NomTransporte`,`proveedortransporte`.`Nombre` AS `nombre`,`proveedortransporte`.`Telefono` AS `telefono`,`proveedortransporte`.`Email` AS `email`,`proveedortransporte`.`Direccion` AS `direccion`,`procedencia`.`LugarSalida` AS `LugarSalida`,`procedencia`.`HorarioSalida` AS `HorarioSalida` from ((`proveedortransporte` join `transporte`) join `procedencia`) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `lista completa de transporte`
--
DROP TABLE IF EXISTS `lista completa de transporte`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lista completa de transporte`  AS  select `proveedortransporte`.`Nombre` AS `Nombre`,`procedencia`.`LugarSalida` AS `LugarSalida`,`transporte`.`NomTransporte` AS `NomTransporte`,`transporte`.`NumLugares` AS `NumLugares`,`procedencia`.`HorarioSalida` AS `HorarioSalida` from ((((`proveedortransporte` join `cliente`) join `procedencia`) join `transporte`) join `viajes`) where ((`viajes`.`idProcedencia` = `procedencia`.`idProcedencia`) and (`procedencia`.`idProveedor` = `proveedortransporte`.`idProveedor`) and (`proveedortransporte`.`idTransporte` = `transporte`.`idTransporte`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `lista de precios hotel-viaje`
--
DROP TABLE IF EXISTS `lista de precios hotel-viaje`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lista de precios hotel-viaje`  AS  (select avg(`hotel`.`CostoHotel`) AS `Promedio Costo Hotel`,sum(`hotel`.`CostoHotel`) AS `Presupuesto Costo Hotel`,max(`hotel`.`CostoHotel`) AS `Máximo Costo Hotel`,min(`hotel`.`CostoHotel`) AS `Mínimo Costo Hotel`,avg(`viajes`.`Precio`) AS `Promedio Precios`,sum(`viajes`.`Precio`) AS `Presupuesto Viajes`,max(`viajes`.`Precio`) AS `Máximo Precio`,min(`viajes`.`Precio`) AS `Mínimo Precio` from (`hotel` join `viajes`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `precios_v`
--
DROP TABLE IF EXISTS `precios_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `precios_v`  AS  select `hotel`.`CostoHotel` AS `CostoHotel`,`viajes`.`Nombre` AS `nombre`,`hotel`.`NombreHotel` AS `NombreHotel` from (`viajes` join `hotel`) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `total cotización`
--
DROP TABLE IF EXISTS `total cotización`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total cotización`  AS  (select sum((`hotel`.`CostoHotel` + `viajes`.`Precio`)) AS `Total Cotización` from (`hotel` join `viajes`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `viajes cliente`
--
DROP TABLE IF EXISTS `viajes cliente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viajes cliente`  AS  select `cliente`.`idCliente` AS `idCliente`,`procedencia`.`LugarSalida` AS `LugarSalida`,`viajes`.`Nombre` AS `Nombre`,`viajes`.`Precio` AS `Precio`,`destino`.`LugarLlegada` AS `LugarLlegada`,`hotel`.`NombreHotel` AS `NombreHotel`,`hotel`.`CostoHotel` AS `CostoHotel` from ((((`cliente` join `destino`) join `hotel`) join `viajes`) join `procedencia`) where ((`cliente`.`idCliente` = `viajes`.`idCliente`) and (`viajes`.`idProcedencia` = `procedencia`.`idProcedencia`) and (`viajes`.`idDestino` = `destino`.`idDestino`) and (`destino`.`idHotel` = `hotel`.`idHotel`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `viaje_destino`
--
DROP TABLE IF EXISTS `viaje_destino`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viaje_destino`  AS  select `viajes`.`Nombre` AS `nombre`,`viajes`.`Precio` AS `precio`,`viajes`.`NumEntradas` AS `NumEntradas`,`procedencia`.`LugarSalida` AS `LugarSalida`,`destino`.`LugarLlegada` AS `LugarLlegada`,`procedencia`.`HorarioSalida` AS `HorarioSalida`,`destino`.`HorarioLlegada` AS `HorarioLlegada` from ((`viajes` join `destino`) join `procedencia`) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `viaje_hotel`
--
DROP TABLE IF EXISTS `viaje_hotel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viaje_hotel`  AS  select `viajes`.`Nombre` AS `nombre`,`procedencia`.`LugarSalida` AS `LugarSalida`,`hotel`.`NombreHotel` AS `NombreHotel` from ((`procedencia` join `viajes`) join `hotel`) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `cotizacionviaje`
--
ALTER TABLE `cotizacionviaje`
  ADD PRIMARY KEY (`idCotizacion`),
  ADD KEY `idViaje` (`idViajes`);

--
-- Indices de la tabla `descripcionhotel`
--
ALTER TABLE `descripcionhotel`
  ADD PRIMARY KEY (`idDesc`),
  ADD KEY `idViaje` (`idViajes`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`idDestino`),
  ADD KEY `idHotel` (`idHotel`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`idHotel`);

--
-- Indices de la tabla `procedencia`
--
ALTER TABLE `procedencia`
  ADD PRIMARY KEY (`idProcedencia`),
  ADD KEY `idProveedor` (`idProveedor`),
  ADD KEY `idProveedor_2` (`idProveedor`);

--
-- Indices de la tabla `proveedortransporte`
--
ALTER TABLE `proveedortransporte`
  ADD PRIMARY KEY (`idProveedor`),
  ADD KEY `idTransporte` (`idTransporte`);

--
-- Indices de la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`idTransporte`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`idViajes`),
  ADD KEY `idCliente` (`idCliente`,`idProcedencia`,`idDestino`),
  ADD KEY `idProcedencia` (`idProcedencia`),
  ADD KEY `idDestino` (`idDestino`),
  ADD KEY `idCliente_2` (`idCliente`,`idProcedencia`,`idDestino`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `cotizacionviaje`
--
ALTER TABLE `cotizacionviaje`
  MODIFY `idCotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `descripcionhotel`
--
ALTER TABLE `descripcionhotel`
  MODIFY `idDesc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `idDestino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `hotel`
--
ALTER TABLE `hotel`
  MODIFY `idHotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `procedencia`
--
ALTER TABLE `procedencia`
  MODIFY `idProcedencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `proveedortransporte`
--
ALTER TABLE `proveedortransporte`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `transporte`
--
ALTER TABLE `transporte`
  MODIFY `idTransporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `idViajes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cotizacionviaje`
--
ALTER TABLE `cotizacionviaje`
  ADD CONSTRAINT `cotizacionviaje_ibfk_1` FOREIGN KEY (`idViajes`) REFERENCES `viajes` (`idViajes`);

--
-- Filtros para la tabla `destino`
--
ALTER TABLE `destino`
  ADD CONSTRAINT `destino_ibfk_1` FOREIGN KEY (`idHotel`) REFERENCES `hotel` (`idHotel`);

--
-- Filtros para la tabla `procedencia`
--
ALTER TABLE `procedencia`
  ADD CONSTRAINT `procedencia_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedortransporte` (`idProveedor`);

--
-- Filtros para la tabla `proveedortransporte`
--
ALTER TABLE `proveedortransporte`
  ADD CONSTRAINT `proveedortransporte_ibfk_1` FOREIGN KEY (`idTransporte`) REFERENCES `transporte` (`idTransporte`);

--
-- Filtros para la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD CONSTRAINT `viajes_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `viajes_ibfk_2` FOREIGN KEY (`idProcedencia`) REFERENCES `procedencia` (`idProcedencia`),
  ADD CONSTRAINT `viajes_ibfk_3` FOREIGN KEY (`idDestino`) REFERENCES `destino` (`idDestino`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
