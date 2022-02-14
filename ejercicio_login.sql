CREATE DATABASE login
    WITH
        OWNER = postgres
            ENCODING = 'UTF8';

CREATE TABLE personas(
    cedula         integer             NOT NULL,
    nombre         character varying   NOT NULL,
    apellido        character varying   NOT NULL,
    fecha_nacimiento    date,
    PRIMARY KEY (cedula)    
);

CREATE TABLE usuarios(
    cedula          integer         NOT NULL,
    nombre_usuario  character varying   NOT NULL,
    contrasena      character varying   NOT NULL,
    CONSTRAINT fk_cedula FOREIGN KEY (cedula) REFERENCES personas(cedula),
    PRIMARY KEY (cedula)
);

CREATE TABLE log_usuarios(
    consecutivo     serial,
    cedula          integer         NOT NULL,
    nombre_log      character varying   NOT NULL,
    fecha_log       date            NOT NULL,
    CONSTRAINT fk_cedula FOREiGN KEY (cedula) REFERENCES personas(Cedula),
    PRIMARY KEY (consecutivo)
);

