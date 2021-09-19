CREATE DATABASE shop_control;

use shop_control;

CREATE TABLE `shop_control`.`clientes` ( `id_cliente` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(150) , `cpf` BIGINT(11) , `email` VARCHAR(150) , PRIMARY KEY (`id_cliente`));

CREATE TABLE `shop_control`.`produtos` ( `id_produto` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(250) NOT NULL , `valor_unitario` DECIMAL(6,2) NOT NULL , `quantidade` INT NOT NULL , PRIMARY KEY (`id_produto`));

CREATE TABLE `shop_control`.`pedidos` ( `id_pedido` INT NOT NULL AUTO_INCREMENT , `status` VARCHAR(50) NOT NULL , `data` DATE NOT NULL , `codigo_barras` BIGINT(48) NOT NULL , `id_cliente` INT NOT NULL , PRIMARY KEY (`id_pedido`));

ALTER TABLE `pedidos` ADD CONSTRAINT `fk_pedido_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes`(`id_cliente`) ON DELETE RESTRICT ON UPDATE RESTRICT; 
