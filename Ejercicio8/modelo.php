<?php
	include_once("conexion.inc.php");
	
	function selectResultadoB(){
		global $conexion;
		return mysql_query("SELECT * FROM jugador ORDER BY aciertos DESC, fallos ASC, tiempo ASC", $conexion) or die (mysql_error());
	}
	
	function selectComienzo(){
		global $conexion;
		return mysql_query("SELECT * FROM jugador WHERE usuario = '".$_SESSION['usuario']."'",$conexion)or die (mysql_error());
	}
	
	function insertPregunta($num){
		global $conexion;
		return  mysql_query("INSERT INTO tiempo (usuario,pregunta,tiempo) VALUES ('".$_SESSION['usuario']."',".$num.",'".$_SESSION['contesta1']."')",$conexion);
	}
	
	function insertPregunta4(){
		global $conexion;
		global $tiempo;
		return mysql_query("INSERT INTO jugador (usuario,aciertos,fallos,tiempo) VALUES ('".$_SESSION['usuario']."',".$_SESSION['aciertos'].",".$_SESSION['fallos'].",".$tiempo.")",$conexion);
	}
	
?>