CREATE DATABASE shop_control;

use shop_control;

CREATE TABLE `shop_control`.`clientes` ( `id_cliente` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(150) , `cpf` BIGINT(11) , `email` VARCHAR(150) , PRIMARY KEY (`id_cliente`));

