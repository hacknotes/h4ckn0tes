<?php  
    session_start(); #Inicia una secion o reanuda una exixtente
    $servername = "localhost";   #Localhost o IP
    $username = "sqluser";          #Usuario de la dB
    $password = "password123";   #Contraseña de la dB
    $database = "sistema";       #Nombre de la db
    $port = "3306";              #puerto por el que se conecta la dB
    $conn = mysqli_connect($servername, $username, $password, $database, $port);
        if (!$conn) {
        die("Conexion no establecida: " . mysqli_connect_error());
        }
        #mysqli_connect_error()
        #devuelve una cadena con la descripcion del ultimo error de conexión
?>
