<?php
function consultar($query)
{
	$host = 'localhost'; //Escribir el host
	$user = 'root'; //Escribir el usuario
	$password = ''; //Escribir el password
	$database = 'kaisen'; //Escribir el nombre de la base de datos
	$result = null; //No tocar, es el valor devuelto en caso de no encontrar datos

	$link = mysqli_connect($host, $user, $password) or die('No se pudo conectar: ' . mysqli_error());

	mysqli_select_db($link, $database) or die('No se pudo seleccionar la base de datos');

	//$tildes = $link->query("SET NAMES 'utf8'");
	$response = mysqli_query($link, $query);
	$c = 0;

	if ($response === true)
	{
		//echo "El valor es true, no hay datos para devolver";
	}
	else
	{
		while($row = mysqli_fetch_assoc($response))
		{
			$result[$c] = $row;
			$c++;
		}

		return($result);
	}

	mysqli_close($link);
}
?>

/* FORMA DE USO
	require("conexion.php");
	$consulta = "SELECT * FROM `aseguramiento` WHERE 1";
	$resultado = consultar($consulta);

  var_dump($resultado);
*/

?>
