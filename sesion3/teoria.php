<?php
/*array de usuarios para insertar en la tabla de usuarios*/
$usuarios=[
    ['nombre'=>'Andres','email'=>'juan@hotmail.com'],
    ['nombre'=>'Pedro','email'=>'marta@hotmail.com'],
    ['nombre'=>'Sofía','email'=>'laura@hotmail.com'],
    ['nombre'=>'Julia','email'=>'luis@hotmail.com'],
    ];

$conexion = new mysqli('localhost','root','','sesion3');//mysqli improvement
if($conexion->connect_error){
    die('Error de conexión: '.$conexion->connect_error);
}
//print_r($conexion);

/*preparar los datos con implode para insertar en la tabla de usuarios*/
$valores=[];

foreach($usuarios as $usuario){
    $nombre = $conexion->real_escape_string($usuario['nombre']);
    $email = $usuario['email'];
    $valores[]="('$nombre','$email')";
    
}

$valoresImplode = implode(',',$valores);
$sql = "INSERT INTO usuarios (nombre,correo) VALUES $valoresImplode";
    if($conexion->query($sql)===TRUE){
        echo 'Datos insertados correctamente';
    }else{
        echo 'Error al insertar los datos: '.$conexion->error;
    }
$conexion->close();