<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SQL INJECTION</title>
    <!--Bootstrap 4-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>
        function validarform() {
            var x = document.forms["form"]["id"].value;
            if (x == "") {
                alert("El campo de id no puede ir vacio");
                return false;
            }
        }
    </script> <!--Validación del id en el fomrulario, si esta vacio retorna un alert-->
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-dark  bg-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand">Actualizar</a>
            </div>
        </nav>
        <?php
            include("conexion.php");
            if(isset($_GET['id'])){ #Determina si una variable está definida y no es NULL / isset
                $id = $_GET['id'];

                $query = "SELECT * FROM datos WHERE id = $id";
                $result = mysqli_query($conn, $query);
                #Obtiene el número de filas de un conjunto de resultados / mysqli_num_rows
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result);
                    #Obtiene una fila de resultados como un array asociativo, numérico, o ambos
                    $id = $row['id'];
                    $name = $row['nombre'];
                    $address = $row['direccion'];
                    $phone = $row['telefono'];
                }
            }
            if(isset($_POST['update'])){
                $id = $_GET['id'];
                $name = $_POST['name'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];

                $update = "UPDATE datos set nombre = '$name', direccion ='$address', telefono = '$phone' WHERE id = $id";
                mysqli_query($conn, $update);
                $_SESSION['message'] = 'Registro actualizado exitosamente';
                $_SESSION['message_type'] = 'info'; # Función de bootstrap
                header('Location:index.php');
            }
        ?>
        <div class="container p-4">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="card card-body">
                        <form name="form" action="update.php?id=<?php echo $_GET['id'];?>"
                            onsubmit="return validarform()" method="POST">
                            <div class="form-group">
                                Nombre<input type="text" name="name" value="<?php echo $name; ?>" class="form-control"
                                    class="form-control" placeholder="Actualiza Nombre" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                Dirección<input type="text" name="address" value="<?php echo $address; ?>"
                                    class="form-control" placeholder="Actualizar dirección" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                Teléfono<input type="text" name="phone" value="<?php echo $phone; ?>"
                                    class="form-control" placeholder="Actualizar teléfono" autocomplete="off" required>
                            </div>
                            <button class="btn btn-success btn-block" name="update">
                                Actualizar
                            </button>
                        </form>
                    </div> <!--End card-->
                </div> <!--End col-md-4-->
            </div> <!--End row-->
        </div> <!--End container -4-->
    </div><!--div class container-->
    <!--Scripts-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
</body>

</html>
