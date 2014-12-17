<?php
	$conexion = mysql_connect("localhost","root","");
	
	if(!$conexion){
		die("No se puede conectar con la BD".mysql_error());
	}
	
	$sql = "CREATE DATABASE IF NOT EXISTS juego";
	
	if(mysql_query($sql,$conexion)){
	
		mysql_select_db('juego',$conexion);
		$tabla = "CREATE TABLE IF NOT EXISTS jugador(
			usuario VARCHAR(100) NOT NULL,
			aciertos INT(1) NOT NULL,
			fallos INT(1) NOT NULL,
			tiempo INT(5) NOT NULL,
			PRIMARY KEY(`usuario`)
		)";
		
		mysql_query($tabla,$conexion);
		
		$tabla = "CREATE TABLE IF NOT EXISTS tiempo(
			usuario VARCHAR(100) NOT NULL,
			pregunta VARCHAR(100) NOT NULL,
			tiempo VARCHAR(100) NOT NULL
		)";
		
		mysql_query($tabla,$conexion);
		
		mysql_close($conexion);
		
	}
?>