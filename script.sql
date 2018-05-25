
mysqldump -h localhost -u homestead -psecret homestead>archivo.sql

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


/* PEDIR TOKEN DE VERIFICACION */

Client ID: 1
Client secret: iXikwScN5llnJQYa6wp6WBD06tZKRccdWEEn2IhE


**** METODO POST CLIENT CREDENTIALS****

grant_type client_credentials
client_id  3
client_secret 1H7rmlQN9PepI4Ha0ZeVnVOK3ScSh5wnAgzT6st3


****** METODO PASSPORT CLIENT USUASUARIO *******

 What should we name the password grant client? [Laravel Password Grant Client]:
 > angularPassword 

Password grant client created successfully.
Client ID: 2
Client Secret: Gr948s0cDWqEcRgJHUFBjJjc8H8YKCpxfTRrz7G5











////////////////// resutlado

{
    "token_type": "Bearer",
    "expires_in": 1800,
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjJhOTE4NGVkYTFjYjdiZmRhOTJhOTkyZWM4ZTAyODZmZjAwYjc2ZDMzN2VkODU0Y2Y3MTJiOTY5MDc3ZTU5MGY0OTlhMGY4YTZhZDcwOGU2In0.eyJhdWQiOiIzIiwianRpIjoiMmE5MTg0ZWRhMWNiN2JmZGE5MmE5OTJlYzhlMDI4NmZmMDBiNzZkMzM3ZWQ4NTRjZjcxMmI5NjkwNzdlNTkwZjQ5OWEwZjhhNmFkNzA4ZTYiLCJpYXQiOjE1MjY0NDI4MDMsIm5iZiI6MTUyNjQ0MjgwMywiZXhwIjoxNTI2NDQ0NjAzLCJzdWIiOiIiLCJzY29wZXMiOltdfQ.mDlA_O_H6uShf0YqmVvtYoYLQwBXHmT6ofvKISJi0nxtj70VgJFRpPrIRCV8F_9gZ6FNifmHdck9FY_dzMMjfv2Fl7VoIOUY-PjKvz8hd95ex-7xieBTQ1HfR4yXLagmy18X4fAuz7JHJtUE3wgOz2bumm1NjFz0f8-eApbli4aMR9onP9QlWRkbJ_lizQRxjFJzoWBfI2dM4Cv4R-yJmXd5Gq6iKauY3MBF4At8Gv_wqzYMXeYQQFj2FYlJFnhiQiJqUvTaKBpu7_4JKvKNJVuccc-UHNwTeYAsm_COfG6EurygzoXyE-2PownY-JXBvtiFCHl4Np8tas1CJpC7EUhGLsex1rFdyVXcjw6UvytUWQf9KwymSPCI0m4fJg1Hc-tUtTjp0Emm_01q9MGtPxJF3KDyDBMktyjLKJIMyxJIVENKOuAPSzOkeyqXEbiOxvJKYWAH3dBqVbi12A-CvSxedgPFhOlDXXPnVEMasx_FQkJihmHfn887E69Y99PJDUrTdw4A9ixV_20MLxirFRROF5YTH5XIntPR9rhJb6ATrYM33wqI--7D3XnHz99ztiPtCGGjm7-iGEtuCCBoo8YzErJdN00yCZpbijVgcC6GPyA-mSKaaULVHR2l4yRIl8HglHoPdTJeyeahxAO110YH-osyfG2CcOmhF4P9sRA"
}

**** Con el resultado mandarlo a la cabcera

