INSERT INTO admin (name, login, password, token) 
VALUES ("admin", "admin", "admin", NULL);

ALTER TABLE admin

CREATE TABLE products (
id INT AUTO_INCREMENT NOT NULL,
name VARCHAR(255) NOT NULL,
value DECIMAL(10, 2) NOT NULL,
size VARCHAR(255),
PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;