<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos de empleados</title>

	<link href="css/style_general.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include("nav.php");?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Datos del empleados &raquo; Editar datos</h2>
			<hr />
			
			<?php
			
			$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
			$sql = mysqli_query($con, "SELECT * FROM empleados WHERE codigo='$nik'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$codigo		     		= mysqli_real_escape_string($con,(strip_tags($_POST["codigo"],ENT_QUOTES)));//Escanpando caracteres
				$tipo_codigo			= mysqli_real_escape_string($con,(strip_tags($_POST["tipo_codigo"],ENT_QUOTES)));//Escanpando caracteres 
				$nombres		     	= mysqli_real_escape_string($con,(strip_tags($_POST["nombres"],ENT_QUOTES)));//Escanpando caracteres 
				$lugar_nacimiento	 	= mysqli_real_escape_string($con,(strip_tags($_POST["lugar_nacimiento"],ENT_QUOTES)));//Escanpando caracteres 
				$fecha_nacimiento	 	= mysqli_real_escape_string($con,(strip_tags($_POST["fecha_nacimiento"],ENT_QUOTES)));//Escanpando caracteres 
				$direccion	     		= mysqli_real_escape_string($con,(strip_tags($_POST["direccion"],ENT_QUOTES)));//Escanpando caracteres 
				$telefono				= mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));//Escanpando caracteres
				$email					= mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));//Escanpando caracteres 
				$user		 			= mysqli_real_escape_string($con,(strip_tags($_POST["user"],ENT_QUOTES)));//Escanpando caracteres 
				$puesto					= mysqli_real_escape_string($con,(strip_tags($_POST["puesto"],ENT_QUOTES)));//Escanpando caracteres 
				$jefe		 			= mysqli_real_escape_string($con,(strip_tags($_POST["jefe"],ENT_QUOTES)));//Escanpando caracteres 
				$estado			 		= mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));//Escanpando caracteres
				
				$update = mysqli_query($con, "UPDATE empleados SET tipo_codigo='$tipo_codigo', nombres='$nombres', lugar_nacimiento='$lugar_nacimiento', fecha_nacimiento='$fecha_nacimiento', direccion='$direccion', telefono='$telefono', email='$email', user='$user', puesto='$puesto', jefe='$jefe', estado='$estado' WHERE codigo='$nik'") or die(mysqli_error());
				if($update){
					header("Location: edit.php?nik=".$nik."&pesan=sukses");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Tipo de documento</label>
					<div class="col-sm-3">
						<select name="tipo_codigo" class="form-control">
                            <option value="Cedula">Cedula</option>
							<option value="TI">Tarjeta de indentidad</option>
							<option value="Cedula extranjera">Cedula de extranjeria</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Número de Documento</label>
					<div class="col-sm-2">
						<input type="text" name="codigo" value="<?php echo $row ['codigo']; ?>" class="form-control" placeholder="NIK" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Nombres</label>
					<div class="col-sm-4">
						<input type="text" name="nombres" value="<?php echo $row ['nombres']; ?>" class="form-control" placeholder="Nombres" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Lugar de nacimiento</label>
					<div class="col-sm-4">
						<input type="text" name="lugar_nacimiento" value="<?php echo $row ['lugar_nacimiento']; ?>" class="form-control" placeholder="Lugar de nacimiento" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Fecha de nacimiento</label>
					<div class="col-sm-4">
						<input type="text" name="fecha_nacimiento" value="<?php echo $row ['fecha_nacimiento']; ?>" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Dirección</label>
					<div class="col-sm-3">
						<textarea name="direccion" class="form-control" placeholder="Dirección"><?php echo $row ['direccion']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Teléfono</label>
					<div class="col-sm-3">
						<input type="text" name="telefono" value="<?php echo $row ['telefono']; ?>" class="form-control" placeholder="Teléfono" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Email</label>
					<div class="col-sm-3">
						<input type="text" name="email" value="<?php echo $row ['email']; ?>" class="form-control" placeholder="Teléfono" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Usuario</label>
					<div class="col-sm-3">
						<input type="text" name="user" value="<?php echo $row ['user']; ?>" class="form-control" placeholder="Teléfono" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Rol</label>
					<div class="col-sm-3">
						<select name="puesto" class="form-control">
                            <option value="Gerente" <?php if ($row ['puesto']=='Gerente'){echo "selected";} ?>>Gerente</option>
							<option value="Cordinador" <?php if ($row ['puesto']=='Cordinador'){echo "selected";} ?>>Cordinador</option>
							<option value="Jefe de Area" <?php if ($row ['puesto']=='Jefe de Area'){echo "selected";} ?>>Jefe de Area</option>
							<option value="Operario" <?php if ($row ['puesto']=='Operario'){echo "selected";} ?>>Operario</option>
						</select> 
					</div>
                </div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Asignar Jefe</label>
					<div class="col-sm-3">
						<select name="jefe" class="form-control">
							<option value="Empresa" <?php if ($row ['jefe']=='Empresa'){echo "selected";} ?>>Empresa</option>
                            <option value="Jefe Programacion" <?php if ($row ['jefe']=='Jefe Programacion'){echo "selected";} ?>>Jefe Programación</option>
							<option value="Jefe de Produccion" <?php if ($row ['jefe']=='Jefe de Produccion'){echo "selected";} ?>>Jefe de Produccion</option>
							<option value="Jefe de Recursos Humanos" <?php if ($row ['jefe']=='Jefe de Recursos Humanos'){echo "selected";} ?>>Jefe de Recursos Humanos</option>
							<option value="Jefe Contabilidad" <?php if ($row ['jefe']=='Jefe Contabilidad'){echo "selected";} ?>>Jefe Contabilidad</option>
						</select> 
					</div>
                </div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Estado</label>
					<div class="col-sm-3">
						<select name="estado" class="form-control">
							<option value="">- Selecciona estado -</option>
                            <option value="1" <?php if ($row ['estado']==1){echo "selected";} ?>>Fijo</option>
							<option value="2" <?php if ($row ['estado']==2){echo "selected";} ?>>Contrado</option>
							<option value="3" <?php if ($row ['estado']==3){echo "selected";} ?>>Outsourcing</option>
						</select> 
					</div>
                </div>
			
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
						<a href="edit_password.php?nik=<?php echo $row['codigo']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Cambiar contraseña</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'dd-mm-yyyy',
	})
	</script>
</body>
</html>