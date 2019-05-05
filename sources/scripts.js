cargarTabla(); //Función para llenar la tabla con los datos de BD
var id1;

function descarga(){ //Función que tomará los datos de la tabla para luego generar un botón de descarga
    $("table").tableExport({
        headings: false,                    // (Boolean), display table headings (th/td elements) in the <thead>
        footers: true,                     // (Boolean), display table footers (th/td elements) in the <tfoot>
        formats: ["txt"],    // (String[]), filetypes for the export
        fileName: "Lista",                    // (id, String), filename for the downloaded file
        bootstrap: false,                   // (Boolean), style buttons using bootstrap
        position: "bottom",                // (top, bottom), position of the caption element relative to table
        ignoreRows: null,                  // (Number, Number[]), row indices to exclude from the exported file(s)
        ignoreCols: null,                  // (Number, Number[]), column indices to exclude from the exported file(s)
        ignoreCSS: ".tableexport-ignore",  // (selector, selector[]), selector(s) to exclude from the exported file(s)
        emptyCSS: ".tableexport-empty",    // (selector, selector[]), selector(s) to replace cells with an empty string in the exported file(s)
        trimWhitespace: false              // (Boolean), remove all leading/trailing newlines, spaces, and tabs from cell text in the exported file(s)
        });
}
  
function cargarTabla(){
    $.ajax({
        url: "sources/cargar_tasks.php", //ruta del php a ejecutar.
        type: "POST",
        dataType: 'text',
        data:{},
        success: function (guardar) {
            $('#tabla').html(guardar);
            
            descarga();//Se llama a la función que genera el botón el descarga 
            $("#descarga").prop('hidden', false);//Se hace visible el botón de descarga
        }

    });
}


$('#add').on('click',function(e){//Funcion que se ejecuta al hacer click en el boton Aceptar        
            titulo = $("#titulo").val(); 
            descrip = $("#descrip").val(); 
            
        if(titulo==""||descrip==""){
           // alert("DEBE LLENAR LOS CAMPOS ANTES DE AÑADIR");
           mensaje="Debe llenar todos los campos";
           mensaje2="<center><h5 id='mensaje' style='color:red; font-size:15px;'><i class='fas fa-ban' style='font-size:15px;color:red; margin-bottom:15px;'></i> Debe llenar todos los campos <i class='fas fa-ban' style='font-size:15px;color:red; margin-bottom:15px;'></i></h5></center>"
            //document.getElementById("mensaje").innerHTML = mensaje;
            $('#mensaje').html(mensaje2).show(200).delay(2500).hide(200);
        }        
        else{
            $.ajax({
                url: "sources/save_task.php", //ruta del php a ejecutar.
                type: "POST",
                dataType: 'text',
                data:{'titulo':titulo, 'descrip':descrip},
                success: function (guardar) {
                    document.getElementById("mensaje").innerHTML = "<i class='fas fa-ban' style='font-size:15px;color:red; margin-bottom:15px;'></i>";
                    $('#mensaje').html("<center><h5 id='mensaje' style='color:green; font-size:15px;'><i class='fa fa-check' style='font-size:15px;color:green; margin-bottom:15px;'></i> Datos ingresados correctamente</h5></center>").show(200).delay(2500).hide(200);
                    //alert("DATOS INGRESADOS EXITOSAMENTE");
                    cargarTabla();
                    $("#titulo").val('');
                    $("#descrip").val('');  
                }

            });
        }
    })


function done(id){//Función para establecer si una tarea está lista o no
    $.ajax({
        url: "sources/done_task.php", //ruta del php a ejecutar.
        type: "POST",
        dataType: 'text',
        data:{'id':id},
        success: function (guardar) {
            cargarTabla();//Se llama a la función que refresca la tabla luego de que finaliza la consulta
        }

    });
}


function eliminar(id){
    $('#RG').modal('show');//Se llama al modal que permitirá editar una tarea específica

    id1 = id;//Se le asigna a la variable global "id1" el valor del id de una tarea específica
 }


 function borrar(){//Función que se encarga de eliminar una tarea específica
    $.ajax({
        url: "sources/delete_task.php", //ruta del php a ejecutar.
        type: "POST",
        dataType: 'text',
        data:{'id1':id1},
        success: function (guardar) {
            cargarTabla();//Se llama a la función que refresca la tabla luego de que finaliza la consulta
        }

    });
 }


 function editar(id){//Función encargada de editar una tarea específica
     
     
    $.ajax({
        url: "sources/search_task.php", //ruta del php a ejecutar.
        type: "POST",
        dataType: 'text',
        data:{'id':id},
        success: function (guardar) {
            var objetos = JSON.parse(guardar); //Luego de hacer la consulta para buscar la tarea a editar con su id, se le asignan a los campos del modal los datos de la tarea
            $("#titulo2").val(objetos[0].nombre);
            $("#descrip2").val(objetos[0].descripcion);
            $('#RG2').modal('show');//Se muestra el modal para editar la tarea
            id1 = id;//Se le asigna a la variable global "id1" el valor del id actual para poder actualizar los datos
        }

    });
    

 }


 function update(){//Función encargada de actualizar los datos de una tarea específica luego de ser editados
    titulo = $("#titulo2").val(); //Se toman los valores de los campos de texto del modal para enviarse por Ajax a PHP
    descrip = $("#descrip2").val();
    $.ajax({
        url: "sources/update_task.php", //ruta del php a ejecutar.
        type: "POST",
        dataType: 'text',
        data:{'id1':id1, 'titulo':titulo, 'descrip':descrip},//Datos a enviar
        success: function (guardar) {
            cargarTabla();//Se llama a la función que refresca la tabla luego de que finaliza la consulta
        }

    });
 }


