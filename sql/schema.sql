-----------------------------------------------------------
-- Create Database
create database db_inatel_games;

-----------------------------------------------------------
-- To use  Database from Terminal
use db_inatel_games -u root -p

-----------------------------------------------------------
-- Drop tables
drop table tblShopCart;
drop table tblCart;
drop table tblShop;
drop table tblGame;
drop table tblUser;

-----------------------------------------------------------
-- Delete tables
delete from tblShopCart;
delete from tblCart;
delete from tblShop;
delete from tblGame;
delete from tblUser;

-----------------------------------------------------------
-- Create tables
create table tblUser(
    id INTEGER NOT NULL AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL,
    passw VARCHAR(100) NOT NULL,
    contactName VARCHAR(100) NOT NULL,
    zipCode VARCHAR(30) NOT NULL,
    state VARCHAR(100) NOT NULL,
    city VARCHAR(100) NOT NULL,
    address VARCHAR(500) NOT NULL,
    phoneNumber VARCHAR(30) NOT NULL,
    PRIMARY KEY (id)
);

create table tblGame(
    id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(500) NOT NULL,
    currentValue DOUBLE NOT NULL,
    availability VARCHAR(50) NOT NULL,
    category VARCHAR(50) NOT NULL,
    console VARCHAR(50) NOT NULL,
    photoLink VARCHAR(200) NOT NULL,
    PRIMARY KEY (id)
);

create table tblCart(
    id INTEGER NOT NULL AUTO_INCREMENT,
    userIdFk INTEGER NOT NULL,
    gameIdFk INTEGER NOT NULL,
    transactionStatus VARCHAR(50) NOT NULL,
    transactionValue DOUBLE NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (userIdFk) REFERENCES tblUser(id),
    FOREIGN KEY (gameIdFk) REFERENCES tblGame(id)
);

create table tblShop(
    id INTEGER NOT NULL AUTO_INCREMENT,
    userIdFk INTEGER NOT NULL,
    transactionValue DOUBLE NOT NULL,
    deliverAddress VARCHAR(500) NOT NULL,
	deliverCEP VARCHAR(20) NOT NULL,
	deliverCity VARCHAR(100) NOT NULL,
	deliverState VARCHAR(100) NOT NULL,
	deliverNeighborhood VARCHAR(100) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (userIdFk) REFERENCES tblUser(id)
);

create table tblShopCart(
    cartIdFk INTEGER NOT NULL,
    shopIdFk INTEGER NOT NULL,
    FOREIGN KEY (cartIdFk) REFERENCES tblCart(id),
    FOREIGN KEY (shopIdFk) REFERENCES tblShop(id)
);

-----------------------------------------------------------
-- Insert tables

INSERT INTO tblUser(id, passw, contactName, email, zipCode, state, city, address, phoneNumber) VALUES(1, 'a', 'name_01', 'a', '37540-000', 'Minas Gerais', 'Santa Rita do Sapucai', 'Rua lala, 1', '35-1234-1234');
INSERT INTO tblUser(id, passw, contactName, email, zipCode, state, city, address, phoneNumber) VALUES(2, 'p2', 'name_02', 'email_02@email.com', '37540-000', 'Minas Gerais', 'Santa Rita do Sapucai', 'Rua lele, 2', '35-1234-2345');
INSERT INTO tblUser(id, passw, contactName, email, zipCode, state, city, address, phoneNumber) VALUES(3, 'p3', 'name_03', 'email_03@email.com', '37540-000', 'Minas Gerais', 'Santa Rita do Sapucai', 'Rua lili, 3', '35-1234-3456');
INSERT INTO tblUser(id, passw, contactName, email, zipCode, state, city, address, phoneNumber) VALUES(4, 'p4', 'name_04', 'email_04@email.com', '37540-000', 'Minas Gerais', 'Santa Rita do Sapucai', 'Rua lolo, 4', '35-1234-4567');
INSERT INTO tblUser(id, passw, contactName, email, zipCode, state, city, address, phoneNumber) VALUES(5, 'p5', 'name_05', 'email_05@email.com', '37540-000', 'Minas Gerais', 'Santa Rita do Sapucai', 'Rua lulu, 5', '35-1234-5678');
INSERT INTO tblUser(id, passw, contactName, email, zipCode, state, city, address, phoneNumber) VALUES(6, 'p6', 'name_06', 'email_06@email.com', '37540-000', 'Minas Gerais', 'Santa Rita do Sapucai', 'Rua kaka, 6', '35-1234-6789');
INSERT INTO tblUser(id, passw, contactName, email, zipCode, state, city, address, phoneNumber) VALUES(7, 'p7', 'name_07', 'email_07@email.com', '37540-000', 'Minas Gerais', 'Santa Rita do Sapucai', 'Rua keke, 7', '35-1234-7890');
INSERT INTO tblUser(id, passw, contactName, email, zipCode, state, city, address, phoneNumber) VALUES(8, 'p8', 'name_08', 'email_08@email.com', '37540-000', 'Minas Gerais', 'Santa Rita do Sapucai', 'Rua kiki, 8', '35-1234-0987');
INSERT INTO tblUser(id, passw, contactName, email, zipCode, state, city, address, phoneNumber) VALUES(9, 'p9', 'name_09', 'email_09@email.com', '37540-000', 'Minas Gerais', 'Santa Rita do Sapucai', 'Rua koko, 9', '35-1234-9876');

