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
    <link rel="stylesheet" href="assets/reset.css">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="Fotos/avatar.png">
    <title>Proyecto</title>
</head>
<body>
    
    <div class="container">
        <div class="miperfil">
            <figure class="miperfil_img">
                <img src='Fotos/fotosperfiles/<?php insertar_fotoperfil($conn,$_GET["nombre"],$config);?>' />
            </figure>
            <div class="miperfil__top">
                <h3><?php insertar_datos($conn,$_GET["nombre"],"alumno",$config);?></h3>
                <p>
                    <i class="fa-solid fa-location-dot"></i>
                    <?php insertar_datos($conn,$_GET["nombre"],"direccion",$config);?>, <?php insertar_datos($conn,$_GET["nombre"],"localidad",$config);?>
                </p>
                <p><?php insertar_datos($conn,$_GET["nombre"],"email",$config);?></p>
            </div>
            <div class="miperfil__exp">
                <div class="miperfil__exp-text miperfil__exp-seg">
                    <p class="miperfil__exp-number">
                    <?php insertar_datos($conn,$_GET["nombre"],"edad",$config);?>
                    </p>
                    <p class="miperfil__exp-title">
                        Edad
                    </p>
                </div>
                <div class="miperfil__exp-text miperfil__exp-seg">
                    <p class="miperfil__exp-number">
                    <?php insertar_datos($conn,$_GET["nombre"],"empresa",$config);?>
                    </p>
                    <p class="miperfil__exp-title">
                        Empresa
                    </p>
                </div>
            </div>
            <div class="miperfil__social">
                <a href="index.php?accion=modificar&nombre=<?php insertar_datos($conn,$_GET["nombre"],"alumno",$config);?>" class="miperfil__social-link modificar">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-code-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 12h6"></path>
                        <path d="M12 9v6"></path>
                        <path d="M6 19a2 2 0 0 1 -2 -2v-4l-1 -1l1 -1v-4a2 2 0 0 1 2 -2"></path>
                        <path d="M18 19a2 2 0 0 0 2 -2v-4l1 -1l-1 -1v-4a2 2 0 0 0 -2 -2"></path>
                     </svg>
                </a>
            </div>
            <div class="miperfil__social">
                <span>Modificar Perfil</span>
            </div>
            <div class="miperfil__action">
                <button class="miperfil__action-btn blue" onclick="javascript:cambiar_de_pagina();" >Sugerencias<a id="email"></a></button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        
        const MAIL = document.getElementById("email");

        function cambiar_de_pagina (){

            MAIL.setAttribute(
                'href',
                "mailTo:carlosjpro2003@gmail.com",
            )

            MAIL.setAttribute(
                'target',
                "_blank",
            )

            MAIL.click()
        }

        // Necesita tener como predeterminado email como plataforma para correo en su dispositivo
    </script>
</body>
</html>