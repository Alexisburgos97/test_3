<?php 

include('header.php');
include_once("db_connect.php");
?>
<?php include('container.php');?>

<div class="container">

	<div class="row well alert alert-success">		
		<?php
		if (isset($_POST['submit'])) {	

			$nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
			$telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$pais = mysqli_real_escape_string($conn, $_POST['pais']);
			
			if( isset ($pais) && $pais == "España"){
				if( mysqli_query($conn, "INSERT INTO user(nombre, telefono, email) VALUES('".$nombre."', '" . $telefono . "', '". $email."')") ) {
					header('Location: gracias_es.php');
				} else {
					echo "Error en el registro, por favor intente mas tarde.";
				}
			}else if( isset ($pais) && $pais == "Peru"){
				if( mysqli_query($conn, "INSERT INTO user(nombre, telefono, email) VALUES('".$nombre."', '" . $telefono . "', '". $email."')") ) {
					header('Location: gracias_pe.php');
				} else {
					echo "Error en el registro, por favor intente mas tarde.";
				}
			}if( isset ($pais) && $pais == "Mexico" || $pais == "México"){
				if( mysqli_query($conn, "INSERT INTO user(nombre, telefono, email) VALUES('".$nombre."', '" . $telefono . "', '". $email."')") ) {
					header('Location: gracias_mx.php');
				} else {
					echo "Error en el registro, por favor intente mas tarde.";
				}
			}else{
				if( mysqli_query($conn, "INSERT INTO user(nombre, telefono, email) VALUES('".$nombre."', '" . $telefono . "', '". $email."')") ) {
					echo 'Registro Sastifactorio!';
					echo '<a href="index.php" class="btn btn-primary" style="margin-left:20px;">Volver</a>';
				} else {
					echo "Error en el registro, por favor intente mas tarde.";
				}
			}

		}	
		?>	
	</div>

</div>	

<?php include('footer.php');?> 