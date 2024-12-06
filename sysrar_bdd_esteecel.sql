-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2024 a las 04:53:50
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sysrar_bdd_esteecel`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addProduct` (IN `id_client_add` INT, IN `id_user_add` INT, IN `id_product_add` INT, IN `quantity_add` INT)   BEGIN

DECLARE current_quantity DECIMAL(10,2);
DECLARE new_quantity DECIMAL(10,2);
DECLARE tasa_protegida DECIMAL(10,2);
DECLARE tasa_actual_bcv DECIMAL(10,2);
DECLARE tasa_actual_paralelo DECIMAL(10,2);
DECLARE sell_price_add DECIMAL(10,2);
DECLARE sell_price_add_bs DECIMAL(10,2);
DECLARE sell_price_detal DECIMAL(10,2);
DECLARE sell_price_mayor DECIMAL(10,2);
DECLARE id_type_actual INT;
DECLARE registro_tasa INT;

SET sell_price_add = 0;
SET sell_price_add_bs = 0;
SET registro_tasa = 0;
SET tasa_protegida = 0;
SET tasa_actual_bcv = 0;
SET tasa_actual_paralelo = 0;


-- SE GUARDA LA TASA PROTEGIDA SI EXISTE
	SET registro_tasa = (SELECT COUNT(*) FROM details_reserved WHERE id_user = id_user_add AND id_client = id_client_add LIMIT 1);
    IF registro_tasa > 0 THEN
    	SELECT tasa_bcv, tasa_paralelo INTO tasa_actual_bcv, tasa_actual_paralelo FROM details_reserved WHERE id_user = id_user_add AND id_client = id_client_add LIMIT 1;
    ELSE
        -- DE NO EXISTIR TASA PROTEGIDA, SE ESCOJE LAS TASAS ACTUALES
        SELECT tasa_bcv, tasa_paralelo INTO tasa_actual_bcv, tasa_actual_paralelo FROM configurations;
    END IF;

-- TIPO CLIENTE ACTUAL (DETAL 1 O MAYOR 2)
SELECT id_type INTO id_type_actual FROM clients WHERE id = id_client_add;
-- STOCK DEL PRODUCTO
SELECT price, second_price, stock INTO sell_price_detal, sell_price_mayor, current_quantity FROM products WHERE id = id_product_add;


IF current_quantity >= quantity_add THEN

SET new_quantity = current_quantity - quantity_add;
UPDATE products SET stock = new_quantity WHERE id = id_product_add;

	IF id_type_actual = 1 THEN
    	-- DETAL
    	SET sell_price_add = sell_price_detal;
        SET sell_price_add_bs = sell_price_add * tasa_actual_bcv;
        SET tasa_protegida = tasa_actual_bcv;
        
	ELSE 
    	-- MAYOR
		SET sell_price_add = sell_price_mayor;
        SET sell_price_add_bs = sell_price_add * tasa_actual_paralelo;
        SET tasa_protegida = tasa_actual_paralelo;
	END IF;
    
INSERT INTO details_reserved(id_client, id_user, id_product, quantity, sell_price, sell_price_bs, tasa_bcv, tasa_paralelo, tasa_select) VALUES (id_client_add, id_user_add, id_product_add, quantity_add, sell_price_detal, sell_price_add_bs, tasa_actual_bcv, tasa_actual_paralelo, tasa_protegida);

SELECT 'in', tasa_protegida;
ELSE

SELECT 'out';

END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addProductExist` (IN `quantity_add` INT, IN `id_client_add` INT, IN `id_user_add` INT, IN `id_product_add` INT)   BEGIN

DECLARE current_quantity DECIMAL(10,2);
DECLARE new_quantity DECIMAL(10,2);

DECLARE current_quantity_reserved DECIMAL(10,2);
DECLARE new_quantity_reserved DECIMAL(10,2);

SELECT stock INTO current_quantity FROM products WHERE id = id_product_add;

IF current_quantity >= quantity_add THEN 

SET new_quantity = current_quantity - quantity_add;
UPDATE products SET stock = new_quantity WHERE id = id_product_add;

SELECT quantity INTO current_quantity_reserved FROM details_reserved WHERE id_client = id_client_add AND id_user = id_user_add AND id_product = id_product_add;
SET new_quantity_reserved = current_quantity_reserved + quantity_add;
UPDATE details_reserved SET quantity = new_quantity_reserved WHERE id_client = id_client_add AND id_user = id_user_add AND id_product = id_product_add;
SELECT 'in';
ELSE 

SELECT 'out';
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarStock` (IN `id_product_add` INT, IN `costo_add` DECIMAL(10,2), IN `price_add` DECIMAL(10,2), IN `second_price_add` DECIMAL(10,2), IN `stock_add` INT, IN `id_user_add` INT)   BEGIN
DECLARE costo_actual DECIMAL(10,2);
DECLARE price_actual DECIMAL(10,2);
DECLARE second_price_actual DECIMAL(10,2);
DECLARE stock_actual INT;
DECLARE new_stock INT;

SELECT cost, price, second_price, stock INTO costo_actual, price_actual, second_price_actual, stock_actual FROM products WHERE id = id_product_add;
SET new_stock = stock_actual + stock_add;
INSERT INTO products_entries(id_product, quantity, old_quantity, cost, old_cost, price, old_price, second_price, old_second_price, id_user) VALUES(id_product_add, stock_add, stock_actual, costo_add, costo_actual, price_add, price_actual, second_price_add, second_price_actual, id_user_add);
UPDATE products SET stock = new_stock, cost = costo_add, price = price_add, second_price = second_price_add, date_changed = NOW() WHERE id = id_product_add;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delProduct` (IN `id_client_add` INT, IN `id_user_add` INT, IN `id_details_add` INT)   BEGIN

DECLARE current_stock DECIMAL(10,2);
DECLARE quantity_add DECIMAL(10,2);
DECLARE new_stock DECIMAL(10,2);
DECLARE id_product_add INT;

SELECT id_product, quantity INTO id_product_add, quantity_add FROM details_reserved WHERE id = id_details_add AND id_client = id_client_add AND id_user = id_user_add;

SELECT stock INTO current_stock FROM products WHERE id = id_product_add;
SET new_stock = current_stock + quantity_add;

UPDATE products SET stock = new_stock WHERE id = id_product_add;

DELETE FROM details_reserved WHERE id = id_details_add AND id_client = id_client_add AND id_user = id_user_add;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarFactura` (IN `id_bill_receive` INT, IN `id_user_receive` INT)   BEGIN

UPDATE bills SET id_status = '3' WHERE id = id_bill_receive;

SELECT * FROM bills WHERE id = id_bill_receive;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `emptyBill` (IN `id_client_add` INT, IN `id_user_add` INT)   BEGIN

  -- Crear una tabla temporal para almacenar los productos de details_reserved
  CREATE TEMPORARY TABLE tmp_productos_reservados (
    id_producto INT,
    cantidad DECIMAL(10,2)
  );

  -- Insertar los productos de details_reserved en la tabla temporal, filtrando por id_client y id_user
  INSERT INTO tmp_productos_reservados
    SELECT id_product, quantity
    FROM details_reserved
    WHERE id_client = id_client_add
      AND id_user = id_user_add;

  -- Actualizar el stock de products utilizando la tabla temporal
  UPDATE products p
  INNER JOIN tmp_productos_reservados t ON p.id = t.id_producto
  SET p.stock = p.stock + t.cantidad;

  -- Eliminar los registros de details_reserved que coincidan con los parámetros
  DELETE FROM details_reserved
  WHERE id_client = id_client_add
    AND id_user = id_user_add;

  -- Eliminar la tabla temporal
  DROP TEMPORARY TABLE tmp_productos_reservados;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getComissionUnd` (IN `start_date` VARCHAR(50), IN `end_date` VARCHAR(50))   BEGIN 
DECLARE total_quantity INT;
DECLARE comission DECIMAL(10,2);
DECLARE total_comission DECIMAL(10,2);

-- MAYOR


-- DETAL


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getConfig` (IN `id_user` INT)   BEGIN
  DECLARE user VARCHAR(255);
  DECLARE name VARCHAR(255);
  DECLARE email VARCHAR(255);
  DECLARE rol VARCHAR(255);
  DECLARE rif VARCHAR(255);
  DECLARE company_name VARCHAR(255);
  DECLARE company_email VARCHAR(255);
  DECLARE company_address VARCHAR(255);
  DECLARE company_phone VARCHAR(255);
  DECLARE tickera_name VARCHAR(255);
  DECLARE tasa_bcv DECIMAL(10,2);
  DECLARE tasa_paralelo DECIMAL(10,2);
  DECLARE comission_detal DECIMAL(10,2);
  DECLARE comission_mayor DECIMAL(10,2);
  DECLARE type_comission INT;
  DECLARE company_img_path VARCHAR(255);

  SELECT u.user, u.name, u.email, r.name AS rol INTO user, name, email, rol FROM users u LEFT JOIN roles r ON r.id = u.id_rol WHERE u.id = id_user;

  SELECT c.rif, c.company_name, c.company_email, c.company_address, c.company_phone, c.tickera_name, c.tasa_bcv, c.tasa_paralelo, c.comission_detal, c.comission_mayor, c.type_comission, c.company_img_path
  INTO rif, company_name, company_email, company_address, company_phone, tickera_name, tasa_bcv, tasa_paralelo, comission_detal, comission_mayor, type_comission,company_img_path
  FROM configurations c;

  SELECT
    user,
    name,
    email,
    rol,
    rif,
    company_name,
    company_email,
    company_address,
    company_phone,
    tickera_name,
    tasa_bcv,
    tasa_paralelo,
    comission_detal,
    comission_mayor,
    type_comission,
    company_img_path;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getConfiguration` ()   BEGIN

SELECT rif	,company_name,	company_email,	company_address,	company_phone, tickera_name FROM configurations;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getDashboard` ()   BEGIN
    	DECLARE userss int;
        DECLARE clientss int;
        
        DECLARE productss int;
        DECLARE sells int;
        DECLARE daysells int;
        
        SELECT COUNT(*) INTO userss FROM users WHERE id_status = 1;
        SELECT COUNT(*) INTO clientss FROM clients WHERE id_status = 1;
        
        SELECT COUNT(*) INTO productss FROM products;
        SELECT COUNT(*) INTO sells FROM bills WHERE id_status = 1;
        SELECT COUNT(*) INTO daysells FROM bills WHERE date_created > CURDATE() AND id_status = 1;
        
        SELECT userss, clientss, productss, sells, daysells;
        
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getDataClientFactura` (IN `id_factura_receive` INT)   BEGIN 



-- Clientes y Totales
SELECT b.id as id_bill, c.id as id_client, c.ced as client_ced, c.name as client_name, c.phone as client_phone, c.address as client_address, ct.name as client_type, u.name as user_name, b.date_created, b.total, b.total_bs, CASE WHEN b.ship = 1 THEN 'En Tienda' WHEN b.ship = 2 THEN 'Delivery' ELSE b.ship END AS retiro, s.name as status, b.tasa_bcv, b.comments FROM bills b LEFT JOIN clients c ON c.id = b.id_client LEFT JOIN users u ON u.id = b.id_user LEFT JOIN statuses s ON s.id = b.id_status LEFT JOIN clients_types ct ON ct.id = b.type_sale WHERE b.id = id_factura_receive;

 



END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getIncome` (IN `start_date` VARCHAR(200), IN `end_date` VARCHAR(200))   BEGIN 

