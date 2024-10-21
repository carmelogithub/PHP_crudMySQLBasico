<?php
//new mysql es una extensión, conector, eliminado en PHP 7.0
//era la primera implementación de PHP para trabajar con MySQL
//no soporta PDO (PHP Data Objects) - para poder utilizar difernetes bases de datos
//no soporta transacciones
//no soporta consultas preparadas - Stored Procedures - SP - previene inyección SQL
$conexion=new mysql('localhost','root','','sesion3');
if($conexion->connect_error){
    die('Error de conexión: '.$conexion->connect_error);
}
$sql = "SELECT * FROM usuarios";
$resultado = $conexion->query($sql);

echo '<table border=1>';
if($resultado->num_rows>0){//fetch_assoc solo por nombre de columna
    while($fila=$resultado->fetch_array()){//fetch_array permite por posición o nombre de columne
        echo '<tr>';
        echo '<td>Nombre: '.$fila[1].'</td><td>Correo: '.$fila['correo'].'</td>';
        echo '</tr>';
    }
}else{
    echo 'No hay datos';
}