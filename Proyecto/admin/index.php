<?php
include("".$_SERVER['DOCUMENT_ROOT']."/carlosjoseperezrodrigues/proyecto/common/mysql.php");
$conn=conectarse($config);
session_start();
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
    <?php 
    if (!isset($_GET["accion"])){

    ?>
    <div class="container">
        <div class="miperfil">
            <figure>
                <img src="Fotos/avatar.png" alt="">
            </figure>
            <div class="miperfil__top">
                <p>Carlos José Pérez Rodrigues</p>
                <p>
                    <i class="fa-solid fa-location-dot"></i>
                    IES Castelar, Badajoz
                </p>
            </div>
            <div class="miperfil__exp">
                <div class="miperfil__exp-text miperfil__exp-seg">
                    <p class="miperfil__exp-number">
                        <?php numero_registros($conn, $config)?>
                    </p>
                    <p class="miperfil__exp-title">
                        Registros
                    </p>
                </div>
            </div>
            <div class="miperfil__social">
                <a href="index.php?accion=mostrar" class="miperfil__social-link mostrar">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checklist" width="44" height="44" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M9.615 20h-2.615a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8" />
                        <path d="M14 19l2 2l4 -4" />
                        <path d="M9 8h4" />
                        <path d="M9 12h2" />
                    </svg>
                </a>
                <a href="index.php?accion=insertar" class="miperfil__social-link insertar">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="9"></circle>
                        <line x1="9" y1="12" x2="15" y2="12"></line>
                        <line x1="12" y1="9" x2="12" y2="15"></line>
                     </svg>
                </a>
                <a href="index.php?accion=borrar" class="miperfil__social-link borrar">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-minus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="9"></circle>
                        <line x1="9" y1="12" x2="15" y2="12"></line>
                     </svg>
                </a>
                <a href="index.php?accion=modificar" class="miperfil__social-link modificar">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-code-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 12h6"></path>
                        <path d="M12 9v6"></path>
                        <path d="M6 19a2 2 0 0 1 -2 -2v-4l-1 -1l1 -1v-4a2 2 0 0 1 2 -2"></path>
                        <path d="M18 19a2 2 0 0 0 2 -2v-4l1 -1l-1 -1v-4a2 2 0 0 0 -2 -2"></path>
                     </svg>
                </a>
                <a href="index.php?accion=buscar" class="miperfil__social-link buscar" >
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="10" cy="10" r="7"></circle>
                        <line x1="21" y1="21" x2="15" y2="15"></line>
                     </svg>
                </a>
            </div>
            <div class="miperfil__social">
                <span>Mostrar</span>
                <span>Insertar</span>
                <span>Borrar</span>
                <span>Modificar</span>
                <span>Buscar</span>
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
    <?php
    } else {
    ?>
    <div class="container">
        <div class="miperfil">
            <figure class="proyecto_img">
                <img src="Fotos/avatar.png" alt="">
            </figure>
                <?php 
                    if ($_GET["accion"] == "mostrar"){
                        $msg="SELECT * FROM " . $config['tabla1'] . " where alumno != 'admin'";
                        consulta($conn,$msg);
                        boton_volver();
                    } elseif ($_GET["accion"] == "insertar"){
                       if (empty($_POST["alumno"]) && empty($_POST["contra"])){
                       ?>
                        <form method="post" action="index.php?accion=insertar" enctype="multipart/form-data">
                            <div class="miperfil__caja">
                                <input type="text" name="alumno" required />
                                <label>Alumno</label>
                            </div>
                            <div class="miperfil__caja">
                                <input type="password" name="contra" required />
                                <label>Contraseña</label>
                            </div>
                            <div class="miperfil__caja">
                                <input type="number" name="edad" required />
                                <label>Edad</label>
                            </div>
                            <div class="miperfil__caja">
                                <input type="email" name="email" required />
                                <label>Email</label>
                            </div>
                            <div class="miperfil__caja">
                                <input type="text" name="direccion" />
                                <label>Direccion</label>
                            </div>
                            <div class="miperfil__caja">
                                <input type="text" name="localidad" />
                                <label>Localidad</label>
                            </div>
                            <div class="miperfil__caja">
                                <input type="text" name="telefono" />
                                <label>Telefono</label>
                            </div>
                            <div class="miperfil__caja">
                                <input type="file" name="fotoperfil"/>
                                <label>Foto Perfil</label>
                            </div>
                            <div class="miperfil__caja">
                                <input type="text" name="empresa" />
                                <label>Empresa</label>
                            </div>
                            <br />
                            <div class="miperfil__caja2">
                                <input type="submit" name="enviar" value="Enviar" />
                                <?php echo "&#10133" . "&#128519";?>
                            </div>
                        </form>
                       <?php
                       boton_volver();
                       } else {
                            insertar_alumno($conn, $_POST["alumno"], $_POST["contra"],$_POST["edad"],$_POST["email"],$_POST["direccion"],$_POST["localidad"],$_POST["telefono"],$_FILES["fotoperfil"],$_POST["empresa"],$config);
                            boton_volver();
                        }
                    } elseif ($_GET["accion"] == "borrar"){
                        borrar_alumno($conn, $config);
                        boton_volver();
                    } elseif ($_GET["accion"] == "modificar"){
                        if (isset($_GET["nombre"])){
                            $_POST["enviar"] = "Enviar";
                            $_POST["opciones"] = $_GET["nombre"];
                        }
                        if(!isset($_POST["enviar2"])){
                            if (!isset($_POST["enviar"])){
                            echo "<b class='titulo_grande'>Elige Alumno</b><span class='titulo_pequeño'>Pincha en el botón para elegir</span>";
                            ?>
                            <form method="post" action="index.php?accion=modificar">
                                <div class="miperfil__caja">    
                                    <?php select_alumnos($conn,$config);?>
                                </div>
                                <br />
                                <div class="miperfil__caja2">
                                    <input type="submit" name="enviar" value="Enviar" />
                                    <?php echo "&#129300";?>
                                </div>
                            </form>
                            <?php
                            boton_volver();
                            } else {
                                echo "<span class='titulo_pequeño'>Datos antiguos del Alumno</span>";
                                $_SESSION["opciones"] = $_POST["opciones"];
                                consultar_alumno($conn, $_SESSION["opciones"],$config);
                                echo "<span class='titulo_pequeño'>¿Que quieres modificar?</span>";
                                ?>
                                <form method="post" action="index.php?accion=modificar">
                                    <div class="miperfil__caja">    
                                        <select name='opciones2'>
                                            <option value=''></option>
                                            <option value='alumno'>Nombre</option>
                                            <option value='pasw'>Contraseña</option>
                                            <option value='edad'>Edad</option>
                                            <option value='email'>Email</option>
                                            <option value='direccion'>Direccion</option>
                                            <option value='localidad'>Localidad</option>
                                            <option value='telefono'>Telefono</option>
                                            <option value='fotoperfil'>Foto_Perfil</option>
                                            <option value='empresa'>Empresa</option>
                                        </select>
                                    </div>
                                    <?php echo "<span class='titulo_pequeño'>Lo actualizo por:</span>";?>
                                    <div class="miperfil__caja">
                                        <input type="text" name="modificacion" />
                                    </div>
                                    <br />
                                    <div class="miperfil__caja2">
                                        <input type="submit" name="enviar2" value="Enviar" />
                                        <?php echo "&#129300";?>
                                    </div>
                                </form>
                                <?php
                            }
                        } else {
                            modificar_dato($conn,$_POST["opciones2"],$_POST["modificacion"],$_SESSION["opciones"],$config);
                            unset($_SESSION["opciones"]);
                            boton_volver();
                        }
                    } else {
                        if (empty($_POST["alumno"]) && empty($_POST["contra"])){
                            ?>
                             <form method="post" action="index.php?accion=buscar">
                                 <div class="miperfil__caja">
                                     <input type="text" name="alumno" required />
                                     <label>Alumno</label>
                                 </div>
                                 <div class="miperfil__caja2">
                                    <input type="submit" name="enviar" value="Enviar" />
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="10" cy="10" r="7"></circle>
                                        <line x1="21" y1="21" x2="15" y2="15"></line>
                                    </svg>
                                 </div>
                             </form>
                            <?php
                            boton_volver();
                            } else {
                                $nombre = $_POST["alumno"];
                                consultar_alumno($conn,$nombre,$config);
                                boton_volver();
                            }
                    }
                ?>
        </div>
    </div>
    <?php 
    }
    ?>
</body>
</html>