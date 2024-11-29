CREATE DATABASE IF NOT EXISTS `test`;

USE `test`;

CREATE TABLE `products` 
(`id` INT NOT NULL AUTO_INCREMENT , 
 `product_id` INT NOT NULL , 
 `product_name` VARCHAR(100) NOT NULL , 
 `product_price` FLOAT NOT NULL , 
 `product_article` INT NOT NULL , 
 `product_quantity` INT NOT NULL , 
 `date_create` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
 `visible` BOOLEAN NOT NULL DEFAULT TRUE ,
 PRIMARY KEY (`id`)) 
 ENGINE = InnoDB;
