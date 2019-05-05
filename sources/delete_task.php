<?php
include ('config.php');//Se incluye la conexión a la BD
include ('db.php');

$id1 =$_POST['id1']; //Se recibe la variable "id" de Ajax que representa el codigo unico de cada tarea y lo uso para hacer la respectiva consulta

    $insertar = "DELETE FROM tasks1 WHERE id ='$id1'";//Se hace la consulta, se eliminará la tarea donde id de la BD sea igual a la variable
    $ejecutar = mysqli_query($conex, $insertar); //Se ejecuta la consulta

//Luego de haber terminado el proceso, muestro un mensaje en pantalla a través de Ajax

  
       

