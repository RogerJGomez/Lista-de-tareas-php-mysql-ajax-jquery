<?php
include ('config.php'); //Se incluye la conexión a la BD
include ('db.php');

$cargar = "SELECT * FROM  tasks1"; //Se consultan todas las tareas existentes en la BD

//Genero una tabla de html con bootstrap para mostrar los datos obtenidos de la BD
echo'<table class="table table-bordered table-hover"> 
        <thead>
            <th>Nº</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Operación</th>
        </thead>
        <tbody>';
            $registro = mysqli_query($conex, $cargar); 
            //Por cada registro en la BD voy creando una fila en la tabla y por cada campo una columna
            while($registro2 = mysqli_fetch_array($registro)){
                echo '<tr>
                        <td>'.$registro2['id'].'</td>
                        <td>'.$registro2['nombre'].'</td>
                        <td>'.$registro2['descripcion'].'</td>
                        ';
                if($registro2['done']==0){ //Verifico si el campo "done" es 0 ó 1, si es 0 quiere decir que la tarea aun no se ha completado, por lo tanto la muestro en gris
                    echo'
                        <td><a href="javascript:editar('.$registro2['id'].');" data-toggle="tooltip" font-size:34px;"data-placement="top" title="Editar" class=" btn btn-info" ><i class="far fa-edit"></i></a> <a href="javascript:eliminar('.$registro2['id'].');" data-toggle="tooltip" font-size:34px;"data-placement="top" title="Eliminar" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a> <a href="javascript:done('.$registro2['id'].');" data-toggle="tooltip" font-size:34px;"data-placement="top" title="Listo" class="btn btn-dark"><i class="far fa-times-circle"></i></a></td>
                    </tr>'; 
                }
                else{
                    echo'
                        <td><a href="javascript:editar('.$registro2['id'].');" data-toggle="tooltip" font-size:34px;"data-placement="top" title="Editar" class=" btn btn-info"><i class="far fa-edit"></i></a> <a href="javascript:eliminar('.$registro2['id'].');" data-toggle="tooltip" font-size:34px;"data-placement="top" title="Eliminar" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a> <a href="javascript:done('.$registro2['id'].');" data-toggle="tooltip" font-size:34px;"data-placement="top" title="Listo" class="btn btn-success"><i class="fas fa-check"></i></a></td>
                    </tr>'; 
                }    
      
            }
echo'  </tbody>

     </table>';

     //Luego de tener la tabla lista, la devuelvo a Ajax y la muestro en la página