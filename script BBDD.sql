create database spectrum
create table regional
(
    id_regional int AUTO_INCREMENT primary key,
    nombre_regional varchar(100) not null    
)
create table subregional
(
    id_subregional int AUTO_INCREMENT primary key,
    id_regional int,
    nombre_subregional varchar(100) not null,
    FOREIGN KEY (id_regional) REFERENCES regional(id_regional)    
)
create table rol
(
    id_rol int AUTO_INCREMENT primary key,
    nombre_rol varchar(50) not null,
    descripcion_rol varchar(50) not null
)

-- create table documentador
-- (
--     id_documentador int AUTO_INCREMENT primary key,
--     nombre_documentador varchar(50) not null,
--     apellido_documentador varchar(50) not null,
--     telefono_documentador varchar(50) not null,
--     correo_documentador varchar(200) not null,
--     direccion_documentador varchar(200) not null    
-- )





create table cliente
(
    id_cliente int AUTO_INCREMENT primary key,
    nombre_cliente varchar(50) not null,
    apellido_cliente varchar(50) not null,
    telefono_cliente varchar(50) not null,
    correo_cliente varchar(200) not null,
    direccion_cliente varchar(200) not null,
    ciudad_cliente varchar(200) not null,
    fecha_vinculacion_cliente DATE , 
    nit varchar (250)         
)



create table ingeniero
(
    id_ingeniero int AUTO_INCREMENT primary key,
    nombre_ingeniero varchar(50) not null,
    apellido_ingeniero varchar(50) not null,
    telefono_ingeniero varchar(50) not null,
    correo_ingeniero varchar(200) not null,
    direccion_ingeniero varchar(200) not null,
    fecha_ingreso_ingeniero DATE, 
    area varchar(250)
    
)

create table tecnico
(
    id_tecnico int AUTO_INCREMENT primary key,
    nombre_tecnico varchar(50) not null,
    apellido_tecnico varchar(50) not null,
    telefono_tecnico varchar(50) not null,    
    direccion_tecnico varchar(200) not null,
    ciudad_tecnico varchar(200) not null,   
    nivel_educacion  varchar(200) not null,  
    fecha_vinculacion_tecnico DATE       
)

create table usuario(
    id_usuario int AUTO_INCREMENT primary key,
    nombre_usuario varchar(100) not null,
    apellido_usuario varchar(50) not null,
    telefono_usuario varchar(50) ,    
    direccion_usuario varchar(200) ,
    ciudad_usuario varchar(200) ,   
    usuario varchar(100) not null,
    passwordUsuario varchar(200) not null,    
    correo varchar (100),
    id_rol int ,
    FOREIGN KEY (id_rol) REFERENCES rol(id_rol)    
)



create table agenda
(
    id_agenda int AUTO_INCREMENT primary key,
    id_usuario int,
    fase varchar(200) ,
    tarea varchar(200)  not null,
    descripcion_tarea varchar(200)  not null,
    fecha_agenda DATE not null,
    hora_agenda varchar(200) not null,
    id_tecnico int ,
    id_ingeniero int,
    id_cliente int ,    
    id_subregional int,
    id_regional int,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_tecnico) REFERENCES tecnico(id_tecnico),
    FOREIGN KEY (id_ingeniero) REFERENCES ingeniero(id_ingeniero),
    FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente),    
    FOREIGN KEY (id_subregional) REFERENCES subregional(id_subregional),        
    FOREIGN KEY (id_regional) REFERENCES regional(id_regional)        
)


create table calidad
(   
    id_calidad int AUTO_INCREMENT primary key,
    id_agenda int ,
    estado_final_actividad varchar(50) , 
    observaciones varchar(200) , 
    causal_puntualidad varchar (100) , 
    estado varchar (50) , 
    novedad varchar (200) , 
    observacion_calidad varchar (200),
    novedad_puntualidad_terreno varchar (200) , 
    observacion_puntualidad_terreno varchar (200) , 
    falta boolean,
    tipo_falta   varchar (100) , 
    observaciones_faltas varchar (200) , 

    FOREIGN KEY (id_agenda) REFERENCES agenda(id_agenda)
) 

-------------------------------------------------------------
insert into  regional (nombre_regional)  
 values 
 ('Bogota'),
 ('Cali'),
 ('Medellin')
-----------------------------------------------------------
insert into  subregional  values (null, 1,'NORTE')
, (null,1,'SUR')
, (null,1,'CORPORATIVO')
, (null,1,'NORORIENTE')
, (null,1,'NOROCCIDENTE')
, (null,2,'NORTE')
, (null,2,'SUR')
, (null,2,'CORPORATIVO')
, (null,2,'NORORIENTE')
, (null,2,'NOROCCIDENTE')
, (null,3,'NORTE')
, (null,3,'SUR')
, (null,3,'CORPORATIVO')
, (null,3,'NORORIENTE')
, (null,3,'NOROCCIDENTE')
------------------------------------------------------------
insert into  rol  values (null,'Admin','Control total'),
 (null,'Consultor','Limitado a solo consultas')
------------------------------------------------------------
insert into digitador values
 (null,'Jorge Dario','Alberdi Benet','3101600477',' DarioAlberdi@gmail.com', 'Carrera 3 # 18- 45',2),
(null,'Alberto','Segovia Moran','3105495493','Moran@gmail.com', 'Carrera 7 # 84- 72',2),
(null,'Gabriel','Infante','3124827170','Segovia@gmail.com', 'Calle 4 No. 5 – 10',2),
(null,'Rosendo','Amoros','3121202002', 'Amoros@gmail.com','Calle 11 No. 4 - 14',2)

------------------------------------------------------------

insert into cliente values (null,'Tadeo','Barrios','3102240935','Barrios@gmail.com','Calle 24 N° 5-60','Bogota','2020-01-28','456789' ); 
-----------------------------------------------------------------------------
insert into ingeniero values (null, 'Paulino', 'Roman', '3124827170','Roman@gmail.es',' Av. Ciudad de Cali No. 6C-09', '1990-10-09','Soporte'); 


insert into tecnico values (null, 'Vito', 'Vidal Peral', '3204568745','Vito@gmail.com','Calle 48b sur No. 21-13', '1999-12-09','Soporte'); 

----------------------------------------------------------------------------
insert into agenda values 
(null,'1','Revision aparato','revision del estado del equipo, reportan no conexion','2022-03-15', '08:20:00',1,1,1,1 )
------------------------------------------------------------------------------------

insert into calidad (id_agenda,estado_final_actividad, observaciones,causal_puntualidad,estado)
values (1,'EXITOSO
','PUNTUALIDAD 07 - EMPALMES FIBRA OPTICA; 01/06/2021 ; TÉCNICO: DILIER H. GRAJALES R.,  HORA VISITA: 09:00, HORA LLEGADA: 09:00, ATIENDE: CARLOS AVENDAÑO, CARGO: ADMINISTRADOR, TELEFONO: 3219367688
','CONFIRMA CLIENTE
','CUMPLIDA
')


-------------------------------------------
insert into usuario values 
(null,'Mauricio', 'Medina',null,null,null, 'MMS', '202cb962ac59075b964b07152d234b70', 1),
(null,'Kevin', 'NN',null,null,null, 'Kevin1', '202cb962ac59075b964b07152d234b70', 1)








