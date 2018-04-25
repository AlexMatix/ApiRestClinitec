
insert into tipo_usuario(Tipo_usuario) values ("Administrador");
insert into tipo_usuario(Tipo_usuario) values ("Medico");
insert into tipo_usuario(Tipo_usuario) values ("Enfermera");
insert into tipo_usuario(Tipo_usuario) values ("Paciente");

/**+++++++++++++++++++++++++++++++++++++++++++*/

insert into camas_x_piso(Piso, Seccion, Descripcion, ocupado, idCentro_medico, Estado) values ("Planta baja", "Cancer", 	"Cama con oxgeno", 0, 1, 1);
insert into camas_x_piso(Piso, Seccion, Descripcion, ocupado, idCentro_medico, Estado) values ("Primer piso", "Cancer", 	"Cama con oxgeno", 0, 2, 1);
insert into camas_x_piso(Piso, Seccion, Descripcion, ocupado, idCentro_medico, Estado) values ("Segundo piso", "niños", 	"Cama con oxgeno", 1, 2, 0);
insert into camas_x_piso(Piso, Seccion, Descripcion, ocupado, idCentro_medico, Estado) values ("tercero piso", "Intensiva", "Cama con oxgeno", 0, 1, 1);
insert into camas_x_piso(Piso, Seccion, Descripcion, ocupado, idCentro_medico, Estado) values ("Segundo piso", "Cancer", 	"Cama con oxgeno", 1, 3, 1);
