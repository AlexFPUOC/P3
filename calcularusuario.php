<?php function codigo ($username) {
include ("conexion.php");
$querycodig="SELECT codigo FROM usuario WHERE nombre_usuario='$username'";
$consulta=$conectar->prepare($querycodig);
$consulta->execute();
$consulta->bind_result($codig);
$consulta->fetch();
$consulta->close();
return $codig;
}
?>