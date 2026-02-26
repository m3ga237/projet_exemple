CREATE DATABASE IF NOT EXISTS bts_sio_db;
USE bts_sio_db;

CREATE USER IF NOT EXISTS 'sio_user'@'localhost' IDENTIFIED BY 'sio_pass';
GRANT ALL PRIVILEGES ON bts_sio_db.* TO 'sio_user'@'localhost';
FLUSH PRIVILEGES;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS inventory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    quantity INT DEFAULT 0,
    price DECIMAL(10, 2) DEFAULT 0.00
);

INSERT INTO users (username, password) VALUES ('admin', 'adminpasswordisnotadmin');
INSERT INTO users (username, password) VALUES ('highfive4test', 'mp4test');
INSERT INTO inventory (name, quantity, price) VALUES ('Clavier Mécanique', 15, 45.99);
INSERT INTO inventory (name, quantity, price) VALUES ('Ecran 24 pouces', 8, 129.00);