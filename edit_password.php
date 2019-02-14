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
			<h2>Datos del empleados &raquo; Cambiar Contraseña</h2>
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
                $pass_antiguo = mysqli_real_escape_string($con,(strip_tags($_POST["pass_antiguo"],ENT_QUOTES)));//Escanpando caracteres
                $pass_nuevo = mysqli_real_escape_string($con,(strip_tags($_POST["pass_nuevo"],ENT_QUOTES)));//Escanpando caracteres
                $pass_repetir = mysqli_real_escape_string($con,(strip_tags($_POST["pass_repetir"],ENT_QUOTES)));//Escanpando caracteres
                
                $passHash = password_hash($pass_nuevo, PASSWORD_BCRYPT);

                $hash = $row['pass'];

                if (password_verify($pass_antiguo, $hash)) {
                    if (strcmp($pass_nuevo, $pass_repetir) == 0) {
                        $update = mysqli_query($con, "UPDATE empleados SET pass='$passHash' WHERE codigo='$nik'") or die(mysqli_error());
                        if($update){
                            header("Location: edit.php?nik=".$nik."&pesan=sukses");
                        } else {
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
                        }
                    } else {
                        echo 'Al repetir la contraseña no funciono.';
                    }
                } else {
                    echo 'La contraseña antigua no corresponde.';
                }
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Contraseña actual</label>
					<div class="col-sm-3">
						<input type="text" name="pass_antiguo" class="form-control" placeholder="Contraseña" required>
					</div>
				</div>

                <div class="form-group">
					<label class="col-sm-3 control-label">Contraseña nueva </label>
					<div class="col-sm-3">
						<input type="text" name="pass_nuevo" class="form-control" placeholder="Contraseña" required>
					</div>
				</div>

                <div class="form-group">
					<label class="col-sm-3 control-label">Repetir</label>
					<div class="col-sm-3">
						<input type="text" name="pass_repetir" class="form-control" placeholder="Contraseña" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Cambiar Contraseña">
						<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
</body>
</html>