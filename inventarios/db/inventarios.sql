create database inventarios;
use inventarios;

create table TblImplementos(
	ID_Implementos int not null auto_increment,
    Nombre varchar(100) not null,
    Descripcion varchar(300) not null,
    Categoria varchar(50) not null,
    Cantidad int not null,
    Ubicacion varchar(50) not null,
    primary key(ID_Implementos)
);

create table TblEntradas(
	ID_Entradas int not null auto_increment,
    ID_Implementos int not null,
    Fecha varchar(50) not null,
    Cantidad int not null,
    primary key(ID_Entradas),
    foreign key(ID_Implementos) references TblImplementos(ID_Implementos)
);

create table TblEmpleados(
	ID_Empleado int not null auto_increment,
    Nombre varchar(30) not null,
    Cargo varchar(50) not null,
    Departamento varchar(50) not null,
    Email varchar(50) not null,
    Telefono varchar(50) not null,
    primary key(ID_Empleado)
);

create table TblSalidas(
	ID_Salidas int not null auto_increment,
    ID_Implementos int not null,
    Fecha varchar(50) not null,
    Cantidad int not null,
    ID_Empleado int not null, 
    primary key(ID_Salidas),
	foreign key(ID_Implementos) references TblImplementos(ID_Implementos),
	foreign key(ID_Empleado) references TblEmpleados(ID_Empleado)
);

create table TblUsuarios(
	ID_Usuario int not null auto_increment,
    ID_Empleado int not null,
    Usuario varchar(50) not null,
    Contraseña varchar(50) not null,
    primary key(ID_Usuario),
	foreign key(ID_Empleado) references TblEmpleados(ID_Empleado)
);
