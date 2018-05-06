<?php
session_start();



if(isset($_POST['confirmar'])){
	
	
include("conexion.php");

$nombre_sesion=$_SESSION['nombre_usuario'];

$email=$_POST['email'];
$usuario=$_POST['usuario'];
$password=$_POST['password'];
$actualizar="UPDATE usuario SET username='$email', nombre_usuario='$usuario', password='$password' WHERE nombre_usuario='$nombre_sesion'";

$sql="SELECT username FROM usuario WHERE username='$email'";
$resultado=mysqli_query($conectar, $sql);

$mostrar=mysqli_fetch_array($resultado);
	
if($mostrar['username']==$email){
	echo "<p style='text-align: center; padding-top: 50px;'>Nombre de usuario registrado, introduzca otro. <br><a href='administracion1.php'>Volver</a></p>";
}else{

	mysqli_query($conectar, $actualizar);
	
	echo "<p style='text-align: center; padding-top: 50px;'>Datos actualizados correctamente. <br><a href='administracion1.php'>Volver</a></p>";
}
mysqli_close($conectar);
}


if(isset($_POST['baja'])){

include("conexion.php");
	
$nombre_sesion=$_SESSION['nombre_usuario'];
$borrar="DELETE FROM usuario WHERE nombre_usuario='$nombre_sesion'";
$borrar2="DELETE FROM noticias WHERE usuario= (SELECT codigo FROM usuario WHERE nombre_usuario='$nombre_sesion')";

if (!$ejecutar2=mysqli_query($conectar, $borrar2)) {
    echo "Error ocurrido al eliminar datos de canales en el sistema. Contacte con el administrador.";
} else {
    echo "<p style='text-align: center; padding-top: 50px;'>Datos de canal eliminados correctamente.</p>";
     // mysqli_close($conectar);    
}
if(!$ejecutar=mysqli_query($conectar, $borrar)){
	echo "Error ocurrido al eliminar datos en el sistema. Contacte con el administrador.";
}else{
	echo "<p style='text-align: center; padding-top: 50px;'>Datos de usuario eliminados correctamente. <br><a href='cerrar.php'>Volver</a>";
    mysqli_close($conectar);
}

	
}
?>