INSERT INTO tblGame(id, name, description, currentValue, availability, category, console, photoLink) 
VALUES(1, 'Final Fantasy Type-0', 'Description 01', 199.00, 'AVAILABLE', 'RPG', 'PS4', 'assets/css/img/finalFantasyType0.jpg');
INSERT INTO tblGame(id, name, description, currentValue, availability, category, console, photoLink) 
VALUES(2, 'Final Fantasy XIV', 'Description 02', 190.00, 'AVAILABLE', 'MMORPG', 'PS4', 'assets/css/img/finalFantasyXIV.jpg');
INSERT INTO tblGame(id, name, description, currentValue, availability, category, console, photoLink) 
VALUES(3, 'The Last of Us', 'Description 03', 120.00, 'AVAILABLE', 'SURVIVAL', 'PS4', 'assets/css/img/theLastOfUs.jpg');
INSERT INTO tblGame(id, name, description, currentValue, availability, category, console, photoLink) 
VALUES(4, 'Mortal Kombat X', 'Description 04', 210.00, 'AVAILABLE', 'FIGHT', 'PS4', 'assets/css/img/mortalKombatX.jpg');
INSERT INTO tblGame(id, name, description, currentValue, availability, category, console, photoLink) 
VALUES(5, 'Ultra Street Fighter IV', 'Description 05', 140.00, 'AVAILABLE', 'FIGHT', 'PS3', 'assets/css/img/ultraStreetFighterIV.jpg');
INSERT INTO tblGame(id, name, description, currentValue, availability, category, console, photoLink) 
VALUES(6, 'Shadow of Mordor', 'Description 06', 190.00, 'AVAILABLE', 'RPG', 'PS4', 'assets/css/img/shadowOfMordor.jpg');
INSERT INTO tblGame(id, name, description, currentValue, availability, category, console, photoLink) 
VALUES(7, 'Dying Light', 'Description 07', 199.00, 'AVAILABLE', 'SURVIVAL', 'PS4', 'assets/css/img/dyingLight.jpg');
INSERT INTO tblGame(id, name, description, currentValue, availability, category, console, photoLink) 
VALUES(8, 'Battlefield: Hardline', 'Description 08', 140.00, 'AVAILABLE', 'SHOOTER', 'PS4', 'assets/css/img/battlefieldHardline.jpg');
INSERT INTO tblGame(id, name, description, currentValue, availability, category, console, photoLink) 
VALUES(9, 'Destiny', 'Description 09', 170.00, 'AVAILABLE', 'SHOOTER', 'PS4', 'assets/css/img/destiny.jpg');
INSERT INTO tblGame(id, name, description, currentValue, availability, category, console, photoLink) 
VALUES(10, 'Tekken Tag Tournament', 'Description 10', 130.00, 'AVAILABLE', 'FIGHT', 'PS3', 'assets/css/img/tekkenTagTournament.jpg');
INSERT INTO tblGame(id, name, description, currentValue, availability, category, console, photoLink) 
VALUES(11, 'Need for Speed: Most Wanted', 'Description 11', 50.00, 'AVAILABLE', 'RUNNER', 'PS3', 'assets/css/img/needForSpeedMostWanted.jpg');
INSERT INTO tblGame(id, name, description, currentValue, availability, category, console, photoLink) 
VALUES(12, 'Gran Turismo 6', 'Description 12', 40.00, 'AVAILABLE', 'RUNNER', 'PS3', 'assets/css/img/granTurismoVI.jpg');








