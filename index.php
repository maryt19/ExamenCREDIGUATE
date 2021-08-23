<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombres=(isset($_POST['txtNombres']))?$_POST['txtNombres']:"";
$txtApellidos=(isset($_POST['txtApellidos']))?$_POST['txtApellidos']:"";
$txtDireccion=(isset($_POST['txtDireccion']))?$_POST['txtDireccion']:"";
$txtTelefono=(isset($_POST['txtTelefono']))?$_POST['txtTelefono']:"";
$txtCorreo=(isset($_POST['txtCorreo']))?$_POST['txtCorreo']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$mostrarModal="false";

include("../conexión/conexion1.php");

switch ($accion){
	case "btn1Agregar":

			$sentencia=$pdo->prepare("INSERT INTO clientes(nombres,apellidos,direccion,telefono,correo) VALUES(:nombres,:apellidos,:direccion,:telefono,:correo)");

			$sentencia->bindParam(':nombres',$txtNombres);
			$sentencia->bindParam(':apellidos',$txtApellidos);
			$sentencia->bindParam(':direccion',$txtDireccion);
			$sentencia->bindParam(':telefono',$txtTelefono);
			$sentencia->bindParam(':correo',$txtCorreo);
			$sentencia->execute();

		//echo "Presinaste agregar";
	break;

	case "btn2Modificar":

		$sentencia=$pdo->prepare("UPDATE clientes SET 
		nombres=:nombres,
		apellidos=:apellidos,
		direccion=:direccion,
		telefono=:telefono,
		correo=:correo WHERE
		id=:id");

			$sentencia->bindParam(':nombres',$txtNombres);
			$sentencia->bindParam(':apellidos',$txtApellidos);
			$sentencia->bindParam(':direccion',$txtDireccion);
			$sentencia->bindParam(':telefono',$txtTelefono);
			$sentencia->bindParam(':correo',$txtCorreo);
			$sentencia->bindParam(':id',$txtID);
			$sentencia->execute();

			header ('Location: index.php');

		//echo "Presinaste modificar";
	break;

	case "btn3Eliminar":

		$sentencia=$pdo->prepare("DELETE FROM clientes WHERE
		id=:id");

			$sentencia->bindParam(':id',$txtID);
			$sentencia->execute();

			header ('Location: index.php');
		
	//echo "Presinaste eliminar";
	break;

	case "btn4Cancelar":
		header('Location: index.php');	
	break;

	case "Seleccionar":
		$mostrarModal=true;	
	break;

}

	$sentencia=$pdo->prepare("SELECT * FROM clientes");
	$sentencia->execute();
	$listaUsuarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

	//print_r($listaUsuarios);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evaluación CREDIGUATE</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
				}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>
<body>

	<div id="app"> </div>
	<script src="index.js" type="module"></script>		


	<div class="container">


		<!--<script type="text/javascript">
				function validar(){
					var form=document.form;

					if(form.txtNombres.value==0){
						alert("El campo nombre esta vacio");
						form.txtNombres.value="";
						form.txtNombres.focus();
						return false;
						}	
				}
	</script>-->

		<form action="" method="post" enctype="multipart/form-data">

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-row">	

      	<input type="hidden" required name="txtID" value="<?php echo $txtID; ?>" placeholder="" id="txtID" required="" >
		<br>	

		<label for="">Nombres:</label>
		<input type="text" class="form-control" name="txtNombres" required value="<?php echo $txtNombres; ?>" placeholder="" id="txtNombres" required="" >
		<br>

		<label for="">Apellidos:</label>
		<input type="text" class="form-control" name="txtApellidos" required value="<?php echo $txtApellidos; ?>" placeholder="" id="txtApellidos" required="" >
		<br>

		<label for="">Dirección:</label>
		<input type="text" class="form-control" name="txtDireccion" required value="<?php echo $txtDireccion; ?>" placeholder="" id="txtDireccion" required="" >
		<br>

		<label for="">Teléfono:</label>
		<input type="text" class="form-control" name="txtTelefono" required value="<?php echo $txtTelefono; ?>" placeholder="" id="txtTelefono" required="" >
		<br>

		<label for="">Correo:</label>
		<input type="email" class="form-control" name="txtCorreo" required value="<?php echo $txtCorreo; ?>" placeholder="" id="txtCorreo" required="" >
		<br>
      
      </div>  
      </div>
      <div class="modal-footer">

		<button value="btn1Agregar" class="btn btn-success" type="submit" name="accion">Agregar</button>
		<button value="btn2Modificar" class="btn btn-warning" type="submit" name="accion">Modificar</button>
		<button value="btn3Eliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button>
		<button value="btn4Cancelar" class="btn btn-primary" type="submit" name="accion">Cancelar</button>


      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 	Agregar Registro+
</button>


		</form>
<script src="validar.js"></script>

<div class="row">
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Dirección</th>
				<th>Teléfono</th>
				<th>Correo</th>
			</tr>
		</thead>	

<?php foreach ($listaUsuarios as $usuario){ ?>
	<tr>
		<td><?php echo $usuario['id'];?></td>
		<td><?php echo $usuario['nombres'];?></td>
		<td><?php echo $usuario['apellidos'];?></td>
		<td><?php echo $usuario['direccion'];?></td>
		<td><?php echo $usuario['telefono'];?></td>
		<td><?php echo $usuario['correo'];?></td>
		<td>

		<form action="" method="post">
		<input type="hidden" name="txtID" value="<?php echo $usuario['id'];?>" >
		<input type="hidden" name="txtNombres" value="<?php echo $usuario['nombres'];?>" >
		<input type="hidden" name="txtApellidos" value="<?php echo $usuario['apellidos'];?>" >
		<input type="hidden" name="txtDireccion"value="<?php echo $usuario['direccion'];?>" >
		<input type="hidden" name="txtTelefono"value="<?php echo $usuario['telefono'];?>" >
		<input type="hidden" name="txtCorreo"value="<?php echo $usuario['correo'];?>" >		
		<input type="submit" value="Seleccionar" name="accion">
		<button value="btn3Eliminar" type="submit" name="accion">Eliminar</button>
	</form>

	 </td>
	</tr>

<?php } ?>

	</table>

</div>

<?php if($mostrarModal){?>
	<script>
	 $('#exampleModal').modal('show') 
	</script>

<?php } ?>

	</div>
</body>
</html>