SELECT pm.id as id_banco, CONCAT(pm.payment_code, ' - ' , c.name) as banco, SUM(p.monto) as monto FROM payments p LEFT JOIN payment_method pm ON pm.id = p.id_payment_method LEFT JOIN currencies c ON c.id = pm.id_currency LEFT JOIN payments_status ps ON ps.id = p.id_payments_status WHERE p.date_created BETWEEN start_date AND end_date GROUP BY pm.id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPaymentsFactura` (IN `id_factura_receive` INT)   BEGIN

-- Metodos de pago

SELECT CONCAT(pm.payment_code, ' - ', COALESCE(p.comments, ''), ' (', c.name, ')') AS payment_method, p.monto, c.id AS currency FROM payments p LEFT JOIN payment_method pm ON pm.id = p.id_payment_method LEFT JOIN currencies c ON c.id = pm.id_currency WHERE p.id_bill = id_factura_receive;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getProductByIdType` (IN `id_product_add` INT, IN `id_type_add` INT, IN `id_client_add` INT, IN `id_user_add` INT)   BEGIN

DECLARE registro_tasa INT;
DECLARE tasa_protegida DECIMAL(10,2);
DECLARE tasa_actual_bcv DECIMAL(10,2);
DECLARE tasa_actual_paralelo DECIMAL(10,2);

SET registro_tasa = 0;
SET tasa_protegida = 0;
SET tasa_actual_bcv = 0;
SET tasa_actual_paralelo = 0;

