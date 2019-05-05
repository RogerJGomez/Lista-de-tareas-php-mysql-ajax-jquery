<?php
include ('config.php');
include ('db.php');
//agregar resp a las condicionales

$id =$_POST['id'];


    //Si no ocurrió ningún problema, la variable "resp" queda con el valor de 0 y luego se procede a insertar los datos enviados por el ajax en la BD
    $insertar = "SELECT * FROM tasks1 WHERE id='$id'";
    $ejecutar = mysqli_query($conex, $insertar);
    
    
    $jsonData = array();//Se declara un arreglo donde se almacenarán los datos de la tabla
    while ($datos=mysqli_fetch_assoc($ejecutar)) {
        $jsonData[] = $datos; //Se recorre el resultado de la consulta SQL y los datos se van almacenando en el arreglo jsonData
    }
    
    
            $jsonDataf = utf8ize($jsonData);//Luego se le da formato al arreglo
    
      function utf8ize($mixed) {
        if (is_array($mixed)) {
            foreach ($mixed as $key => $value) {
                $mixed[$key] = utf8ize($value);
            }
        } else if (is_string ($mixed)) {
            return utf8_encode($mixed);
        }
        return $mixed;
    }
    
    
echo json_encode($jsonDataf);//Se devuelve la respuesta en formato JSON ya preparado