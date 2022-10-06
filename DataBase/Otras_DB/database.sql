CREATE DATABASE IF NOT EXISTS colegio ;

USE colegio;

CREATE TABLE colegio_curso(
curso_codigo varchar(3) not null primary key
);

CREATE TABLE colegio_alumno(
alumno_ident VARCHAR(10) NOT NULL PRIMARY KEY,
alumno_nombres VARCHAR(40) NOT NULL,
alumno_apellidos VARCHAR(40) NOT NULL,
alumno_email VARCHAR(100) NOT NULL,
alumno_edad INT NOT NULL,
codigo_curso varchar(3) NOT NULL,
FOREIGN KEY(codigo_curso) REFERENCES colegio_curso(curso_codigo));


CREATE TABLE colegio_profesor(
profesor_ident VARCHAR(10) NOT NULL PRIMARY KEY,
profesor_nombres VARCHAR(40) NOT NULL,
profesor_apellidos VARCHAR(40) NOT NULL,
profesor_email VARCHAR(100) NOT NULL,
profesor_edad INT NOT NULL
);


CREATE TABLE colegio_asignatura(
asignatura_codigo INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
asignatura_nombre VARCHAR(40) NOT NULL);

CREATE TABLE colegio_profesor_curso_asignatura(
	id int not null primary key AUTO_INCREMENT,
ident_profesor VARCHAR(10) NOT NULL,
codigo_curso varchar(3) NOT NULL,
codigo_asignatura INT NOT NULL,
FOREIGN KEY(codigo_asignatura) REFERENCES colegio_asignatura(asignatura_codigo),
FOREIGN KEY(ident_profesor) REFERENCES colegio_profesor(profesor_ident),
FOREIGN KEY(codigo_curso) REFERENCES colegio_curso(curso_codigo));


CREATE TABLE colegio_notas(
	id int not null primary key AUTO_INCREMENT,
ident_alumno VARCHAR(10) NOT NULL,
codigo_asignatura INT NOT NULL,
anno year not null,
periodo varchar(1) not null,
nota1 int,
nota2 int,
nota3 int, 
nota4 int,
acum int,
definitiva int,
FOREIGN KEY(ident_alumno) REFERENCES colegio_alumno(alumno_ident),
FOREIGN KEY(codigo_asignatura) REFERENCES colegio_asignatura(asignatura_codigo));

CREATE TABLE colegio_profesor_estudiante_msg(
	id int not null primary key AUTO_INCREMENT,
ident_profesor VARCHAR(10) NOT NULL,
ident_alumno VARCHAR(10) NOT NULL,
sender VARCHAR(10) NOT NULL,
mensaje text NOT NULL,
hora timestamp not null,
FOREIGN KEY(ident_alumno) REFERENCES colegio_alumno(alumno_ident),
FOREIGN KEY(ident_profesor) REFERENCES colegio_profesor(profesor_ident));

CREATE TABLE colegio_profesor_curso_msg(
	id int not null primary key AUTO_INCREMENT,
ident_profesor VARCHAR(10) NOT NULL,
codigo_curso varchar(3) NOT NULL,
mensaje text NOT NULL,
hora timestamp not null,
FOREIGN KEY(codigo_curso) REFERENCES colegio_curso(curso_codigo),
FOREIGN KEY(ident_profesor) REFERENCES colegio_profesor(profesor_ident));

