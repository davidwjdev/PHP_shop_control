CREATE DATABASE shop_control;

use shop_control;

CREATE TABLE `shop_control`.`clientes` ( `id_cliente` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(150) , `cpf` BIGINT(11) , `email` VARCHAR(150) , PRIMARY KEY (`id_cliente`));

CREATE TABLE `shop_control`.`produtos` ( `id_produto` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(250) NOT NULL , `valor_unitario` DECIMAL(6,2) NOT NULL , `quantidade` INT NOT NULL , PRIMARY KEY (`id_produto`));

CREATE TABLE `shop_control`.`pedidos` ( `id_pedido` INT NOT NULL AUTO_INCREMENT , `data` DATE NOT NULL , `codigo_barras` BIGINT(48) NOT NULL , `id_cliente` INT NOT NULL , PRIMARY KEY (`id_pedido`));

CREATE TABLE `shop_control`.`detalhe_pedido` ( `id_detalhe_pedido` INT NOT NULL AUTO_INCREMENT , `id_pedido` INT NOT NULL , `id_produto` INT NOT NULL , `quantidade_produto` INT NOT NULL , PRIMARY KEY (`id_detalhe_pedido`));

ALTER TABLE `pedidos` ADD CONSTRAINT `fk_pedido_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes`(`id_cliente`) ON DELETE RESTRICT ON UPDATE RESTRICT; 

ALTER TABLE `detalhe_pedido` ADD CONSTRAINT `fk_pedido_detalhe_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos`(`id_pedido`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `detalhe_pedido` ADD CONSTRAINT `fk_detalhe_pedido_produtos` FOREIGN KEY (`id_produto`) REFERENCES `produtos`(`id_produto`) ON DELETE RESTRICT ON UPDATE RESTRICT;