<?php
//conecta con la base de datos 
//el root no tiene contraseña
$conectar = new mysqli ("sql109.260mb.net","n260m_22036691", "NEWSMAKE","n260m_22036691_newsmakers");

if ($conectar->connect_errno) {
    trigger_error("Fallo en la conexión con MySQL, tipo de error= ($conexion->connect_error())");
}
$conectar->set_charset('utf8');
?>

	