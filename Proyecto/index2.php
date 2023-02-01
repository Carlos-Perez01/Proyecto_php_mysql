<?php
include("".$_SERVER['DOCUMENT_ROOT']."/carlosjoseperezrodrigues/proyecto/common/mysql.php");
$conn=conectarse($config);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <title>Register</title>
</head>
<body>
    <div class="login-card-container">
        <div class="login-card">
            <div class="login-card-logo">
                <img src="assets/avatar.png" alt="logo">
            </div>
            <div class="login-card-header">
                <h1>Registrarse</h1>
                <div>Registresé para utilizar la aplicación</div>
            </div>
            <form class="login-card-form" action="index2.php" method="post" enctype="multipart/form-data">
                <div class="form-item">
                <span class="form-item-icon material-symbols-rounded">person</span>
                    <input type="text" placeholder="Nombre" id="nombreForm" name="nombre" autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" placeholder="Contraseña" id="passwordForm" name="contra" required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">pin</span>
                    <input type="text" placeholder="Edad" id="edadForm" name="edad" required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">mail</span>
                    <input type="email" placeholder="Email" id="emailForm" name="email" required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">home_pin</span>
                    <input type="text" placeholder="Dirección" id="direccionForm" name="direccion" >
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">location_on</span>
                    <input type="text" placeholder="Localidad" id="localidadForm" name="localidad" >
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">call</span>
                    <input type="text" placeholder="Teléfono" id="telefonoForm" name="telefono" >
                </div>
                <div class="form-item">
                    <span class="form-item-icon-other material-symbols-rounded">image</span>
                    <input type="file" name="fotoperfil" >
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">storefront</span>
                    <input type="text" placeholder="Empresa" id="empresaForm" name="empresa" >
                </div>
                <button type="submit" name="registrarse">Registrarse</button>
                <a href="index.php">Volver</a>
            </form>
            <?php
            if (isset($_POST["registrarse"])){
                insertar_alumno($conn, $_POST["nombre"], $_POST["contra"],$_POST["edad"],$_POST["email"],$_POST["direccion"],$_POST["localidad"],$_POST["telefono"],$_FILES["fotoperfil"],$_POST["empresa"],$config);
                header("Location:index.php");
                exit;
            }
            ?>
        </div>
    </div>
</body>
</html>