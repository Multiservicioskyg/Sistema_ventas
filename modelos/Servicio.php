<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Servicio{

	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar registro
public function insertar($idcategoria,$codigo,$nombre,$descripcion,$imagen){
	$sql="INSERT INTO servicio (idcategoria,codigo,nombre,descripcion,imagen,condicion)
	 VALUES ('$idcategoria','$codigo','$nombre','$descripcion','$imagen','1')";
	return ejecutarConsulta($sql);
}

public function editar($idservicio,$idcategoria,$codigo,$nombre,$descripcion,$imagen){
	$sql="UPDATE servicio SET idcategoria='$idcategoria',codigo='$codigo', nombre='$nombre',
	descripcion='$descripcion',imagen='$imagen' 
	WHERE idservicio='$idservicio'";
	return ejecutarConsulta($sql);
}
public function desactivar($idservicio){
	$sql="UPDATE servicio SET condicion='0' WHERE idservicio='$idservicio'";
	return ejecutarConsulta($sql);
}
public function activar($idservicio){
	$sql="UPDATE servicio SET condicion='1' WHERE idservicio='$idservicio'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idservicio){
	$sql="SELECT * FROM servicio WHERE idservicio='$idservicio'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros
public function listar(){
	$sql="SELECT a.idservicio,a.idcategoria,c.nombre as 
	categoria,a.codigo, a.nombre,a.descripcion,a.imagen,a.condicion FROM servicio
	 a INNER JOIN Categoria c ON a.idcategoria=c.idcategoria";
	return ejecutarConsulta($sql);
}

//listar registros activos
public function listarActivos(){
	$sql="SELECT a.idservicio,a.idcategoria,c.nombre as 
	categoria,a.codigo, a.nombre,a.descripcion,a.imagen,a.condicion FROM servicio a 
	INNER JOIN Categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
	return ejecutarConsulta($sql);
}

//implementar un metodo para listar los activos
public function listarActivosVenta(){
	$sql="SELECT a.idservicio,a.idcategoria,c.nombre as 
	categoria,a.codigo, a.nombre,a.descripcion,a.imagen FROM servicio a 
	INNER JOIN Categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
	/*$sql="SELECT a.idservicio,a.idcategoria,c.nombre as categoria,a.codigo, a.nombre,
	(SELECT precio_venta FROM detalle_ingreso 
	WHERE idservicio=a.idservicio ORDER BY iddetalle_ingreso DESC LIMIT 0,1) 
	AS precio_venta,a.descripcion,a.imagen,a.condicion FROM servicio a 
	INNER JOIN Categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";*/
	return ejecutarConsulta($sql);
}
}
 ?>
