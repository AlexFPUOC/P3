<?php include("conexion.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NewsMakers</title>
  
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <link rel="stylesheet" type="text/css" href="css/fonts.css" />
  <link rel="stylesheet" type="text/css" href="css/estilos.css" />
  <link rel="stylesheet" type="text/css" href="css/estilos_administracion2.css" />


</head>
<body>

<header>
	<div class="logoNewsmakers">	
	</div>	
	<div class="tituloNewsmakers">
		<div class="divTitulo">
			<h1>NEWSMAKERS</h1>
		</div>
	</div>
	<div class="tituloWeCollectNews">	
		<div class="divTitulo">
			<h1>WE COLLECT NEWS </h1>
		</div>
	</div>
	<div id="barrasuperior1">&nbsp;</div>
	<div id="barrasuperior2">&nbsp;</div>
	<div id="barrasuperior3">&nbsp;</div>
	<div id="barrasuperior4">&nbsp;</div>
	
</header>
<br>
<div id="barrasuperior5">&nbsp;</div>

<div id="menu">	  
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
		<ul class="nav navbar-nav" >
		  <li><a href="index.html">Presentación</a></li>
		  <li><a href="registro.html">Inicio</a></li>
		  <li><a href="panel.php">Noticias</a></li>
		  <li class="active"><a href="administracion1.php">Administración</a></li>
		</ul>
		<a href="login.html" class="btn btn-success navbar-btn" style="float:right" role="button">Login</a>
          <a href="cerrar.php" class="btn btn-danger navbar-btn" style="float:right" role="button">Logout</a>
	  </div>
	</nav>
</div>
<section>
<div id="inicio">
	
	<div class="formulario_administracion2">
		<h3>AÑADE RSS</h3>
			
				<form action="mas_rss.php" method="post">
					URL RSS&nbsp;&nbsp;&nbsp;<input type="text" name="rss1" style="text-align: center; width: 60%; margin: 0px auto;border-radius: 10px 10px 10px 10px;moz-border-radius: 10px 10px 10px 10px;webkit-border-radius:10px 10px 10px 10px;border: 1px solid #000000;">
					<input type="reset" class="btn btn-warning" value="Limpiar" name="borrar" style="margin-top: 9%;float: left">
					<input type="submit" class="btn btn-success navbar-btn" value="Añadir" name="mas" style="margin-top: 9%; margin-right: 4%; float: right">

				</form>
		
			
	</div>
	
	<div class="formulario_administracion2">
			<h3>ELIMINA RSS</h3>
		
			<form action="menos_rss.php" method="post">
					SELECCIONA RSS&nbsp;&nbsp;&nbsp;<select name="rss2" style="text-align: center; width: 60%; margin: 0px auto;border-radius: 10px 10px 10px 10px;moz-border-radius: 10px 10px 10px 10px;webkit-border-radius:10px 10px 10px 10px;border: 1px solid #000000;">
                <option value="" selected>Seleccione el canal que desee eliminar</option>
                <?php 
		$nombre_sesion=$_SESSION['nombre_usuario'];
		$querycanales="SELECT DISTINCT link FROM noticias WHERE noticias.usuario = (SELECT codigo FROM usuario WHERE nombre_usuario='$nombre_sesion')";
                $conectcanales=$conectar->prepare($querycanales);
                $conectcanales->execute();
                $conectcanales->bind_result($canales2);
                while ($conectcanales->fetch()) {
                ?>
                <option value="<?php echo $canales2?>"><?php echo $canales2?></option><?php
                } ?>
                </select>
					<input type="reset" class="btn btn-warning" value="Limpiar" name="cancelar" style="margin-top: 9%;float: left">
					<input type="submit" class="btn btn-success navbar-btn" value="Eliminar" name="eliminar" style="margin-top: 9%; margin-right: 4%; float: right">

				</form>
			
	</div>
	
	<a href="administracion1.php" class="btn btn-danger" style="float:center" role="button">Atrás</a>

	
</div>
</section>
  <div class="row"></div>
  
  <!--footer-->
  <section id="footer">
    <div class="col-sm-1">
		<div class="logoNewsmakers_gris">
		<div class="direccion_footer">
			<p>Tuset 3, Moià 1, 3ª planta 08006 Barcelona<br>(+34)934 969 200<br>contacto@newsmakers.com</p>	
		</div>		
		</div>
	</div>
  </section>
    

    <div style="display: none;"></div>
<!-- </footer> -->
</body>
</html>
