<!doctype html>
	<head>
		<title>Resultado</title>
	</head>
	<body>
		<?php 
			include_once("conexion.inc.php");
			include_once("modelo.php");
			$sql = selectResultadoB();
		?>
			<h3>Tabla de resulados</h3>
			<table border="1">
				<tr>
					<th>Jugador</th>
					<th>Aciertos</th>
					<th>Fallos</th>
					<th>Tiempo</th>
				</tr>
		<?php
			while($res = mysql_fetch_array($sql)){
		?>
			<tr>
				<td><?php echo $res[0]; ?></td>
				<td><?php echo $res[1]; ?></td>
				<td><?php echo $res[2]; ?></td>
				<td><?php echo $res[3]; ?></td>
			</tr>
		<?php
			}                     
		?>
			</table><br/>
			<a href="ejercicio8Boletin.php">Volver</a>
	</body>
</html>