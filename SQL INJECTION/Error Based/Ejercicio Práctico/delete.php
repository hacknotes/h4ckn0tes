<?php
    include ("conexion.php");
    if (isset($_GET['id'])){    
        $id = $_GET['id'];
        
        $delete = "DELETE FROM datos WHERE id = $id";

        if (mysqli_query($conn, $delete)){
            $_SESSION['message'] = 'Registro borrado exitosamente';
            $_SESSION['message_type'] = 'danger';
            header('Location:index.php');
        }else{
            echo "Error al borrar registro: " . mysqli_error($conn);
        }
    }
?>
