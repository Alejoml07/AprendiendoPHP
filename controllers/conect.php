<?php
$nombreServidor = 'localhost';
$nombreUsuario = 'root';
$clave = '';
$nombreBaseDatos = 'MiProyectoPHP';
//OBJETO DE LA CONEXION
$con = new mysqli($nombreServidor,$nombreUsuario,$clave,$nombreBaseDatos) ;
//CREAR LA CONDICION
if ($con->connect_error) {
    die('Conexion fallida...'.$con->connect_error);
}
//echo "Conexion Exitosa";
?>