<?php include("conexion.php");
include("calcularusuario.php");
session_start();
//recogemos el dato del formulario
$enlace_rss= $_POST["rss1"];
$volver3="<br><a href='administracion2.html'>Volver</a>";
/* Comprobamos que hay sesión iniciada */
	try {
		if (isset($_SESSION['nombre_usuario']) && !empty($_SESSION['nombre_usuario'])) {
			/*Cogemos el usuario que realiza la gestión*/
				$nombre_usuario=$_SESSION['nombre_usuario'];
				/*Calculamos su id a partir de su usuario*/
				$codig=codigo($nombre_usuario);
				/*Revisamos que es un enlace RSS válido*/
			
			//comienza el TRY – CATCH para comprobar si el xml es correcto
			try {
				if ($canal=simplexml_load_file($enlace_rss)) {
					/* Comprobamos las variables xml */
					$pais=($canal->channel->language);
					
					if (empty($pais)) {
						$pais="No indicado";
					}
					
					$nombre=($canal->channel->link);
					$categoria=($canal->channel->title);
					$link=$enlace_rss;
					$usuario=$codig;
					$descripcion=($canal->channel->description);
					
					if (empty($descripcion)){
						$descripcion="No indicado";
					}
					
					$query="INSERT INTO noticias (pais, nombre, categoria, link, usuario, descripcion) VALUES ('$pais', '$nombre', '$categoria', '$link', $usuario, '$descripcion')";
					
					if ($ejecutarquery=$conectar->query($query)) {
						echo "<p>Canal añadido con éxito".$volver3;
					}
					
					//en caso de fallo en la query
					if (!$ejecutarquery){
						throw new Exception($mysqli->error);
					}
			
				}
				else {
						throw new Exception ('No ha sido posible grabar el canal en la base de datos, vuelva a introducirlo correctamente.'.$volver3, 1);
						// echo $query;
				}	
			}
			
			catch (Exception $e){
				echo "<br>".$e->getMessage();
			}
			
		}
		
		else{ 
                throw new Exception ('Error de acceso. Tiene que autenticarse previamente. <a href="login.html">Ir a registro</a>', 0);    
        }		
	}

    catch (Exception $e)
    {
        echo "<br>".$e->getMessage();
    }
        
?>