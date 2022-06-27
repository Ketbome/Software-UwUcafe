Usando xampp 
cd C:\xampp\mysql\bin
mysql.exe -u root -p
create database uwucafe
Use uwucafe

CREATE TABLE usuarios(
username CHAR(10) NOT NULL,
password CHAR(15) NOT NULL,
type CHAR(15) NOT NULL,
PRIMARY KEY (username));

CREATE TABLE productos(
     id MEDIUMINT NOT NULL AUTO_INCREMENT,
     prod_name CHAR(30) NOT NULL,
     cantidad INT(15) NOT NULL,
     precio INT NOT NULL,
     PRIMARY KEY (id)
);

CREATE TABLE transacciones(
     n_trans MEDIUMINT NOT NULL AUTO_INCREMENT,
     precio INT NOT NULL,
     fecha DATETIME NOT NULL,
     PRIMARY KEY (n_trans)
);

CREATE TABLE pedidos(
     mesa INT NOT NULL,
     orderstatus CHAR(15),
     encargado CHAR(15),
     PRIMARY KEY (mesa)
);

CREATE TABLE pedidos_productos(
     mesa INT NOT NULL,
     producto CHAR(30),
     cantidad INT
);

INSERT INTO usuarios(username,password,type) VALUES ('admin','admin','Admin');
INSERT INTO usuarios(username,password,type) VALUES ('Juan','admin','Mesero');
INSERT INTO usuarios(username,password,type) VALUES ('mesero','mesero','Mesero');
INSERT INTO usuarios(username,password,type) VALUES ('chef','chef','Chef');
INSERT INTO usuarios(username,password,type) VALUES ('Agustina','admin','Chef');
INSERT INTO usuarios(username,password,type) VALUES ('Clara','admin','Cajero');

INSERT INTO productos(prod_name,cantidad,precio) VALUES ('Café',52,1200);
INSERT INTO productos(prod_name,cantidad,precio) VALUES ('Banana',24,500);
INSERT INTO productos(prod_name,cantidad,precio) VALUES ('Chocolate',70,2500);
INSERT INTO productos(prod_name,cantidad,precio) VALUES ('Pan con queso',1000,1500);
INSERT INTO productos(prod_name,cantidad,precio) VALUES ('Brownie',56,1200);
INSERT INTO productos(prod_name,cantidad,precio) VALUES ('Churrasco',30,3200);