-- SE GUARDA LA TASA PROTEGIDA SI EXISTE
	SET registro_tasa = (SELECT COUNT(*) FROM details_reserved WHERE id_user = id_user_add AND id_client = id_client_add LIMIT 1);
    IF registro_tasa > 0 THEN
    	SELECT tasa_bcv, tasa_paralelo INTO tasa_actual_bcv, tasa_actual_paralelo FROM details_reserved WHERE id_user = id_user_add AND id_client = id_client_add LIMIT 1;
    ELSE
        -- DE NO EXISTIR TASA PROTEGIDA, SE ESCOJE LAS TASAS ACTUALES
        SELECT tasa_bcv, tasa_paralelo INTO tasa_actual_bcv, tasa_actual_paralelo FROM configurations;
    END IF;
    
    IF id_type_add = 1 THEN
    	-- DETAL
        SET tasa_protegida = tasa_actual_bcv;
        
        SELECT p.id, p.name, p.model, p.cost, p.price, p.stock, p.stock_warranty, p.id_user, u.name as user, p.id_status, s.name as status, tasa_protegida FROM products p LEFT JOIN users u ON u.id = p.id_user LEFT JOIN statuses s ON s.id = p.id_status LEFT JOIN configurations c ON 1=1 WHERE p.id_status != 3 AND p.id = id_product_add;
	ELSE 
    	-- MAYOR
        SET tasa_protegida = tasa_actual_paralelo;
        
        SELECT p.id,  p.name, p.model, p.cost, p.second_price AS price, p.stock, p.stock_warranty, p.id_user, u.name as user, p.id_status, s.name as status, tasa_protegida FROM products p LEFT JOIN users u ON u.id = p.id_user LEFT JOIN statuses s ON s.id = p.id_status LEFT JOIN configurations c ON 1=1 WHERE p.id_status != 3 AND p.id = id_product_add;
	END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getProductsFactura` (IN `id_factura_receive` INT)   BEGIN
-- Productos
SELECT CONCAT(p.name, ' ', p.model) AS product_name, db.quantity, db.sell_price, db.sell_price_bs, ROUND((db.quantity * db.sell_price), 2) as product_total, ROUND((db.quantity * db.sell_price_bs), 2) as product_totalbs, SUM(db.quantity) OVER() as total_quantity FROM bills b LEFT JOIN details_bills db ON db.id_bill = b.id LEFT JOIN products p ON p.id = db.id_product WHERE b.id = id_factura_receive;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `overrideBill` (IN `bill_id` INT, IN `motivo` VARCHAR(100))   BEGIN
    	DECLARE existe_factura int;
        DECLARE registros int;
        DECLARE a int;
        
        DECLARE cod_producto int;
        DECLARE cant_producto int;
        DECLARE existencia_actual int;
        DECLARE nueva_existencia int;
        
        SET existe_factura = (SELECT COUNT(*) FROM bills WHERE id = bill_id AND id_status = 4);
        
        IF existe_factura > 0 THEN
        	CREATE TEMPORARY TABLE tbl_tmp(
            id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            cod_prod BIGINT,
            cant_prod int);
            
            SET a = 1;
            
            SET registros = (SELECT COUNT(*) FROM details_bills WHERE id_bill = bill_id);
            
            IF registros > 0 THEN
            	
                INSERT INTO tbl_tmp(cod_prod,cant_prod) SELECT id, quantity FROM details_bills WHERE id_bill = bill_id;
                
                WHILE a <= registros DO
                	SELECT cod_prod, cant_prod INTO cod_producto, cant_producto FROM tbl_tmp WHERE id = a;
                    SELECT stock INTO existencia_actual FROM products WHERE id = cod_producto;
                    SET nueva_existencia = existencia_actual + cant_producto;
                    UPDATE products SET stock = nueva_existencia WHERE id = cod_producto;
                    
                    SET a=a+1;
                    
                END WHILE;
                UPDATE bills SET id_status = 6, comments = motivo WHERE id = bill_id;
                DROP TABLE tbl_tmp;
                
                SELECT * FROM bills WHERE id = bill_id;
            END IF;
        END IF;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `procesarVenta` (IN `id_user_set` INT, IN `id_client_set` INT, IN `idmethod1` INT, IN `method1` VARCHAR(100), IN `idmethod2` INT, IN `method2` VARCHAR(100), IN `idmethod3` INT, IN `method3` VARCHAR(100), IN `idmethod4` INT, IN `method4` VARCHAR(100), IN `idmethod5` INT, IN `method5` VARCHAR(100), IN `idmethod6` INT, IN `method6` VARCHAR(100), IN `ship_new` INT, IN `credito` INT, IN `banco4` VARCHAR(100), IN `banco5` VARCHAR(100), IN `banco6` VARCHAR(100))   BEGIN
		 DECLARE id_new_bill INT;
		 DECLARE registros INT;
         DECLARE totalbill DECIMAL(10,2);
         DECLARE totalbillbss DECIMAL(60,2);
         DECLARE tasadia_actual DECIMAL(60,2);
         DECLARE estatus_actual INT;
         DECLARE tmp_cod_producto int;
         DECLARE tmp_cant_producto int;
         DECLARE tmp_cod_cliente int;
         DECLARE type_comission_new int;
         DECLARE comission_detal_new DECIMAL(10,2);
         DECLARE comission_mayor_new DECIMAL(10,2);
         DECLARE comission_total_new DECIMAL(10,2);
         DECLARE type_sale_new INT;
         DECLARE comission_actual DECIMAL(10,2);
         DECLARE registro_salarial INT;
         DECLARE comission_sale DECIMAL(10,2);
         DECLARE total_salary_actual DECIMAL(10,2);
         DECLARE total_salary_new DECIMAL(10,2);
         DECLARE base_salary DECIMAL(10,2);
         DECLARE cantidad_empleados INT;
         DECLARE is_credito INT;
         DECLARE a int;
         SET a = 1;
         -- Credito a Inactivo
         SET is_credito = 2;
         
         SELECT salary INTO base_salary FROM users WHERE id = id_user_set;
         SELECT tasa_bcv, comission_detal, comission_mayor, type_comission INTO tasadia_actual, comission_detal_new, comission_mayor_new, type_comission_new FROM configurations;
         SELECT id_type INTO type_sale_new FROM clients WHERE id = id_client_set;
         SET registros = (SELECT COUNT(*) FROM details_reserved WHERE id_user = id_user_set AND id_client = id_client_set);
         SELECT SUM(sell_price * quantity) as total, SUM(sell_price_bs * quantity) as total_bs INTO totalbill, totalbillbss FROM details_reserved WHERE id_client = id_client_set AND id_user = id_user_set;
         -- Si es credito
         IF credito = 1 THEN
         -- Pendiente
         SET is_credito = 5;
         ELSE
         -- No es credito
         -- Procesado
         SET is_credito = 4;
         END IF;
         
         IF registros > 0 THEN 
         
         INSERT INTO bills(total, total_bs,tasa_bcv, tasa_paralelo, ship, type_comission, type_sale, id_client, id_status, id_user) VALUES(totalbill, totalbillbss,tasadia_actual,tasadia_actual, ship_new, type_comission_new, type_sale_new, id_client_set, is_credito, id_user_set);
         
         SET id_new_bill = LAST_INSERT_ID();
         
         /*INSERT INTO payments(id_bill, id_payment_method, id_payments_status, monto, id_payment_method2, monto2, id_payment_method3, monto3, id_payment_method4, monto4) VALUES(id_new_bill, idmethod1, '1', method1, idmethod2, method2, idmethod3, method3, idmethod4, method4);*/
         
         /*INSERT INTO payments(id_bill, id_payment_method, id_payments_status, monto) VALUES(id_new_bill, idmethod1, '1', method1);
         INSERT INTO payments(id_bill, id_payment_method, id_payments_status, monto) VALUES(id_new_bill, idmethod2, '1', method2);
         INSERT INTO payments(id_bill, id_payment_method, id_payments_status, monto) VALUES(id_new_bill, idmethod3, '1', method3);
         INSERT INTO payments(id_bill, id_payment_method, id_payments_status, monto) VALUES(id_new_bill, idmethod4, '1', method4);*/
                 -- Validar si method1 es mayor a 0 antes de insertar
          IF method1 > 0 THEN
            INSERT INTO payments(id_bill, id_payment_method, id_payments_status, monto) VALUES(id_new_bill, idmethod1, '1', method1);
          END IF;

          -- Validar si method2 es mayor a 0 antes de insertar
          IF method2 > 0 THEN
            INSERT INTO payments(id_bill, id_payment_method, id_payments_status, monto) VALUES(id_new_bill, idmethod2, '1', method2);
          END IF;

          -- Validar si method3 es mayor a 0 antes de insertar
          IF method3 > 0 THEN
            INSERT INTO payments(id_bill, id_payment_method, id_payments_status, monto) VALUES(id_new_bill, idmethod3, '1', method3);
          END IF;

          -- Validar si method4 es mayor a 0 antes de insertar
          IF method4 > 0 THEN
            INSERT INTO payments(id_bill, id_payment_method, id_payments_status, monto, comments) VALUES(id_new_bill, idmethod4, '1', method4, banco4);
          END IF;
          
          -- Validar si method5 es mayor a 0 antes de insertar
          IF method5 > 0 THEN
            INSERT INTO payments(id_bill, id_payment_method, id_payments_status, monto, comments) VALUES(id_new_bill, idmethod5, '1', method5, banco5);
          END IF;
          
          -- Validar si method6 es mayor a 0 antes de insertar
          IF method6 > 0 THEN
            INSERT INTO payments(id_bill, id_payment_method, id_payments_status, monto, comments) VALUES(id_new_bill, idmethod6, '1', method6, banco6);
          END IF;
          
         -- POR UND
         IF type_comission_new = 3 THEN
     	 	-- MAYOR -- tomar comision_mayor de la config y el total de articulos para calcular la comision total
         	IF type_sale_new = 2 THEN
            SELECT (SUM(quantity) * comission_mayor_new), comission_mayor_new INTO comission_total_new, comission_actual FROM details_reserved WHERE id_user = id_user_set AND id_client = id_client_set;
            -- DETAL -- tomar comision_detal de la config y el total de articulos para calcular la comision total, FALTA REPARTIR LA COMISION ENTRE LOS VENDEDORES
            ELSE
            SELECT (SUM(quantity) * comission_detal_new), comission_detal_new INTO comission_total_new, comission_actual FROM details_reserved WHERE id_user = id_user_set AND id_client = id_client_set;
            END IF;
         	
         -- POR MONTO TOTAL
         ELSEIF type_comission_new = 2 THEN 
         	-- MAYOR -- tomar comision_mayor de la config y el total de venta para calcular la comision total
         	IF type_sale_new = 2 THEN
            SELECT (SUM(sell_price * quantity) * comission_mayor_new), comission_mayor_new INTO comission_total_new, comission_actual FROM details_reserved WHERE id_user = id_user_set AND id_client = id_client_set;
            -- DETAL -- tomar comision_detal de la config y el total de venta para calcular la comision total, FALTA REPARTIR LA COMISION ENTRE LOS VENDEDORES
            ELSE
            SELECT (SUM(sell_price * quantity) * comission_detal_new), comission_detal_new INTO comission_total_new, comission_actual FROM details_reserved WHERE id_user = id_user_set AND id_client = id_client_set;
            END IF;
         -- SIN COMISION 
         ELSE 
         SET comission_actual = 0;
         SET comission_total_new = 0;
         END IF;
         
         INSERT INTO comissions(comission, comission_total, id_bill, id_user, id_status) SELECT comission_actual, comission_total_new, id_new_bill, id_user_set, '1' FROM (SELECT * FROM users WHERE id = id_user_set AND id_rol != 1) AS filtered_users;
         
         SET registro_salarial = (SELECT COUNT(*) FROM employees_salaries WHERE id_user = id_user_set);
         SET cantidad_empleados = (SELECT COUNT(*) FROM users WHERE id_rol = 2 AND id_status = 1);
         SELECT SUM(comission_total) INTO comission_sale FROM comissions WHERE id_user = id_user_set AND id_status = 1;
         
         -- Para tomar alguna comision que no actualizo status y por ende no fue tomada en cuenta
         UPDATE comissions SET id_status = 2 WHERE id_user = id_user_set AND id_status = 1;
         
         -- Para asegurar que no volvera a ser tomada en cuenta la comision
         UPDATE comissions SET id_status = 2 WHERE id_bill = id_new_bill;
         
         IF registro_salarial > 0 THEN
         
            SELECT total_salary INTO total_salary_actual FROM employees_salaries WHERE id_user = id_user_set;
            SET total_salary_new = total_salary_actual + comission_sale;
            UPDATE employees_salaries SET total_salary = total_salary_new WHERE id_user = id_user_set;
            
            
         ELSE
         
            SET total_salary_new = base_salary + comission_sale;
         	INSERT INTO employees_salaries(id_user, type_salary, total_salary, id_status, period) VALUES(id_user_set, 'Salario quincenal', total_salary_new, '5', CURDATE());
            
            
         END IF;
         
		 
         
         INSERT INTO details_bills(quantity, sell_price, sell_price_bs, id_bill, id_product) SELECT quantity, sell_price, sell_price_bs, (id_new_bill) as id_bill, id_product FROM details_reserved WHERE id_user = id_user_set AND id_client = id_client_set;
		DELETE FROM details_reserved WHERE id_user = id_user_set AND id_client = id_client_set;
        SELECT * FROM bills WHERE id = id_new_bill;
        ELSE
        SELECT 0;
		END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `total` varchar(45) DEFAULT NULL,
  `total_bs` varchar(45) DEFAULT NULL,
  `tasa_bcv` varchar(45) DEFAULT NULL,
  `tasa_paralelo` varchar(45) DEFAULT NULL,
  `ship` varchar(45) DEFAULT NULL,
  `type_comission` int(11) NOT NULL,
  `type_sale` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comments` varchar(100) DEFAULT NULL,
  `date_created` varchar(45) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bills`
--

INSERT INTO `bills` (`id`, `total`, `total_bs`, `tasa_bcv`, `tasa_paralelo`, `ship`, `type_comission`, `type_sale`, `id_client`, `id_status`, `id_user`, `comments`, `date_created`) VALUES
(1, '6.00', '216.00', '36.07', '36.07', NULL, 3, 2, 4, 4, 1, NULL, '2024-04-20 18:35:48'),
(2, '4.00', '144.28', '36.07', '36.07', NULL, 3, 2, 4, 4, 1, NULL, '2024-04-20 20:08:59'),
(3, '4.00', '144.28', '36.07', '36.07', NULL, 3, 2, 4, 4, 1, NULL, '2024-04-20 20:09:20'),
(4, '15.00', '545.25', '36.35', '36.35', NULL, 3, 1, 3, 4, 1, NULL, '2024-04-24 07:19:25'),
(5, '8.00', '290.80', '36.35', '36.35', NULL, 3, 2, 1, 4, 1, NULL, '2024-04-24 18:46:50'),
(6, '80.00', '2908.00', '36.35', '36.35', NULL, 3, 1, 3, 4, 1, NULL, '2024-04-24 18:47:50'),
(7, '2.00', '72.70', '36.35', '36.35', NULL, 3, 1, 3, 4, 4, NULL, '2024-04-25 12:28:58'),
(8, '26.00', '945.10', '36.35', '36.35', NULL, 3, 2, 1, 4, 1, NULL, '2024-04-25 12:41:55'),
(9, '10.00', '363.50', '36.35', '36.35', '1', 3, 2, 1, 4, 1, NULL, '2024-04-25 17:07:48'),
(10, '22.00', '799.70', '36.35', '36.35', '1', 3, 2, 1, 4, 1, NULL, '2024-04-25 17:12:55'),
(11, '40.00', '1454.00', '36.35', '36.35', '1', 3, 2, 4, 4, 1, NULL, '2024-04-25 17:13:47'),
(12, '74.00', '2689.90', '36.35', '36.35', '2', 3, 1, 3, 4, 1, NULL, '2024-04-25 17:17:31'),
(13, '7.00', '254.45', '36.35', '36.35', '2', 3, 1, 3, 4, 1, NULL, '2024-04-25 18:46:53'),
(14, '7.00', '254.45', '36.35', '36.35', '1', 3, 1, 3, 4, 1, NULL, '2024-04-25 20:07:33'),
(15, '18.00', '654.30', '36.35', '36.35', '1', 3, 2, 4, 4, 1, NULL, '2024-04-25 20:09:34'),
(16, '28.00', '1017.80', '36.35', '36.35', '1', 3, 2, 1, 4, 4, NULL, '2024-04-25 20:09:59'),
(17, '1.80', '65.44', '36.35', '36.35', '1', 3, 2, 4, 4, 1, NULL, '2024-04-27 18:25:23'),
(18, '8.00', '290.80', '36.35', '36.35', '2', 3, 1, 3, 4, 4, NULL, '2024-04-27 22:38:33'),
(19, '2.00', '72.70', '36.35', '36.35', '1', 3, 2, 1, 4, 4, NULL, '2024-04-27 22:59:40'),
(20, '15.20', '552.56', '36.35', '36.35', '1', 3, 2, 1, 4, 4, NULL, '2024-04-27 23:02:46'),
(21, '6.00', '218.10', '36.35', '36.35', '1', 3, 2, 1, 4, 4, NULL, '2024-04-27 23:06:17'),
(22, '6.00', '218.10', '36.35', '36.35', '1', 3, 2, 1, 4, 4, NULL, '2024-04-27 23:09:45'),
(23, '56.00', '2035.60', '36.35', '36.35', '1', 2, 1, 3, 4, 4, NULL, '2024-04-27 23:19:28'),
(24, '60.00', '2181.00', '36.35', '36.35', '1', 2, 2, 1, 4, 6, NULL, '2024-04-28 13:04:13'),
(25, '35.00', '1272.25', '36.35', '36.35', '1', 2, 1, 3, 4, 6, NULL, '2024-04-28 13:04:57'),
(26, '7.00', '254.45', '36.35', '36.35', '1', 2, 1, 3, 4, 4, NULL, '2024-05-16 14:26:47'),
(27, '4.00', '145.40', '36.35', '36.35', '2', 2, 2, 4, 6, 4, 'Me equivoque', '2024-07-12 22:51:00'),
(28, '6.00', '218.10', '36.82', '36.82', '1', 2, 2, 4, 5, 4, NULL, '2024-09-24 23:39:16'),
(29, '9.00', '327.15', '36.82', '36.82', '1', 2, 1, 3, 5, 4, NULL, '2024-09-24 23:44:57'),
(30, '6.00', '218.10', '36.82', '36.82', '1', 2, 1, 3, 3, 4, NULL, '2024-09-24 23:46:21'),
(31, '7.00', '280.00', '40.00', '40.00', '1', 2, 1, 3, 4, 4, NULL, '2024-10-14 23:52:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `ced` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_user_created` int(11) NOT NULL,
  `id_user_changed` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_changed` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `ced`, `name`, `phone`, `address`, `email`, `id_user_created`, `id_user_changed`, `id_type`, `id_status`, `date_created`, `date_changed`) VALUES
(1, '0001', 'MAYOR', '04128491113', 'Caña de azucar, sector 5', 'robertalejandro2916@gmail.com', 1, 1, 2, 1, '2024-02-25 18:10:36', '2024-02-25 18:10:36'),
(2, '27681789', 'Adrian', '041284988888', 'Caña de azucar, sector 2', 'adrianrincon2306@gmail.com', 1, 1, 1, 3, '2024-02-25 19:41:57', '2024-02-25 19:41:57'),
(3, '0000', 'DETAL', '04121234567', 'Caña de azucar, sector 5', 'myg@gmail.com', 1, 0, 1, 1, '2024-02-27 08:35:42', '2024-02-27 08:35:42'),
(4, '27681788', 'Robert', '04128491113', 'Caña de azúcar, sector 2', 'robertalejandro11@gmail.com', 1, 0, 2, 1, '2024-04-18 18:05:48', '2024-04-18 18:05:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients_types`
--

CREATE TABLE `clients_types` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clients_types`
--

INSERT INTO `clients_types` (`id`, `name`) VALUES
(1, 'DETAL'),
(2, 'MAYOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combos`
--

CREATE TABLE `combos` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `id_status` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comissions`
--

CREATE TABLE `comissions` (
  `id` int(11) NOT NULL,
  `comission` decimal(10,2) NOT NULL,
  `comission_total` decimal(10,2) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comissions`
--

