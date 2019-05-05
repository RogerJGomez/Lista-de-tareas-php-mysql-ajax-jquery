<?php 

//Se crea la conexión
$conex = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
//Se verifica si hubo un error, en caso de haberlo se muestra un mensaje en pantalla
if(mysqli_connect_errno()){
    echo'Error al conectar a la base de datos'.mysqli_connect_errno();
}

