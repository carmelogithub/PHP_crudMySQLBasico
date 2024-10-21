<?php
$conexion=new mysqli('localhost','root','','sesion3');//mysql improvement
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