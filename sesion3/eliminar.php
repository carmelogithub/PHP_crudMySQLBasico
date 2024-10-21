<?php
$conexion=new mysqli('localhost','root','','sesion3');//mysql improvement
if($conexion->connect_error){
    die('Error de conexión: '.$conexion->connect_error);
}
$id_eliminar = $_GET['id'];//request de peticion GET
$sql = "DELETE FROM usuarios WHERE id=$id_eliminar";
if($conexion->query($sql)===TRUE){
    echo 'Datos eliminados correctamente';
}else{
    echo 'Error al eliminar los datos: '.$conexion->error;
}
$conexion->close();