
-- SQL DATABASE SCRIPT

CREATE DATABASE IF NOT EXISTS YouBooking;
USE YouBooking;


-- table role
CREATE TABLE IF NOT EXISTS role (
  id_role INT PRIMARY KEY AUTO_INCREMENT,
  name_role VARCHAR(255) 
) ENGINE=InnoDB;

-- table utlilisateur
CREATE TABLE IF NOT EXISTS utilisateur (
  id_utilisateur INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(255) ,
  password VARCHAR(255) ,
  id_role INT,
  FOREIGN KEY (id_role) REFERENCES role(id_role)
) ENGINE=InnoDB;

-- table hotel
CREATE TABLE IF NOT EXISTS hotel (
  id_hotel INT PRIMARY KEY AUTO_INCREMENT,
  name_hotel VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- table room
CREATE TABLE IF NOT EXISTS room (
  id_room INT PRIMARY KEY AUTO_INCREMENT,
  prix INT ,
  status VARCHAR(50) ,
  quantite INT ,
  id_hotel INT,
  FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel)
) ENGINE=InnoDB;

-- table location 
CREATE TABLE IF NOT EXISTS location (
  id_location INT PRIMARY KEY AUTO_INCREMENT,
  city VARCHAR(255) ,
  address VARCHAR(255) ,
  id_hotel INT,
  FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel)
) ENGINE=InnoDB;

-- table reservtion
CREATE TABLE IF NOT EXISTS reservation (
  id_reservation INT PRIMARY KEY AUTO_INCREMENT,
  date_debut DATE ,
  date_fin DATE ,
  id_utilisateur INT,
  id_room INT,
  FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur),
  FOREIGN KEY (id_room) REFERENCES room(id_room)
) ENGINE=InnoDB;