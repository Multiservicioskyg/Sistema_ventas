<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Herramienta{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar registro
public function insertar($codigo,$nombre,$stock,$descripcion,$imagen){
	$sql="INSERT INTO herramienta (codigo,nombre,stock,descripcion,imagen,condicion)
	 VALUES ('$codigo','$nombre','$stock','$descripcion','$imagen','1')";
	 
	return ejecutarConsulta($sql);
}

public function editar($idherramienta,$codigo,$nombre,$stock,$descripcion,$imagen){
	$sql="UPDATE herramienta SET codigo='$codigo',nombre='$nombre',stock='$stock',descripcion='$descripcion',imagen='$imagen' 
	WHERE idherramienta='$idherramienta'";
	return ejecutarConsulta($sql);
}
public function desactivar($idherramienta){
	$sql="UPDATE herramienta SET condicion='0' WHERE idherramienta='$idherramienta'";
	return ejecutarConsulta($sql);
}
public function activar($idherramienta){
	$sql="UPDATE herramienta SET condicion='1' WHERE idherramienta='$idherramienta'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idherramienta){
	$sql="SELECT * FROM herramienta WHERE idherramienta='$idherramienta'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros 
public function listar(){
	$sql="SELECT * FROM herramienta";
	
	return ejecutarConsulta($sql);
}

//listar registros activos
public function listarActivos(){
	$sql="SELECT a.idherramienta,c.nombre as a.codigo, a.nombre,a.stock,a.descripcion,
	a.imagen,a.condicion FROM herramienta a WHERE a.condicion='1'";
	return ejecutarConsulta($sql);
}


}
 ?>
