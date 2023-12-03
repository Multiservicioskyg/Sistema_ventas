<?php
require '../config/Conexion.php';
require '../public/phpqrcode/phpqrcode/qrlib.php';


$codigosqr = mysqli_query ($conexion, "SELECT v.idventa, v.idcliente, p.nombre AS cliente,
 p.direccion, p.tipo_documento, p.num_documento, p.email, p.telefono, v.idusuario, u.nombre 
 AS usuario, v.tipo_comprobante, v.serie_comprobante, v.num_comprobante, DATE(v.fecha_hora) 
 AS fecha, v.impuesto, v.total_venta FROM venta v INNER JOIN persona p ON v.idcliente=p.idpersona
  INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE v.idventa=idventa");
$response = array();

$directorio = '';

//*Si no existe la carpeta *//

$filename = $directorio.'test.png';


//*El bucle y el envio del correo *//

while ($row = mysqli_fetch_array($codigosqr))
{

$filename = $directorio. "".$row['idventa'].'.png';

$archivo = $filename;

$contenido = "No° Factura: {$row['num_comprobante']}, Fecha de Emisión: {$row['fecha']},Direccion: {$row['direccion']} 
Vendedor/a:{$row['idcliente']}, Su Codigo Cliente:{$row['idcliente']},
 Impuesto: {$row['impuesto']}, Venta total: {$row['total_venta']}";

QRCode::png($contenido, $filename);

echo '<img src ="'.$directorio.basename($filename).'"/><hr/>';

echo $archivo;

$response = array();



}

?>
