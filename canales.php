<?php function canales ($username, $codig){
include("conexion.php");


/*Preparamos la consulta para introducir los canales de ejemplo*/
$sql2="INSERT INTO noticias (pais, nombre, categoria, link, usuario, descripcion) VALUES ('México','https://www.xataka.com','Magazine - ciencia-ficcion','https://www.xataka.com/categoria/ciencia-ficcion/rss2.xml', $codig,'Publicación de noticias sobre gadgets y tecnología. Últimas tecnologías en electrónica de consumo y novedades tecnológicas en móviles, tablets, informática, etc'),('España','https://aprendeaprogramar.tv','Aprende a Programar','https://aprendeaprogramar.tv/feed', $codig,'Aprende a Programar sin esfuerzo'),('España','http://www.danibarreno.com','Blog de Programación','http://www.danibarreno.com/feed/', $codig,'Mi aporte personal sobre el desarrollo web en entorno LAMP')";
    if ($ejecutar2=$conectar->query($sql2)){
        // echo $sql2." es correcta";
        $conectar->close();
        return true;
    
    } else {
        echo "No ha sido posible añadir canales de ejemplo";
    }
    
    
}