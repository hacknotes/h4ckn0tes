<?php
    include ("conexion.php");
    if (isset($_POST['send'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        $insert = "INSERT INTO datos (id,nombre,password,dirrecion,telefono)
        VALUES ('$id','$name','$password','$address','$phone')";
    
        if (mysqli_query($conn,$insert)){
            $_SESSION['message'] = 'Registro guardado exitosamente';
            $_SESSION['message_type'] = 'success';
            header('Location:index.php');
        }else{
        echo "El registro no se pudo guardar". mysqli_error($conn);
        }         #Devuelve una cadena que describe el último error
    }
?>
