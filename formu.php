<?php
#los datos a recibir
$nombre = $_POST['nombre'];
$password = $_POST['password'];
$genero = $_POST['genero'];
$email = $_POST['email'];
$materia = $_POST['materia'];
$telefono = $_POST['telefono'];

if( !empty($nombre) || !empty($password) || !empty($genero) || !empty($email) || !empty($materia) || !empty($telefono) ){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "estudiante";
}


?>