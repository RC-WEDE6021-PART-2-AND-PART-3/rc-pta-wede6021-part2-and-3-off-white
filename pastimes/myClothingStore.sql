-- Pastimes ClothingStore Database
DROP DATABASE IF EXISTS ClothingStore;
CREATE DATABASE ClothingStore;
USE ClothingStore;

DROP TABLE IF EXISTS tblOrderItems;
DROP TABLE IF EXISTS tblOrders;
DROP TABLE IF EXISTS tblMessages;
DROP TABLE IF EXISTS tblClothes;
DROP TABLE IF EXISTS tblAdmin;
DROP TABLE IF EXISTS tblUser;

CREATE TABLE tblUser (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    isVerified TINYINT(1) DEFAULT 0
);

CREATE TABLE tblAdmin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE tblClothes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    description TEXT NOT NULL,
    brand VARCHAR(100),
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255),
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES tblUser(id)
);

CREATE TABLE tblOrders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    status VARCHAR(50) DEFAULT 'Pending',
    FOREIGN KEY (user_id) REFERENCES tblUser(id)
);

CREATE TABLE tblOrderItems (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    FOREIGN KEY (order_id) REFERENCES tblOrders(id),
    FOREIGN KEY (product_id) REFERENCES tblClothes(id)
);

CREATE TABLE tblMessages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender VARCHAR(100),
    receiver VARCHAR(100),
    message TEXT,
    date_sent TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO tblAdmin (username,password)
VALUES ('admin', MD5('admin123'));
