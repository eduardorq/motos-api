-- docker/mysql/init/init.sql

CREATE DATABASE IF NOT EXISTS motos_db;

USE motos_db;

CREATE TABLE IF NOT EXISTS moto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(255) NOT NULL,
    cilindrada INT NOT NULL,
    marca VARCHAR(255) NOT NULL,
    tipo VARCHAR(255) NOT NULL,
    extras JSON,
    peso INT,
    edicion_limitada BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO moto (modelo, cilindrada, marca, tipo, extras, peso, edicion_limitada) 
VALUES ('MT-07', 689, 'Yamaha', 'Naked', JSON_ARRAY('ABS'), 184, 0);


CREATE DATABASE IF NOT EXISTS motos_db_test;

USE motos_db_test;

CREATE TABLE IF NOT EXISTS moto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(255) NOT NULL,
    cilindrada INT NOT NULL,
    marca VARCHAR(255) NOT NULL,
    tipo VARCHAR(255) NOT NULL,
    extras JSON,
    peso INT,
    edicion_limitada BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO moto (modelo, cilindrada, marca, tipo, extras, peso, edicion_limitada) 
VALUES ('MT-07', 689, 'Yamaha', 'Naked', JSON_ARRAY('ABS'), 184, 0);

GRANT ALL PRIVILEGES ON motos_db.* TO 'moto'@'%';
GRANT ALL PRIVILEGES ON motos_db_test.* TO 'moto'@'%';
FLUSH PRIVILEGES;