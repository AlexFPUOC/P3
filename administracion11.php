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
	echo "<p style='text-align: center; padding-top: 50px;'>Nombre de usuario registrado, introduzca otro. <a href='administracion1.php'>Volver</a></p>";
}else{

	mysqli_query($conectar, $actualizar);
	
	echo "<p style='text-align: center; padding-top: 50px;'>Datos actualizados correctamente. <a href='administracion1.php'>Volver</a></p>";
}
mysqli_close($conectar);
}


if(isset($_POST['baja'])){

include("conexion.php");
	
$nombre_sesion=$_SESSION['nombre_usuario'];
$borrar="DELETE FROM usuario WHERE nombre_usuario='$nombre_sesion'";


$ejecutar=mysqli_query($conectar, $borrar);	

mysqli_close($conectar);

if(!$borrar){
	echo "Error ocurrido al eliminar datos en el sistema. Contacte con el administrador.";
}else{
	echo "<p style='text-align: center; padding-top: 50px;'>Datos eliminados correctamente. <a href='index.html'>Volver</a></p>";

	
}

	
}