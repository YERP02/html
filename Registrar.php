<?php 
    session_start();
    require 'C:\xampp\htdocs\Calzature\Conexion.php';

    $admin = 0;  // Inicializar la variable antes de la condición
    if (isset($_SESSION['Correo'])) {

        // Obtener información del usuario
        $Correo = $_SESSION['Correo'];
        $queryUsuario = "SELECT * FROM administrador WHERE Correo = '$Correo'";
        $queryUsuario2 = "SELECT * FROM usuarios WHERE Correo = '$Correo'";
        $resultUsuario = mysqli_query($con, $queryUsuario);
        $resultUsuario2 = mysqli_query($con, $queryUsuario2);

        if ($resultUsuario && mysqli_num_rows($resultUsuario) > 0) {
            $usuario = mysqli_fetch_assoc($resultUsuario);
            
            if ($usuario['Rol'] = 'admin') {
                $admin = 2;  
            }
            
        }elseif($resultUsuario2 && mysqli_num_rows($resultUsuario2) > 0){
            $usuario = mysqli_fetch_assoc($resultUsuario2);
            if ($usuario['Rol'] = 'user'){
                $admin = 1; 
                
            }
        }
        
    } else {
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ProyectoCSS.css"> -->
    <title>Calzature</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ProyectoCSS.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
                           integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
                           crossorigin="anonymous" referrerpolicy="no-refferer">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quattrocento:wght@700&display=swap" rel="stylesheet">
</head>
<body class="bodyReg">
    <div class="conte">
        <nav>
            <input type="checkbox" id="click">
            <label for="click" class="btn">
                <i class="fa-solid fa-bars"></i>
            </label>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="Productos.php">Productos</a></li>
                
                <?php
                if ($admin === 2) {
                    echo '<li><a href="Adminproductos.php">Editar Productos</a></li>';
                    echo '<li><a href="RegistrarAdmin.php">RegistrarAdmin</a></li>';
                    echo '<li><a href="Mostrar_Bitacoras.php">Bitacora</a></li>';
                    echo '<li><a href="Salir.php">Salir</a></li>';
                }if($admin === 1){
                    echo '<li><a href="Salir.php">Salir</a></li>';
                }else if($admin === 0){
                    echo '<li><a href="Registrar.php">Registrarme</a></li>';
                    echo '<li><a href="Login.php">Login</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
    <section id="RegistroSection">
        <h1 class="H1reg">Registro</h1>
        <form action="Registro.php" method="post">
            <div class="Datos">

                <input type="text" name="nombre" id="nombre" placeholder="Nombre"  >
                <input type="text" name="Apellido" id="Apellido" placeholder="Apellidos">
                <input type="number" name="Celular" id="Celular" placeholder="Celular">
                <label for="Nacimiento" id="Nacimiento" name="Nacimiento" id="FechaNa">Fecha De Nacimiento:</label>
                <input type="date" name="Nacimiento" id="Nacimiento" placeholder="Fecha de Nacimiento" id="FechaNa">
                <input type="text" name="Direccion" id="Direccion" placeholder="Direccion:">
                <input type="text" name="UsuarioR" id="UsuarioR" placeholder="Nombre de Usuario:">
                <input type="email" name="Correo" id="Correo" placeholder="Correo:">
                <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña:">    
    
            </div>
            <br>
            <div>
                <button type="submit">Registrar</button>
            </div>
        </form>
    </section>
    <div>
        <!-- <br>
        <a href="Bitacora_Usuarios.php"><button type="button">Trigger</button></a>
    </div> -->
    <br><br><br><br>

    <footer>
       <div style="text-align: center;">Yahir Emmanuel Ramirez Pulido</div>
        <div style="text-align: center;">4°p</div>
        <div style="text-align: center;">Desarrollo Web y Base de Datos</div>
    </footer>
</body>

</html>