INSERT INTO `comissions` (`id`, `comission`, `comission_total`, `id_bill`, `id_user`, `id_status`) VALUES
(1, '0.10', '0.50', 13, 1, 1),
(5, '0.05', '0.25', 16, 4, 2),
(6, '0.10', '0.40', 18, 4, 2),
(7, '0.05', '0.05', 19, 4, 2),
(8, '0.05', '0.60', 20, 4, 2),
(9, '0.05', '0.05', 21, 4, 2),
(10, '0.05', '0.05', 22, 4, 2),
(11, '0.10', '5.60', 23, 4, 2),
(12, '0.05', '3.00', 24, 6, 2),
(13, '0.10', '3.50', 25, 6, 2),
(14, '0.10', '0.70', 26, 4, 2),
(15, '0.05', '0.20', 27, 4, 2),
(16, '0.05', '0.30', 28, 4, 2),
(17, '0.10', '0.90', 29, 4, 2),
(18, '0.10', '0.60', 30, 4, 2),
(19, '0.10', '0.70', 31, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configurations`
--

CREATE TABLE `configurations` (
  `id` int(11) NOT NULL,
  `rif` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `company_address` varchar(100) NOT NULL,
  `company_phone` varchar(100) NOT NULL,
  `tickera_name` varchar(100) DEFAULT NULL,
  `company_img_path` varchar(45) DEFAULT NULL,
  `tasa_bcv` decimal(16,2) NOT NULL,
  `tasa_paralelo` decimal(16,2) NOT NULL,
  `comission_detal` decimal(16,2) NOT NULL,
  `comission_mayor` decimal(16,2) NOT NULL,
  `type_comission` int(11) NOT NULL DEFAULT 1,
  `current_plan_key` varchar(255) NOT NULL,
  `date_changed` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `configurations`
--

INSERT INTO `configurations` (`id`, `rif`, `company_name`, `company_email`, `company_address`, `company_phone`, `tickera_name`, `company_img_path`, `tasa_bcv`, `tasa_paralelo`, `comission_detal`, `comission_mayor`, `type_comission`, `current_plan_key`, `date_changed`) VALUES
(1, 'J-40241506-0', 'Esteecel,C.A.', 'esteecel2ventas1@gmail.com', 'C.C Torrente, PB 06-07, Maracay, Edo.Aragua.', '04243050475', 'POS-5801', '../../public/img/logo_empresa.jpg', '38.88', '47.00', '0.10', '0.05', 2, 'KEY', '2024-02-26 17:47:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `currencies`
--

INSERT INTO `currencies` (`id`, `name`) VALUES
(1, 'Bolivar'),
(2, 'Dolar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details_bills`
--

CREATE TABLE `details_bills` (
  `id` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `sell_price` decimal(10,2) NOT NULL,
  `sell_price_bs` decimal(10,2) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `details_bills`
--

INSERT INTO `details_bills` (`id`, `quantity`, `sell_price`, `sell_price_bs`, `id_bill`, `id_product`, `date_created`) VALUES
(1, '1.00', '6.00', '216.00', 1, 1, '2024-04-20 18:35:48'),
(2, '2.00', '2.00', '72.14', 2, 2, '2024-04-20 20:08:59'),
(3, '2.00', '2.00', '72.14', 3, 2, '2024-04-20 20:09:20'),
(4, '5.00', '3.00', '109.05', 4, 2, '2024-04-24 07:19:25'),
(5, '2.00', '4.00', '145.40', 5, 5, '2024-04-24 18:46:50'),
(6, '4.00', '20.00', '727.00', 6, 8, '2024-04-24 18:47:50'),
(7, '2.00', '1.00', '36.35', 7, 4, '2024-04-25 12:28:58'),
(8, '2.00', '6.00', '218.10', 8, 1, '2024-04-25 12:41:55'),
(9, '1.00', '2.00', '72.70', 8, 2, '2024-04-25 12:41:55'),
(10, '1.00', '4.00', '145.40', 8, 3, '2024-04-25 12:41:55'),
(11, '2.00', '4.00', '145.40', 8, 5, '2024-04-25 12:41:55'),
(15, '1.00', '6.00', '218.10', 9, 1, '2024-04-25 17:07:48'),
(16, '1.00', '4.00', '145.40', 9, 3, '2024-04-25 17:07:48'),
(18, '1.00', '18.00', '654.30', 10, 8, '2024-04-25 17:12:55'),
(19, '1.00', '4.00', '145.40', 10, 11, '2024-04-25 17:12:55'),
(21, '2.00', '2.00', '72.70', 11, 2, '2024-04-25 17:13:47'),
(22, '4.00', '4.00', '145.40', 11, 5, '2024-04-25 17:13:47'),
(23, '5.00', '4.00', '145.40', 11, 3, '2024-04-25 17:13:47'),
(24, '6.00', '5.00', '181.75', 12, 3, '2024-04-25 17:17:31'),
(25, '6.00', '7.00', '254.45', 12, 6, '2024-04-25 17:17:31'),
(26, '2.00', '1.00', '36.35', 12, 4, '2024-04-25 17:17:31'),
(27, '1.00', '3.00', '109.05', 13, 2, '2024-04-25 18:46:53'),
(28, '4.00', '1.00', '36.35', 13, 4, '2024-04-25 18:46:53'),
(30, '1.00', '7.00', '254.45', 14, 1, '2024-04-25 20:07:33'),
(31, '1.00', '6.00', '218.10', 15, 1, '2024-04-25 20:09:34'),
(32, '3.00', '4.00', '145.40', 15, 3, '2024-04-25 20:09:34'),
(34, '4.00', '6.00', '218.10', 16, 1, '2024-04-25 20:09:59'),
(35, '1.00', '4.00', '145.40', 16, 3, '2024-04-25 20:09:59'),
(36, '2.00', '0.90', '32.72', 17, 4, '2024-04-27 18:25:23'),
(37, '2.00', '3.00', '109.05', 18, 2, '2024-04-27 22:38:33'),
(38, '2.00', '1.00', '36.35', 18, 4, '2024-04-27 22:38:33'),
(40, '1.00', '2.00', '72.70', 19, 2, '2024-04-27 22:59:40'),
(41, '4.00', '2.00', '72.70', 20, 2, '2024-04-27 23:02:46'),
(42, '8.00', '0.90', '32.72', 20, 4, '2024-04-27 23:02:46'),
(44, '1.00', '6.00', '218.10', 21, 1, '2024-04-27 23:06:17'),
(45, '1.00', '6.00', '218.10', 22, 1, '2024-04-27 23:09:45'),
(46, '8.00', '7.00', '254.45', 23, 1, '2024-04-27 23:19:28'),
(47, '3.00', '4.00', '145.40', 24, 3, '2024-04-28 13:04:13'),
(48, '12.00', '4.00', '145.40', 24, 5, '2024-04-28 13:04:13'),
(50, '5.00', '7.00', '254.45', 25, 6, '2024-04-28 13:04:57'),
(51, '1.00', '7.00', '254.45', 26, 7, '2024-05-16 14:26:47'),
(52, '1.00', '4.00', '145.40', 27, 11, '2024-07-12 22:51:00'),
(53, '1.00', '6.00', '218.10', 28, 6, '2024-09-24 23:39:16'),
(54, '1.00', '3.00', '109.05', 29, 10, '2024-09-24 23:44:57'),
(55, '3.00', '2.00', '72.70', 29, 9, '2024-09-24 23:44:57'),
(57, '2.00', '3.00', '109.05', 30, 10, '2024-09-24 23:46:21'),
(58, '1.00', '7.00', '280.00', 31, 6, '2024-10-14 23:52:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details_combo`
--

CREATE TABLE `details_combo` (
  `id` int(11) NOT NULL,
  `id_combo` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details_promotions`
--

CREATE TABLE `details_promotions` (
  `id` int(11) NOT NULL,
  `id_promotion` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details_reports`
--

CREATE TABLE `details_reports` (
  `id` int(11) NOT NULL,
  `id_report` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `profit` decimal(10,2) NOT NULL,
  `profit_bs` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `total_bs` decimal(10,2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details_reserved`
--

CREATE TABLE `details_reserved` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `sell_price` decimal(10,2) NOT NULL,
  `sell_price_bs` decimal(10,2) NOT NULL,
  `tasa_bcv` varchar(45) NOT NULL,
  `tasa_paralelo` varchar(45) NOT NULL,
  `tasa_select` varchar(45) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `type` enum('percentage','fixed_amount') NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `id_status` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email_send`
--

CREATE TABLE `email_send` (
  `id` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `emails_sends` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees_salaries`
--

CREATE TABLE `employees_salaries` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type_salary` varchar(100) NOT NULL DEFAULT 'Salario quincenal',
  `total_salary` decimal(10,2) NOT NULL,
  `id_status` int(11) NOT NULL,
  `period` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `employees_salaries`
--

INSERT INTO `employees_salaries` (`id`, `id_user`, `type_salary`, `total_salary`, `id_status`, `period`) VALUES
(2, 4, 'Salario quincenal', '110.40', 4, '2024-04-27'),
(4, 6, 'Salario quincenal', '86.50', 5, '2024-04-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `id_payment_method` int(11) NOT NULL,
  `id_payments_status` int(11) NOT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `payments`
--

INSERT INTO `payments` (`id`, `id_bill`, `id_payment_method`, `id_payments_status`, `monto`, `comments`, `date_created`) VALUES
(1, 1, 3, 1, '216.00', NULL, '2024-04-20 18:35:48'),
(2, 2, 2, 1, '4.00', NULL, '2024-04-20 20:08:59'),
(3, 3, 2, 1, '4.00', NULL, '2024-04-20 20:09:20'),
(4, 4, 2, 1, '15.00', NULL, '2024-04-24 07:19:25'),
(5, 5, 1, 1, '290.80', NULL, '2024-04-24 18:46:50'),
(6, 6, 1, 1, '181.00', NULL, '2024-04-24 18:47:50'),
(7, 6, 2, 1, '20.00', NULL, '2024-04-24 18:47:50'),
(8, 6, 4, 1, '2000.00', NULL, '2024-04-24 18:47:50'),
(9, 7, 2, 1, '2.00', NULL, '2024-04-25 12:28:58'),
(10, 8, 2, 1, '20.00', NULL, '2024-04-25 12:41:55'),
(11, 8, 4, 1, '218.10', NULL, '2024-04-25 12:41:55'),
(12, 9, 2, 1, '10.00', NULL, '2024-04-25 17:07:48'),
(13, 10, 2, 1, '22.00', NULL, '2024-04-25 17:12:55'),
(14, 11, 3, 1, '1454.00', NULL, '2024-04-25 17:13:47'),
(15, 12, 2, 1, '50.00', NULL, '2024-04-25 17:17:31'),
(16, 12, 3, 1, '500.00', NULL, '2024-04-25 17:17:31'),
(17, 12, 4, 1, '372.40', NULL, '2024-04-25 17:17:31'),
(18, 13, 2, 1, '7.00', NULL, '2024-04-25 18:46:53'),
(19, 14, 2, 1, '7.00', NULL, '2024-04-25 20:07:33'),
(20, 15, 2, 1, '18.00', NULL, '2024-04-25 20:09:34'),
(21, 16, 2, 1, '28.00', NULL, '2024-04-25 20:09:59'),
(22, 17, 3, 1, '65.44', NULL, '2024-04-27 18:25:23'),
(23, 18, 2, 1, '8.00', NULL, '2024-04-27 22:38:33'),
(24, 19, 2, 1, '2.00', NULL, '2024-04-27 22:59:40'),
(25, 20, 2, 1, '15.00', NULL, '2024-04-27 23:02:46'),
(26, 20, 3, 1, '7.31', NULL, '2024-04-27 23:02:46'),
(27, 21, 2, 1, '6.00', NULL, '2024-04-27 23:06:17'),
(28, 22, 2, 1, '6.00', NULL, '2024-04-27 23:09:45'),
(29, 23, 2, 1, '56.00', NULL, '2024-04-27 23:19:28'),
(30, 24, 2, 1, '60.00', NULL, '2024-04-28 13:04:13'),
(31, 25, 2, 1, '35.00', NULL, '2024-04-28 13:04:57'),
(32, 26, 2, 1, '7.00', NULL, '2024-05-16 14:26:47'),
(33, 27, 2, 1, '1.00', NULL, '2024-07-12 22:51:00'),
(34, 27, 3, 1, '100.00', NULL, '2024-07-12 22:51:00'),
(35, 27, 4, 1, '9.05', NULL, '2024-07-12 22:51:00'),
(36, 28, 6, 1, '5.00', 'BANESCO PANAMA', '2024-09-24 23:39:16'),
(37, 29, 4, 1, '290.70', 'BANCO DE VENEZUELA', '2024-09-24 23:44:57'),
(38, 30, 5, 1, '218.10', 'BANCO NACIONAL DE CREDITO', '2024-09-24 23:46:21'),
(39, 31, 2, 1, '10.00', NULL, '2024-10-14 23:52:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments_status`
--

CREATE TABLE `payments_status` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `color` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `payments_status`
--

INSERT INTO `payments_status` (`id`, `name`, `description`, `color`) VALUES
(1, 'Procesado', 'Pago revisado, procesado y aceptado', '#43e5a0'),
(2, 'Pendiente', 'Pago por revisar, no procesado y por aceptar', '#fabe25'),
(3, 'Declinado', 'Pago revisado, no procesado y no aceptado', '#ea546c');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `payment_code` varchar(45) NOT NULL,
  `id_currency` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `payment_method`
--

INSERT INTO `payment_method` (`id`, `payment_code`, `id_currency`) VALUES
(1, 'Efectivo', 1),
(2, 'Efectivo', 2),
(3, 'Tarjeta', 1),
(4, 'Pago Movil', 1),
(5, 'Transferencia Directa', 1),
(6, 'Transferencia Directa', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `model` varchar(50) DEFAULT NULL,
  `cost` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `second_price` decimal(10,2) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `stock_warranty` int(11) DEFAULT 0,
  `img_path` varchar(100) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `id_status` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_changed` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `model`, `cost`, `price`, `second_price`, `stock`, `stock_warranty`, `img_path`, `id_user`, `id_supplier`, `id_status`, `date_created`, `date_changed`) VALUES
(1, 'Carne', 'Guisada', '2.30', '7.50', '6.50', 5, 1, NULL, 1, NULL, 1, '2024-02-26 11:38:18', '2024-10-15 22:29:15'),
(2, 'Carne', 'Mechada', '2.00', '3.00', '2.00', 0, 1, NULL, 1, NULL, 1, '2024-02-26 12:14:31', '2024-02-26 12:14:31'),
(3, 'Quesito', 'Clineja', '2.00', '5.00', '4.00', 0, 1, NULL, 1, NULL, 1, '2024-02-29 16:18:57', '2024-02-29 16:18:57'),
(4, 'Jabon', 'Harmony', '0.70', '1.00', '0.90', 0, 1, NULL, 1, NULL, 1, '2024-03-05 13:36:09', '2024-03-05 13:36:09'),
(5, 'Shampoo', 'HeadAndShoulders', '3.00', '5.00', '4.00', 0, 1, NULL, 1, NULL, 1, '2024-03-05 13:37:38', '2024-03-05 13:37:38'),
(6, 'Jamonsito', 'De Pierna', '5.00', '7.00', '6.00', 7, 1, NULL, 1, NULL, 1, '2024-03-17 16:30:46', '2024-03-17 16:30:46'),
(7, 'Carne', 'De Toro', '5.00', '7.00', '6.00', 19, 1, NULL, 1, NULL, 1, '2024-03-17 22:45:58', '2024-03-17 22:45:58'),
(8, 'Samsung', 'Pantalla 3/4 OLED', '15.00', '20.00', '18.00', 15, 1, NULL, 1, NULL, 1, '2024-04-16 13:13:47', '2024-04-16 13:13:47'),
(9, 'a', 'a', '12.00', '2.00', '3.00', 17, 1, NULL, 1, NULL, 1, '2024-04-16 13:14:51', '2024-04-16 13:14:51'),
(10, 'ss', 'ss', '2.00', '3.00', '4.00', 17, 1, NULL, 1, NULL, 1, '2024-04-17 08:27:34', '2024-04-17 08:27:34'),
(11, 'Mica', 'Samsung INCELL', '2.00', '2.00', '4.00', 0, 1, NULL, 1, NULL, 1, '2024-04-20 15:29:06', '2024-04-20 15:29:06'),
(14, 'Carne', 'Samsung INCELL', '1.00', '1.00', '1.00', 1, 1, NULL, 1, NULL, 1, '2024-04-20 16:08:11', '2024-04-20 16:08:11');

--
-- Disparadores `products`
--
DELIMITER $$
CREATE TRIGGER `historial_productos_insert` AFTER INSERT ON `products` FOR EACH ROW BEGIN

  DECLARE nombre_usuario VARCHAR(255);

  -- Get the user name
  SET nombre_usuario = (SELECT id FROM users WHERE id = NEW.id_user);

  -- Insert into history for insert
  INSERT INTO products_history (
    id_product,
    id_user,
    modified_column,
    action,
    old_value,
    new_value,
    date_modified
  ) VALUES (
    NEW.id,
    nombre_usuario,
    'Todas',
    'Nuevo registro',
    NULL,
    NULL,
    CURRENT_TIMESTAMP
  );

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `products_history_trigger` BEFORE UPDATE ON `products` FOR EACH ROW BEGIN

    DECLARE old_data VARCHAR(255);
    DECLARE new_data VARCHAR(255);
    DECLARE id_usuario INT;
    
	SET id_usuario = (SELECT id FROM users WHERE id = OLD.id_user);
    

        
            IF NEW.name != OLD.name THEN

                INSERT INTO `products_history`
                (`id_product`, `id_user`, `modified_column`, `action`, `old_value`, `new_value`)
                VALUES
                (NEW.id, id_usuario, 'Nombre Producto', 'Actualizo', OLD.name, NEW.name);
                
			END IF;
            
            IF NEW.model != OLD.model THEN

                INSERT INTO `products_history`
                (`id_product`, `id_user`, `modified_column`, `action`, `old_value`, `new_value`)
                VALUES
                (NEW.id, id_usuario, 'Tipo Producto', 'Actualizo', OLD.model, NEW.model);

            END IF;
            
            IF NEW.cost != OLD.cost THEN

                INSERT INTO products_history
                (id_product, id_user, modified_column, action, old_value, new_value)
                VALUES
                (NEW.id, id_usuario, 'Costo', 'Actualizo', OLD.cost, NEW.cost);
			END IF;
            
            IF NEW.price != OLD.price THEN

                INSERT INTO products_history
                (id_product, id_user, modified_column, action, old_value, new_value)
                VALUES
                (NEW.id, id_usuario, 'Precio D', 'Actualizo', OLD.price, NEW.price);
			END IF;
            
            IF NEW.second_price != OLD.second_price THEN

                INSERT INTO products_history
                (id_product, id_user, modified_column, action, old_value, new_value)
                VALUES
                (NEW.id, id_usuario, 'Precio M', 'Actualizo', OLD.second_price, NEW.second_price);
			END IF;
            
            IF NEW.stock != OLD.stock THEN

                INSERT INTO products_history
                (id_product, id_user, modified_column, action, old_value, new_value)
                VALUES
                (NEW.id, id_usuario, 'Stock', 'Actualizo', OLD.stock, NEW.stock);
			END IF;
            
            IF NEW.stock_warranty != OLD.stock_warranty THEN

                INSERT INTO products_history
                (id_product, id_user, modified_column, action, old_value, new_value)
                VALUES
                (NEW.id, id_usuario, 'Stock Garantia', 'Actualizo', OLD.stock_warranty, NEW.stock_warranty);
			END IF;
            
            IF NEW.img_path != OLD.img_path THEN

                INSERT INTO products_history
                (id_product, id_user, modified_column, action, old_value, new_value)
                VALUES
                (NEW.id, id_usuario, 'Imagen', 'Actualizo', OLD.img_path, NEW.img_path);
			END IF;
            
            IF NEW.id_supplier != OLD.id_supplier THEN

                INSERT INTO products_history
                (id_product, id_user, modified_column, action, old_value, new_value)
                VALUES
                (NEW.id, id_usuario, 'Proveedor', 'Actualizo', OLD.id_supplier, NEW.id_supplier);
			END IF;
            
            IF NEW.id_status != OLD.id_status THEN
            
				IF NEW.id_status = 3 THEN
                
                	INSERT INTO products_history
                    (id_product, id_user, modified_column, action, old_value, new_value)
                    VALUES
                    (NEW.id, id_usuario, 'Todos', 'Eliminado', OLD.id_status, NEW.id_status);
                ELSEIF NEW.id_status = 2 THEN
                    INSERT INTO products_history
                    (id_product, id_user, modified_column, action, old_value, new_value)
                    VALUES
                    (NEW.id, id_usuario, 'Status', 'Actualizo', 'Activo', 'Inactivo');
                 ELSEIF NEW.id_status = 1 THEN
                    INSERT INTO products_history
                    (id_product, id_user, modified_column, action, old_value, new_value)
                    VALUES
                    (NEW.id, id_usuario, 'Status', 'Actualizo', 'Inactivo', 'Activo');
                END IF;
                
                
                
			END IF;


END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_entries`
--

CREATE TABLE `products_entries` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `old_quantity` int(11) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `old_cost` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `old_price` decimal(10,2) NOT NULL,
  `second_price` decimal(10,2) NOT NULL,
  `old_second_price` decimal(10,2) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products_entries`
--

INSERT INTO `products_entries` (`id`, `id_product`, `quantity`, `old_quantity`, `cost`, `old_cost`, `price`, `old_price`, `second_price`, `old_second_price`, `id_user`, `date_created`) VALUES
(1, 1, '5.00', 0, '2.30', '4.00', '7.50', '7.00', '6.50', '6.00', 1, '2024-10-15 22:29:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_history`
--

CREATE TABLE `products_history` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `modified_column` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `old_value` varchar(255) DEFAULT NULL,
  `new_value` varchar(255) DEFAULT NULL,
  `date_modified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products_history`
--

INSERT INTO `products_history` (`id`, `id_product`, `id_user`, `modified_column`, `action`, `old_value`, `new_value`, `date_modified`) VALUES
(1, 1, 1, 'Stock', 'Actualizo', '20', '19', '2024-04-20 18:04:18'),
(2, 2, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 18:36:48'),
(3, 2, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 18:55:55'),
(4, 1, 1, 'Stock', 'Actualizo', '19', '18', '2024-04-20 19:05:17'),
(5, 1, 1, 'Stock', 'Actualizo', '18', '19', '2024-04-20 19:05:20'),
(6, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:06:06'),
(7, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:15:04'),
(8, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:15:07'),
(9, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:17:07'),
(10, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:18:18'),
(11, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:18:54'),
(12, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:19:07'),
(13, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:22:03'),
(14, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:22:06'),
(15, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:22:44'),
(16, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:22:56'),
(17, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:25:04'),
(18, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:25:11'),
(19, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:26:58'),
(20, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:27:04'),
(21, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:29:08'),
(22, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:29:15'),
(23, 3, 1, 'Stock', 'Actualizo', '18', '16', '2024-04-20 19:29:58'),
(24, 3, 1, 'Stock', 'Actualizo', '16', '20', '2024-04-20 19:30:29'),
(25, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:30:35'),
(26, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:30:52'),
(27, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:30:56'),
(28, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:34:01'),
(29, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:34:05'),
(30, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:38:23'),
(31, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:38:37'),
(32, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:38:57'),
(33, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:39:05'),
(34, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:40:49'),
(35, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:40:54'),
(36, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:41:23'),
(37, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:41:26'),
(38, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:42:25'),
(39, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:42:33'),
(40, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:43:20'),
(41, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:43:27'),
(42, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:43:34'),
(43, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:44:51'),
(44, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:45:17'),
(45, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:45:24'),
(46, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:45:30'),
(47, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:46:29'),
(48, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:46:47'),
(49, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:46:58'),
(50, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:47:01'),
(51, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:47:26'),
(52, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:50:18'),
(53, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:50:24'),
(54, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:53:35'),
(55, 2, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:53:42'),
(56, 2, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:55:20'),
(57, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:56:23'),
(58, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:56:27'),
(59, 5, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:56:40'),
(60, 5, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:57:00'),
(61, 2, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 19:57:04'),
(62, 2, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-20 19:57:06'),
(63, 2, 1, 'Stock', 'Actualizo', '20', '14', '2024-04-20 20:03:43'),
(64, 2, 1, 'Stock', 'Actualizo', '14', '20', '2024-04-20 20:03:50'),
(65, 2, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-20 20:03:52'),
(66, 2, 1, 'Stock', 'Actualizo', '18', '16', '2024-04-20 20:09:13'),
(67, 1, 1, 'Stock', 'Actualizo', '19', '17', '2024-04-21 15:04:25'),
(68, 1, 1, 'Stock', 'Actualizo', '17', '19', '2024-04-21 15:04:32'),
(69, 8, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-23 14:48:37'),
(70, 8, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-23 15:35:47'),
(71, 2, 1, 'Stock', 'Actualizo', '16', '15', '2024-04-23 15:37:02'),
(72, 2, 1, 'Stock', 'Actualizo', '15', '13', '2024-04-23 15:37:07'),
(73, 2, 1, 'Stock', 'Actualizo', '13', '16', '2024-04-23 15:37:12'),
(74, 3, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-23 15:37:16'),
(75, 4, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-23 15:37:20'),
(76, 3, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-23 15:37:22'),
(77, 4, 1, 'Stock', 'Actualizo', '18', '20', '2024-04-23 15:37:22'),
(78, 1, 1, 'Precio M', 'Actualizo', '6.00', '6.01', '2024-04-23 16:59:26'),
(79, 1, 1, 'Precio M', 'Actualizo', '6.01', '6.00', '2024-04-23 16:59:33'),
(80, 2, 1, 'Costo', 'Actualizo', '1.00', '2.00', '2024-04-23 16:59:55'),
(81, 2, 1, 'Stock', 'Actualizo', '16', '11', '2024-04-24 07:19:18'),
(82, 5, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-24 18:46:40'),
(83, 8, 1, 'Stock', 'Actualizo', '20', '16', '2024-04-24 18:47:11'),
(84, 4, 1, 'Stock', 'Actualizo', '20', '18', '2024-04-25 12:28:51'),
(85, 1, 1, 'Stock', 'Actualizo', '19', '17', '2024-04-25 12:41:28'),
(86, 2, 1, 'Stock', 'Actualizo', '11', '10', '2024-04-25 12:41:30'),
(87, 3, 1, 'Stock', 'Actualizo', '20', '19', '2024-04-25 12:41:35'),
(88, 5, 1, 'Stock', 'Actualizo', '18', '16', '2024-04-25 12:41:38'),
(89, 2, 1, 'Stock', 'Actualizo', '10', '8', '2024-04-25 16:44:40'),
(90, 5, 1, 'Stock', 'Actualizo', '16', '15', '2024-04-25 16:45:07'),
(91, 2, 1, 'Stock', 'Actualizo', '8', '10', '2024-04-25 17:01:19'),
(92, 5, 1, 'Stock', 'Actualizo', '15', '16', '2024-04-25 17:01:20'),
(93, 1, 1, 'Stock', 'Actualizo', '17', '16', '2024-04-25 17:01:51'),
(94, 3, 1, 'Stock', 'Actualizo', '19', '18', '2024-04-25 17:01:54'),
(95, 8, 1, 'Stock', 'Actualizo', '16', '15', '2024-04-25 17:12:45'),
(96, 11, 1, 'Stock', 'Actualizo', '2', '1', '2024-04-25 17:12:50'),
(97, 2, 1, 'Stock', 'Actualizo', '10', '8', '2024-04-25 17:13:24'),
(98, 5, 1, 'Stock', 'Actualizo', '16', '12', '2024-04-25 17:13:26'),
(99, 3, 1, 'Stock', 'Actualizo', '18', '13', '2024-04-25 17:13:29'),
(100, 3, 1, 'Stock', 'Actualizo', '13', '8', '2024-04-25 17:16:53'),
(101, 6, 1, 'Stock', 'Actualizo', '20', '14', '2024-04-25 17:16:56'),
(102, 3, 1, 'Stock', 'Actualizo', '8', '7', '2024-04-25 17:17:00'),
(103, 4, 1, 'Stock', 'Actualizo', '18', '16', '2024-04-25 17:17:04'),
(104, 2, 1, 'Stock', 'Actualizo', '8', '7', '2024-04-25 18:46:32'),
(105, 4, 1, 'Stock', 'Actualizo', '16', '12', '2024-04-25 18:46:35'),
(106, 1, 1, 'Stock', 'Actualizo', '16', '15', '2024-04-25 20:07:29'),
(107, 1, 1, 'Stock', 'Actualizo', '15', '14', '2024-04-25 20:09:23'),
(108, 3, 1, 'Stock', 'Actualizo', '7', '4', '2024-04-25 20:09:29'),
(109, 1, 1, 'Stock', 'Actualizo', '14', '10', '2024-04-25 20:09:50'),
(110, 3, 1, 'Stock', 'Actualizo', '4', '3', '2024-04-25 20:09:53'),
(111, 4, 1, 'Stock', 'Actualizo', '12', '10', '2024-04-27 18:25:09'),
(112, 2, 1, 'Stock', 'Actualizo', '7', '5', '2024-04-27 22:38:20'),
(113, 4, 1, 'Stock', 'Actualizo', '10', '8', '2024-04-27 22:38:26'),
(114, 2, 1, 'Stock', 'Actualizo', '5', '4', '2024-04-27 22:59:33'),
(115, 2, 1, 'Stock', 'Actualizo', '4', '0', '2024-04-27 23:02:25'),
(116, 4, 1, 'Stock', 'Actualizo', '8', '0', '2024-04-27 23:02:29'),
(117, 1, 1, 'Stock', 'Actualizo', '10', '9', '2024-04-27 23:06:10'),
(118, 1, 1, 'Stock', 'Actualizo', '9', '8', '2024-04-27 23:09:38'),
(119, 1, 1, 'Stock', 'Actualizo', '8', '0', '2024-04-27 23:19:19'),
(120, 3, 1, 'Stock', 'Actualizo', '3', '0', '2024-04-28 13:03:51'),
(121, 5, 1, 'Stock', 'Actualizo', '12', '0', '2024-04-28 13:04:02'),
(122, 6, 1, 'Stock', 'Actualizo', '14', '9', '2024-04-28 13:04:52'),
(123, 7, 1, 'Stock', 'Actualizo', '20', '19', '2024-05-16 14:26:36'),
(124, 9, 1, 'Stock', 'Actualizo', '20', '18', '2024-05-16 14:27:04'),
(125, 11, 1, 'Stock', 'Actualizo', '1', '0', '2024-07-12 22:50:11'),
(126, 9, 1, 'Stock', 'Actualizo', '18', '20', '2024-09-22 14:30:06'),
(127, 10, 1, 'Stock', 'Actualizo', '20', '19', '2024-09-22 14:34:02'),
(128, 9, 1, 'Stock', 'Actualizo', '20', '17', '2024-09-22 14:34:36'),
(129, 6, 1, 'Stock', 'Actualizo', '9', '8', '2024-09-22 17:14:24'),
(130, 6, 1, 'Stock', 'Actualizo', '8', '9', '2024-09-22 17:16:17'),
(131, 6, 1, 'Stock', 'Actualizo', '9', '7', '2024-09-22 17:16:25'),
(132, 6, 1, 'Stock', 'Actualizo', '7', '9', '2024-09-22 17:16:53'),
(133, 8, 1, 'Stock', 'Actualizo', '15', '13', '2024-09-22 17:55:26'),
(134, 8, 1, 'Stock', 'Actualizo', '13', '15', '2024-09-22 20:37:08'),
(135, 6, 1, 'Stock', 'Actualizo', '9', '8', '2024-09-22 20:37:24'),
(136, 6, 1, 'Stock', 'Actualizo', '8', '9', '2024-09-22 20:37:40'),
(137, 6, 1, 'Stock', 'Actualizo', '9', '7', '2024-09-22 20:37:45'),
(138, 6, 1, 'Stock', 'Actualizo', '7', '9', '2024-09-22 21:32:12'),
(139, 14, 1, 'Stock', 'Actualizo', '1', '0', '2024-09-24 21:02:05'),
(140, 14, 1, 'Stock', 'Actualizo', '0', '1', '2024-09-24 21:02:55'),
(141, 8, 1, 'Stock', 'Actualizo', '15', '13', '2024-09-24 21:03:02'),
(142, 8, 1, 'Stock', 'Actualizo', '13', '15', '2024-09-24 21:03:08'),
(143, 14, 1, 'Stock', 'Actualizo', '1', '0', '2024-09-24 21:04:43'),
(144, 14, 1, 'Stock', 'Actualizo', '0', '1', '2024-09-24 21:08:05'),
(145, 8, 1, 'Stock', 'Actualizo', '15', '14', '2024-09-24 21:08:14'),
(146, 8, 1, 'Stock', 'Actualizo', '14', '15', '2024-09-24 21:12:05'),
(147, 8, 1, 'Stock', 'Actualizo', '15', '14', '2024-09-24 21:12:15'),
(148, 8, 1, 'Stock', 'Actualizo', '14', '15', '2024-09-24 21:13:53'),
(149, 8, 1, 'Stock', 'Actualizo', '15', '14', '2024-09-24 21:13:59'),
(150, 8, 1, 'Stock', 'Actualizo', '14', '15', '2024-09-24 21:14:25'),
(151, 8, 1, 'Stock', 'Actualizo', '15', '14', '2024-09-24 21:14:33'),
(152, 8, 1, 'Stock', 'Actualizo', '14', '15', '2024-09-24 21:16:10'),
(153, 8, 1, 'Stock', 'Actualizo', '15', '14', '2024-09-24 21:22:21'),
(154, 8, 1, 'Stock', 'Actualizo', '14', '15', '2024-09-24 21:23:54'),
(155, 6, 1, 'Stock', 'Actualizo', '9', '8', '2024-09-24 21:24:03'),
(156, 8, 1, 'Stock', 'Actualizo', '15', '14', '2024-09-24 21:26:33'),
(157, 8, 1, 'Stock', 'Actualizo', '14', '15', '2024-09-24 21:26:48'),
(158, 6, 1, 'Stock', 'Actualizo', '8', '9', '2024-09-24 21:27:28'),
(159, 6, 1, 'Stock', 'Actualizo', '9', '8', '2024-09-24 21:32:18'),
(160, 6, 1, 'Stock', 'Actualizo', '8', '9', '2024-09-24 21:32:36'),
(161, 6, 1, 'Stock', 'Actualizo', '9', '8', '2024-09-24 21:34:36'),
(162, 6, 1, 'Stock', 'Actualizo', '8', '9', '2024-09-24 21:36:12'),
(163, 6, 1, 'Stock', 'Actualizo', '9', '8', '2024-09-24 21:38:54'),
(164, 10, 1, 'Stock', 'Actualizo', '19', '17', '2024-09-24 23:45:54'),
(165, 8, 1, 'Stock', 'Actualizo', '15', '14', '2024-09-27 23:28:13'),
(166, 10, 1, 'Stock', 'Actualizo', '17', '15', '2024-10-12 20:45:10'),
(167, 6, 1, 'Stock', 'Actualizo', '8', '6', '2024-10-12 23:15:33'),
(168, 6, 1, 'Stock', 'Actualizo', '6', '8', '2024-10-12 23:26:06'),
(169, 10, 1, 'Stock', 'Actualizo', '15', '17', '2024-10-12 23:26:07'),
(170, 6, 1, 'Stock', 'Actualizo', '8', '6', '2024-10-12 23:26:12'),
(171, 10, 1, 'Stock', 'Actualizo', '17', '15', '2024-10-12 23:26:20'),
(172, 6, 1, 'Stock', 'Actualizo', '6', '8', '2024-10-12 23:27:57'),
(173, 10, 1, 'Stock', 'Actualizo', '15', '17', '2024-10-12 23:27:58'),
(174, 8, 1, 'Stock', 'Actualizo', '14', '15', '2024-10-13 13:52:15'),
(175, 10, 1, 'Stock', 'Actualizo', '17', '16', '2024-10-14 19:37:11'),
(176, 10, 1, 'Stock', 'Actualizo', '16', '17', '2024-10-14 19:44:48'),
(177, 8, 1, 'Stock', 'Actualizo', '15', '14', '2024-10-14 19:44:56'),
(178, 8, 1, 'Stock', 'Actualizo', '14', '15', '2024-10-14 19:52:48'),
(179, 9, 1, 'Stock', 'Actualizo', '17', '16', '2024-10-14 19:52:53'),
(180, 9, 1, 'Stock', 'Actualizo', '16', '17', '2024-10-14 19:54:33'),
(181, 9, 1, 'Stock', 'Actualizo', '17', '16', '2024-10-14 19:54:37'),
(182, 9, 1, 'Stock', 'Actualizo', '16', '17', '2024-10-14 19:54:54'),
(183, 9, 1, 'Stock', 'Actualizo', '17', '16', '2024-10-14 19:55:04'),
(184, 9, 1, 'Stock', 'Actualizo', '16', '17', '2024-10-14 19:55:32'),
(185, 9, 1, 'Stock', 'Actualizo', '17', '16', '2024-10-14 19:55:41'),
(186, 9, 1, 'Stock', 'Actualizo', '16', '17', '2024-10-14 19:56:40'),
(187, 9, 1, 'Stock', 'Actualizo', '17', '16', '2024-10-14 19:56:45'),
(188, 9, 1, 'Stock', 'Actualizo', '16', '17', '2024-10-14 19:56:59'),
(189, 9, 1, 'Stock', 'Actualizo', '17', '16', '2024-10-14 20:01:34'),
(190, 9, 1, 'Stock', 'Actualizo', '16', '17', '2024-10-14 20:01:40'),
(191, 9, 1, 'Stock', 'Actualizo', '17', '16', '2024-10-14 20:03:54'),
(192, 9, 1, 'Stock', 'Actualizo', '16', '17', '2024-10-14 20:18:53'),
(193, 9, 1, 'Stock', 'Actualizo', '17', '16', '2024-10-14 20:26:15'),
(194, 9, 1, 'Stock', 'Actualizo', '16', '17', '2024-10-14 20:26:31'),
(195, 8, 1, 'Stock', 'Actualizo', '15', '14', '2024-10-14 20:46:18'),
(196, 8, 1, 'Stock', 'Actualizo', '14', '15', '2024-10-14 20:46:22'),
(197, 6, 1, 'Stock', 'Actualizo', '8', '7', '2024-10-14 21:26:54'),
(198, 6, 1, 'Stock', 'Actualizo', '7', '8', '2024-10-14 21:28:27'),
(199, 6, 1, 'Stock', 'Actualizo', '8', '7', '2024-10-14 21:28:38'),
(200, 6, 1, 'Stock', 'Actualizo', '7', '8', '2024-10-14 21:29:24'),
(201, 6, 1, 'Stock', 'Actualizo', '8', '7', '2024-10-14 21:29:27'),
(202, 6, 1, 'Stock', 'Actualizo', '7', '6', '2024-10-14 21:29:55'),
(203, 6, 1, 'Stock', 'Actualizo', '6', '8', '2024-10-14 21:30:09'),
(204, 6, 1, 'Stock', 'Actualizo', '8', '7', '2024-10-14 21:30:13'),
(205, 6, 1, 'Stock', 'Actualizo', '7', '6', '2024-10-14 21:30:48'),
(206, 6, 1, 'Stock', 'Actualizo', '6', '8', '2024-10-14 21:32:11'),
(207, 6, 1, 'Stock', 'Actualizo', '8', '7', '2024-10-14 21:34:23'),
(208, 6, 1, 'Stock', 'Actualizo', '7', '6', '2024-10-14 21:34:40'),
(209, 7, 1, 'Stock', 'Actualizo', '19', '18', '2024-10-14 21:35:03'),
(210, 6, 1, 'Stock', 'Actualizo', '6', '8', '2024-10-14 21:50:49'),
(211, 7, 1, 'Stock', 'Actualizo', '18', '19', '2024-10-14 21:50:50'),
(212, 6, 1, 'Stock', 'Actualizo', '8', '7', '2024-10-14 21:51:04'),
(213, 6, 1, 'Stock', 'Actualizo', '7', '6', '2024-10-14 21:52:04'),
(214, 6, 1, 'Stock', 'Actualizo', '6', '8', '2024-10-14 22:10:26'),
(215, 6, 1, 'Stock', 'Actualizo', '8', '7', '2024-10-14 22:15:20'),
(216, 6, 1, 'Stock', 'Actualizo', '7', '8', '2024-10-14 22:15:43'),
(217, 6, 1, 'Stock', 'Actualizo', '8', '7', '2024-10-14 22:15:48'),
(218, 7, 1, 'Stock', 'Actualizo', '19', '18', '2024-10-14 22:16:33'),
(219, 6, 1, 'Stock', 'Actualizo', '7', '6', '2024-10-14 22:16:47'),
(220, 6, 1, 'Stock', 'Actualizo', '6', '5', '2024-10-14 22:17:18'),
(221, 6, 1, 'Stock', 'Actualizo', '5', '8', '2024-10-14 22:18:44'),
(222, 7, 1, 'Stock', 'Actualizo', '18', '19', '2024-10-14 22:18:44'),
(223, 6, 1, 'Stock', 'Actualizo', '8', '7', '2024-10-14 22:18:50'),
(224, 6, 1, 'Stock', 'Actualizo', '7', '8', '2024-10-14 22:19:12'),
(225, 6, 1, 'Stock', 'Actualizo', '8', '7', '2024-10-14 22:19:21'),
(226, 6, 1, 'Stock', 'Actualizo', '7', '6', '2024-10-14 22:20:27'),
(227, 7, 1, 'Stock', 'Actualizo', '19', '18', '2024-10-14 22:20:47'),
(228, 6, 1, 'Stock', 'Actualizo', '6', '8', '2024-10-14 22:21:03'),
(229, 7, 1, 'Stock', 'Actualizo', '18', '19', '2024-10-14 22:21:03'),
(230, 6, 1, 'Stock', 'Actualizo', '8', '7', '2024-10-14 22:21:13'),
(231, 6, 1, 'Stock', 'Actualizo', '7', '8', '2024-10-14 22:21:22'),
(232, 6, 1, 'Stock', 'Actualizo', '8', '6', '2024-10-14 23:21:58'),
(233, 6, 1, 'Stock', 'Actualizo', '6', '4', '2024-10-14 23:22:29'),
(234, 6, 1, 'Stock', 'Actualizo', '4', '8', '2024-10-14 23:22:49'),
(235, 6, 1, 'Stock', 'Actualizo', '8', '6', '2024-10-14 23:22:57'),
(236, 6, 1, 'Stock', 'Actualizo', '6', '8', '2024-10-14 23:24:24'),
(237, 6, 1, 'Stock', 'Actualizo', '8', '7', '2024-10-14 23:24:30'),
(238, 6, 1, 'Stock', 'Actualizo', '7', '6', '2024-10-14 23:24:36'),
(239, 7, 1, 'Stock', 'Actualizo', '19', '17', '2024-10-14 23:24:51'),
(240, 6, 1, 'Stock', 'Actualizo', '6', '8', '2024-10-14 23:30:44'),
(241, 7, 1, 'Stock', 'Actualizo', '17', '19', '2024-10-14 23:30:44'),
(242, 6, 1, 'Stock', 'Actualizo', '8', '6', '2024-10-14 23:30:50'),
(243, 7, 1, 'Stock', 'Actualizo', '19', '16', '2024-10-14 23:31:08'),
(244, 6, 1, 'Stock', 'Actualizo', '6', '3', '2024-10-14 23:32:56'),
(245, 6, 1, 'Stock', 'Actualizo', '3', '8', '2024-10-14 23:34:13'),
(246, 7, 1, 'Stock', 'Actualizo', '16', '19', '2024-10-14 23:34:14'),
(247, 6, 1, 'Stock', 'Actualizo', '8', '7', '2024-10-14 23:34:22'),
(248, 6, 1, 'Stock', 'Actualizo', '7', '8', '2024-10-14 23:36:17'),
(249, 6, 1, 'Stock', 'Actualizo', '8', '7', '2024-10-14 23:36:23'),
(250, 6, 1, 'Stock', 'Actualizo', '7', '8', '2024-10-14 23:37:19'),
(251, 6, 1, 'Stock', 'Actualizo', '8', '7', '2024-10-14 23:37:22'),
(252, 6, 1, 'Stock', 'Actualizo', '7', '8', '2024-10-14 23:38:12'),
(253, 7, 1, 'Stock', 'Actualizo', '19', '18', '2024-10-14 23:38:18'),
(254, 7, 1, 'Stock', 'Actualizo', '18', '19', '2024-10-14 23:39:07'),
(255, 6, 1, 'Stock', 'Actualizo', '8', '7', '2024-10-14 23:39:20'),
(256, 6, 1, 'Stock', 'Actualizo', '7', '8', '2024-10-14 23:44:19'),
(257, 6, 1, 'Stock', 'Actualizo', '8', '7', '2024-10-14 23:44:25'),
(258, 6, 1, 'Stock', 'Actualizo', '7', '6', '2024-10-14 23:54:46'),
(259, 6, 1, 'Stock', 'Actualizo', '6', '7', '2024-10-14 23:55:24'),
(260, 6, 1, 'Stock', 'Actualizo', '7', '6', '2024-10-14 23:55:41'),
(261, 10, 1, 'Stock', 'Actualizo', '17', '16', '2024-10-14 23:55:48'),
(262, 10, 1, 'Stock', 'Actualizo', '16', '17', '2024-10-14 23:55:55'),
(263, 6, 1, 'Stock', 'Actualizo', '6', '7', '2024-10-14 23:56:12'),
(264, 6, 1, 'Stock', 'Actualizo', '7', '6', '2024-10-14 23:56:59'),
(265, 6, 1, 'Stock', 'Actualizo', '6', '7', '2024-10-14 23:57:29'),
(266, 6, 1, 'Stock', 'Actualizo', '7', '6', '2024-10-14 23:57:41'),
(267, 6, 1, 'Stock', 'Actualizo', '6', '7', '2024-10-14 23:57:46'),
(268, 6, 1, 'Stock', 'Actualizo', '7', '6', '2024-10-15 00:00:00'),
(269, 6, 1, 'Stock', 'Actualizo', '6', '7', '2024-10-15 00:00:07'),
(270, 6, 1, 'Stock', 'Actualizo', '7', '6', '2024-10-15 00:00:38'),
(271, 6, 1, 'Stock', 'Actualizo', '6', '7', '2024-10-15 00:00:41'),
(272, 1, 1, 'Stock', 'Actualizo', '0', '5', '2024-10-15 22:26:52'),
(273, 1, 1, 'Stock', 'Actualizo', '5', '0', '2024-10-15 22:29:08'),
(274, 1, 1, 'Costo', 'Actualizo', '4.00', '2.30', '2024-10-15 22:29:15'),
(275, 1, 1, 'Precio D', 'Actualizo', '7.00', '7.50', '2024-10-15 22:29:15'),
(276, 1, 1, 'Precio M', 'Actualizo', '6.00', '6.50', '2024-10-15 22:29:15'),
(277, 1, 1, 'Stock', 'Actualizo', '0', '5', '2024-10-15 22:29:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `type` enum('discount','free_product','gift_card') NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `id_status` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `total_day` decimal(10,2) NOT NULL,
  `total_day_bs` decimal(10,2) NOT NULL,
  `total_day_unpaid` decimal(10,2) NOT NULL,
  `total_day_unpaid_bs` decimal(10,2) NOT NULL,
  `total_day_profit` decimal(10,2) NOT NULL,
  `total_day_profit_bs` decimal(10,2) NOT NULL,
  `tasa_bcv` decimal(10,2) NOT NULL,
  `tasa_paralelo` decimal(10,2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Administrador'),
(2, 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Eliminado'),
(4, 'Procesado'),
(5, 'Pendiente'),
(6, 'Anulada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `rif` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `department` varchar(150) DEFAULT NULL,
  `id_rol` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_changed` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user`, `pass`, `salary`, `department`, `id_rol`, `id_status`, `date_created`, `date_changed`) VALUES
(1, 'Robert Rincon', 'robertalejandro2916@gmail.com', 'rob123', '$2y$10$nWClTryThwYUz4dGdtimwuplVciek.Yea4m7EYAtSP5eXP/H5PxdC', '200.00', 'Supervisor', 1, 1, '2024-02-24 00:04:38', '2024-02-24 00:04:38'),
(2, 'Adrian Rincon', 'robertalejandro2916@gmail.com', 'rob123444', '$2y$10$bZdSZVkereB4RhfcAicrfeZCatHmieB9sUrUfkWoer.knpjMnql6O', '100.00', NULL, 1, 3, '2024-02-25 01:38:30', '2024-02-25 01:38:30'),
(3, 'Gabriel Rincon', 'robertalejandro2916@gmail.com', 'rob12333', '$2y$10$cy21quQBpKkYMPv2I7U5G.lZWS5AVDgJo7EAXxs5HHUjLONmR7vp6', '100.00', NULL, 2, 3, '2024-02-25 10:10:51', '2024-02-25 10:10:51'),
(4, 'Adrian Rincon', 'adrianrincon2306@gmail.com', 'adr11', '$2y$10$5/9Y85gM9Z85nEkIz7bWp.4irwtObqtdgyhC2PXaB4FE7WVRFLi5a', '100.00', 'Cajero', 2, 1, '2024-04-18 18:04:38', '2024-04-18 18:04:38'),
(5, 'Lidel', 'lidel@gmail.com', 'aaa11', '$2y$10$8VA7jur0gDJf/d4cOT4TBO7pPT8keQ.LDb2Vqz8PFniz8l2XYoJfa', '100.00', NULL, 2, 1, '2024-04-18 18:05:05', '2024-04-18 18:05:05'),
(6, 'Juanito', 'juan@gmail.com', 'juan11', '$2y$10$Qqh8tBcQ572wN8AGdWK3vu07ZzI3ZXy2hUXrM8Fy47hpvHYqJjq4e', '80.00', 'Supervisor', 2, 1, '2024-04-27 17:49:23', '2024-04-27 17:49:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_token`
--

CREATE TABLE `users_token` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_clients1_idx` (`id_client`),
  ADD KEY `fk_bill_statuses1_idx` (`id_status`),
  ADD KEY `fk_bill_users1_idx` (`id_user`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clients_clients_types_idx` (`id_type`),
  ADD KEY `fk_clients_statuses1_idx` (`id_status`);

--
-- Indices de la tabla `clients_types`
--
ALTER TABLE `clients_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `combos`
--
ALTER TABLE `combos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_combos_statuses1_idx` (`id_status`);

--
-- Indices de la tabla `comissions`
--
ALTER TABLE `comissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `details_bills`
--
ALTER TABLE `details_bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_details_bills_bills1_idx` (`id_bill`),
  ADD KEY `fk_details_bills_products1_idx` (`id_product`);

--
-- Indices de la tabla `details_combo`
--
ALTER TABLE `details_combo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_details_combo_combos1_idx` (`id_combo`),
  ADD KEY `fk_details_combo_products1_idx` (`id_product`);

--
-- Indices de la tabla `details_promotions`
--
ALTER TABLE `details_promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_details_promotions_promotions1_idx` (`id_promotion`),
  ADD KEY `fk_details_promotions_products1_idx` (`id_product`);

--
-- Indices de la tabla `details_reports`
--
ALTER TABLE `details_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_details_reports_reports1_idx` (`id_report`),
  ADD KEY `fk_details_reports_products1_idx` (`id_product`);

--
-- Indices de la tabla `details_reserved`
--
ALTER TABLE `details_reserved`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_details_reserved_clients1_idx` (`id_client`),
  ADD KEY `fk_details_reserved_users1_idx` (`id_user`),
  ADD KEY `fk_details_reserved_products1_idx` (`id_product`);

--
-- Indices de la tabla `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_discounts_statuses1_idx` (`id_status`);

--
-- Indices de la tabla `email_send`
--
ALTER TABLE `email_send`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_email_send_users1_idx` (`id_user`),
  ADD KEY `fk_email_send_statuses1_idx` (`id_status`);

--
-- Indices de la tabla `employees_salaries`
--
ALTER TABLE `employees_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payments_bills1_idx` (`id_bill`),
  ADD KEY `fk_payments_payment_method1_idx` (`id_payment_method`),
  ADD KEY `fk_payments_payments_status1_idx` (`id_payments_status`);

--
-- Indices de la tabla `payments_status`
--
ALTER TABLE `payments_status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_currency` (`id_currency`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_users1_idx` (`id_user`),
  ADD KEY `fk_products_statuses1_idx` (`id_status`),
  ADD KEY `fk_products_suppliers1_idx` (`id_supplier`);

--
-- Indices de la tabla `products_entries`
--
ALTER TABLE `products_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_entries_products1_idx` (`id_product`),
  ADD KEY `fk_products_entries_users1_idx` (`id_user`);

--
-- Indices de la tabla `products_history`
--
ALTER TABLE `products_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_history_products1_idx` (`id_product`),
  ADD KEY `fk_products_history_users1_idx` (`id_user`);

--
-- Indices de la tabla `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_promotions_statuses1_idx` (`id_status`);

--
-- Indices de la tabla `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_suppliers_statuses1_idx` (`id_status`),
  ADD KEY `fk_suppliers_users1_idx` (`id_user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_statuses1_idx` (`id_status`),
  ADD KEY `fk_users_roles1_idx` (`id_rol`);

--
-- Indices de la tabla `users_token`
--
ALTER TABLE `users_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_token_users1_idx` (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clients_types`
--
ALTER TABLE `clients_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `combos`
--
ALTER TABLE `combos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comissions`
--
ALTER TABLE `comissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `details_bills`
--
ALTER TABLE `details_bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `details_combo`
--
ALTER TABLE `details_combo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `details_promotions`
--
ALTER TABLE `details_promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `details_reports`
--
ALTER TABLE `details_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `details_reserved`
--
ALTER TABLE `details_reserved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- AUTO_INCREMENT de la tabla `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `email_send`
--
ALTER TABLE `email_send`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `employees_salaries`
--
ALTER TABLE `employees_salaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `payments_status`
--
ALTER TABLE `payments_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `products_entries`
--
ALTER TABLE `products_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `products_history`
--
ALTER TABLE `products_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT de la tabla `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users_token`
--
ALTER TABLE `users_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `fk_bill_clients1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bill_statuses1` FOREIGN KEY (`id_status`) REFERENCES `statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bill_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `fk_clients_clients_types` FOREIGN KEY (`id_type`) REFERENCES `clients_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_clients_statuses1` FOREIGN KEY (`id_status`) REFERENCES `statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `combos`
--
ALTER TABLE `combos`
  ADD CONSTRAINT `fk_combos_statuses1` FOREIGN KEY (`id_status`) REFERENCES `statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `details_bills`
--
ALTER TABLE `details_bills`
  ADD CONSTRAINT `fk_details_bills_products1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `details_combo`
--
ALTER TABLE `details_combo`
  ADD CONSTRAINT `fk_details_combo_combos1` FOREIGN KEY (`id_combo`) REFERENCES `combos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_details_combo_products1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `details_promotions`
--
ALTER TABLE `details_promotions`
  ADD CONSTRAINT `fk_details_promotions_products1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_details_promotions_promotions1` FOREIGN KEY (`id_promotion`) REFERENCES `promotions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `details_reports`
--
ALTER TABLE `details_reports`
  ADD CONSTRAINT `fk_details_reports_products1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_details_reports_reports1` FOREIGN KEY (`id_report`) REFERENCES `reports` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `details_reserved`
--
ALTER TABLE `details_reserved`
  ADD CONSTRAINT `fk_details_reserved_clients1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_details_reserved_products1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_details_reserved_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `discounts`
--
ALTER TABLE `discounts`
  ADD CONSTRAINT `fk_discounts_statuses1` FOREIGN KEY (`id_status`) REFERENCES `statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `email_send`
--
ALTER TABLE `email_send`
  ADD CONSTRAINT `fk_email_send_statuses1` FOREIGN KEY (`id_status`) REFERENCES `statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_email_send_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_payments_bills1` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payments_payment_method1` FOREIGN KEY (`id_payment_method`) REFERENCES `payment_method` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payments_payments_status1` FOREIGN KEY (`id_payments_status`) REFERENCES `payments_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `payment_method`
--
ALTER TABLE `payment_method`
  ADD CONSTRAINT `payment_method_ibfk_1` FOREIGN KEY (`id_currency`) REFERENCES `currencies` (`id`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_statuses1` FOREIGN KEY (`id_status`) REFERENCES `statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_suppliers1` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `products_entries`
--
ALTER TABLE `products_entries`
  ADD CONSTRAINT `fk_products_entries_products1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_entries_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `products_history`
--
ALTER TABLE `products_history`
  ADD CONSTRAINT `fk_products_history_products1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_history_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `fk_promotions_statuses1` FOREIGN KEY (`id_status`) REFERENCES `statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `fk_suppliers_statuses1` FOREIGN KEY (`id_status`) REFERENCES `statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_suppliers_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_roles1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_statuses1` FOREIGN KEY (`id_status`) REFERENCES `statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users_token`
--
ALTER TABLE `users_token`
  ADD CONSTRAINT `fk_users_token_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
