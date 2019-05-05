<?php  
	
	require('sources/config.php');
	require('sources/db.php');

?>

<?php include('templates/header.php');?>
<div class="container" id="crud">
		<div class="row" >
			<!--FORM-->
			<div class="col-md-4">
				<div class="card">
					<div class="card-body" id="form">
						<!--FORMULARIO DONDE SE INGRESAN LOS DATOS DE LA TAREA-->
						
							<h3>NUEVA TAREA <i class="fas fa-clipboard-list" style='font-size:36px;color:#1167CD; margin-bottom:15px;'></i></h3>
							<center><h5 id="mensaje" style="color:red; font-size:15px;"></h5></center>
							<div class="form-group">
								<input type="text" name="title" id="titulo" placeholder="Título..." class="form-control" required>
							</div>

							<div class="form-group">
								<textarea name="description"  id="descrip"cols="80" class="form-control" placeholder="Descripción..." required></textarea>
						
							</div>

							<button type="submit" id="add" name="add" class="btn btn-primary btn-block">Añadir <i class="fas fa-clipboard-check"></i></button>
							<div id="div"></div>
							
													
					</div>
				</div>
			</div>

			<!--TABLA CON LA LISTA DE TAREAS-->
			<div class="col-md-8">
				<table class="table table-bordered table-hover" id="tabla">
					<thead>
					</thead>
					<tbody>
					</tbody>

				</table>
			</div>
</div>


<!-- Modal ELIMINAR -->
<div class="modal fade" id="RG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:black;">ELIMINAR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <h5 style="color:black;">¿DESEA ELIMINAR?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" onclick="borrar();" data-dismiss="modal" class="btn btn-primary">Sí</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal ELIMINAR -->
<!-- Modal EDITAR -->
<div class="modal fade" id="RG2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:black;">EDITAR TAREA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
							<div class="form-group">
								<h5 style="color:black; font-size:15px">Título</h5>
								<input type="text" name="title" id="titulo2" placeholder="Title..." class="form-control" required>
							</div>

							<div class="form-group">
								<h5 style="color:black; font-size:15px;">Descripción</h5>
								<textarea name="description"  id="descrip2"cols="80" class="form-control" placeholder="Description..." required></textarea>
						
							</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" onclick="update();" data-dismiss="modal" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal ELIMINAR -->
<?php include('templates/footer.php');?>	   