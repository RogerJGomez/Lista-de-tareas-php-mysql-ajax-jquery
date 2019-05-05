<?php
include ('config.php');
include ('db.php');
//agregar resp a las condicionales


$titulo =$_POST['titulo'];
$descrip =$_POST['descrip'];
$id1 =$_POST['id1'];


    //Si no ocurrió ningún problema, la variable "resp" queda con el valor de 0 y luego se procede a insertar los datos enviados por el ajax en la BD
    $insertar = "UPDATE tasks1 SET nombre='$titulo', descripcion='$descrip' WHERE id='$id1'";
    $ejecutar = mysqli_query($conex, $insertar);  