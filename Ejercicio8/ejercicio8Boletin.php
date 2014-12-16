<!doctype html>
	<head>
		<title>Ejercicio 8 Boletin</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<?php
			session_start();
			$_SESSION['contador'] = 0;
		?>
		<h3>Formulario de registro</h3>
		<form name="formulario" action="estadisticasb.php?id=comienzo" method="post">
			<table>
				<tr>
					<td><label>Usuario:</label></td>
					<td><input type="text" name="usuario" id="usuario" /></td>
				</tr>
				<tr>
					<td><input type="submit" name="comenzar" value="Comenzar"/></td>
					<td><a href="resultado.php">Resultados</a></td>
				</tr>
			</table>
		</form>

	<a href="../<?php echo $_SESSION['ruta'][5]; ?>"><< Anterior</a><br />
	<a href="../index.php">Indice</a>
	</body>
</html>