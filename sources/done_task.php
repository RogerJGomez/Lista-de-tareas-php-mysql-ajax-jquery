<?php
include ('config.php');//Se incluye la conexión a la BD
include ('db.php');

$id =$_POST['id'];//Se recibe la variable "id" de Ajax que representa el codigo unico de cada tarea y lo uso para hacer la respectiva consulta

    $insertar = "SELECT * FROM tasks1 WHERE id ='$id'";//Se hace la consulta donde selecciono todo de la fila donde el id sea igual a la variable
    $ejecutar = mysqli_query($conex, $insertar); //Ejecuto la consulta

    $task = mysqli_fetch_assoc($ejecutar); //Almaceno en una variable el arreglo con la fila
    
    $done = $task['done']; //Almaceno en otra variable el campo específico que necesito

    if ($done == 0){ //Verifico si el campo "done" es igual a 0 ó a 1. Si el campo es igual a 0 quiere decir que la tarea no está lista, por lo tanto se cambia su valor a 1
        $update="UPDATE tasks1 SET done =1 WHERE id = $id";
        $ejecutar = mysqli_query($conex, $update);
    }
    else{
        $update="UPDATE tasks1 SET done =0 WHERE id = $id"; //Se hace lo contrario en caso de que la variable sea igual a 1
        $ejecutar = mysqli_query($conex, $update);

    }