
-- Script to create table
CREATE DATABASE IF NOT EXISTS demo;
CREATE TABLE `demo`.`customer` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `firstName` VARCHAR(20) NOT NULL , 
    `lastName` VARCHAR(20) NOT NULL , 
    `phone` VARCHAR(20) NOT NULL , 
    `address` VARCHAR(150) NOT NULL , 
    `email` VARCHAR(100) NOT NULL , 
    `password` VARCHAR(20) NOT NULL ,
    `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)) 
    ENGINE = InnoDB;
-- Scripts to insert data to customer table
USE demo;
INSERT INTO `demo`.`customer`(firstName, lastName, phone, address, email, password)
    VALUES 
        ("Mike","Davis","613-545-6124","342 Bell Corner", "aaa@gmail.com","Qwertyu"),
        ("Alex","Sanders","613-647-4289","698 Queen St E", "bbb@gmail.com","wertyui"),
        ("Tim","Baker","343-803-2671","23 Chevy Rd","ccc@gmail.com","Ertyuio"),
        ("Lynn","Dalton","819-964-0376","2 Woodrofe Ave","ddd@gmail.com","Rtyuiop"),
        ("Sarah","King","613-816-8378","3265 Bloor St W","eee@gmail.com","Tyuiopa"),
        ("Kimberly","James","343-974-7004","9919 Fairmount Dr SE","fff@gmail.com","Yuiopas"),
        ("Jerry","Phillips","613-980-5328","1325 Finch Ave W","ggg@gmail.com","Uiopasd"),
        ("Cody","Adams","819-473-5242","2190 McNicoll Ave","hhh@gmail.com","Iopasdf"),
        ("Nicole","Cook","819-933-4007","5090 Domano Blvd","iii@gmail.com","Opasdfg"),
        ("Brian","Walker","343-380-4828","1378 W Georgia St","kkk@gmail.com","Pasdfgh"),
        ("Karen","Douglas","343-296-2857","415 The Westway","lll@gmail.com","Asdfghj");