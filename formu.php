<?php
#los datos a recibir

$nombre = $_POST['nombre'];
$password = $_POST['password'];
$genero = $_POST['genero'];
$email = $_POST['email'];
$materia = $_POST['materia'];
$telefono = $_POST['telefono'];

if( !empty($nombre) || !empty($password) || !empty($genero) || !empty($email) || !empty($materia) || !empty($telefono) ){
    $host = "localhost:3307";#apuntamos al puerto de la base de datos
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "estudiante";

    #enlazamos conexion con los atributos y representados con conn
    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
    else{
        #sentencias preparadas 
        $SELECT = "SELECT telefono from usuario where telefono = ? limit 1";#DATO QUE NO SE VA A REPETIR -> en caso del dormulario seria el correo
        $INSERT = "INSERT INTO usuario(nombre,password,genero,email,materia,telefono) values(?,?,?,?,?,?) ";

        $stmt = $conn->prepare($SELECT);#stmt identificador 
        $stmt ->bind_param("i" ,$telefono);
        $stmt ->execute();
        $stmt ->bind_result($telefono);
        $stmt ->store_result();
        $rnum = $stmt->num_rows;
        if($rnum == 0){
            $stmt ->close();
            $stmt = $conn->prepare($INSERT);
            $stmt ->bind_param("sssssi" ,$nombre,$password,$genero,$email,$materia,$telefono);
            $stmt ->execute();
            echo "REGISTRO COMPLETADO.";
        }
        else {
            echo "alguien registro ese numero.";

        }
        $stmt->close();
        $conn->close();


    }

}
else{
    echo "todos los datos son OBLIGARTORIOS";
    die();
}

?>