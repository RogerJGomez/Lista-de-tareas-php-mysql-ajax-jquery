<?php
include ('config.php');//Se incluye la conexión a la BD
include ('db.php');


$titulo =$_POST['titulo'];//Recibo dos variables de Ajax, las cuales son la descripción y el título de la tarea
$descrip =$_POST['descrip'];


    //Se procede a insertar los datos enviados por ajax en la BD
    $insertar = "INSERT INTO tasks1(nombre,descripcion) VALUES ('$titulo','$descrip')";
    $ejecutar = mysqli_query($conex, $insertar);          

    //Luego de que se termine el proceso, se muestra un mensaje en pantalla mediante Ajax