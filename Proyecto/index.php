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
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-card-logo">
                <img src="assets/avatar.png" alt="logo">
            </div>
            <div class="login-card-header">
                <h1>Iniciar Sesión</h1>
                <div>Inicie sesión para utilizar la aplicación</div>
            </div>
            <form class="login-card-form" action="index.php" method="post">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">person</span>
                    <input type="text" placeholder="Nombre" id="emailForm" name="alumno" autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" placeholder="Contraseña" id="passwordForm" name="contra" required>
                </div>
                <div class="form-item-other">
                    <div class="checkbox">
                        <input type="checkbox" id="rememberMeCheckbox" name="recordar" checked>
                        <label for="rememberMeCheckbox">Recordar</label>
                    </div>
                    <a href="#">Olvidé mi contraseña!</a>
                </div>
                <button type="submit" name="login">Iniciar Sesión</button>
            </form>
            <div class="login-card-footer">
                No tengo cuenta? <a href="index2.php">Crear una nueva cuenta.</a>
                <br />
                <?php
                if (isset($_GET["error"])){
                    echo "<br /><div class='error'>Error - El usuario o la contraseña no es correctos</div>";
                }
                ?>
            </div>
        </div>
    </div>
    <?php
        if (isset($_POST["login"])){
            if ((consultar_login($conn,$_POST["alumno"],$_POST["contra"],$config) == false)){
                header("Location:index.php?error=true");
            } else {
                if ($_POST["alumno"] == "admin" and $_POST["contra"] == "admin"){
                    header("Location:admin/index.php");
                    exit;
                } else {
                    header("Location:admin/index2.php?nombre=".$_POST['alumno']."");
                    exit;
                }
            }
        }
    ?>
</body>
</html>