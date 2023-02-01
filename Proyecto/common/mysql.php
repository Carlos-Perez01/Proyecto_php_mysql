<?php 
    $config = array(
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'CarlosJosePerez',
        'encoding' => 'utf8',
        'tabla1' => 'alumnos',
    );

    function conectarse($config){
        $link = mysqli_connect( $config['host'], $config['username'], $config['password'], $config['database']);
        mysqli_set_charset($link, $config['encoding']);
        return ($link);
    }

    function numero_registros($link,$config){
        $consulta = "SELECT * FROM ".$config['tabla1'];
        $resultado=mysqli_query($link,$consulta);
        echo mysqli_num_rows($resultado) - 1;
    }

    function consulta ($link,$consulta){
        $resultado=mysqli_query($link,$consulta);
        $fila=mysqli_fetch_assoc($resultado);
        if ($fila > 0){
            echo "<div class='contenedor__tabla'><table class='tabla'><tr><th>Alumno</th><th>Contraseña</th><th>Edad</th><th>Email</th><th>Dirección</th><th>Localidad</th><th>Telefono</th><th>Foto_Perfil</th><th>Empresa</th></tr>";
            while($fila){
                echo "<tr><td>". $fila["alumno"] ."</td><td> ". $fila["pasw"] . "</td><td> ". $fila["edad"] . "</td><td> ". $fila["email"] . "</td><td> ". $fila["direccion"] . "</td><td> ". $fila["localidad"] . "</td><td> ". $fila["telefono"] . "</td>";
                if (empty($fila["fotoperfil"])){
                    echo "<td><img src='Fotos/fotosperfiles/sinfoto.png' width='30px'/></td>"; 
                } else {
                    echo "<td><img src='Fotos/fotosperfiles/".$fila["fotoperfil"]."' width='30px'/></td>"; 
                }
                echo "<td> ". $fila["empresa"] . "</td></tr>";
                $fila=mysqli_fetch_assoc($resultado);
            }
            echo "</table></div>";
        } else {
            echo "No hay nada en la BBDD";
        }
    }

    function insertar_alumno ($link,$nombre, $password ,$edad,$email,$direccion,$localidad,$telefono,$fotoperfil,$empresa,$config){
        $nom="";
        if (!empty($fotoperfil)){
            $nom = $fotoperfil["name"];
            $origen=$fotoperfil["tmp_name"];
            $destino=$_SERVER["DOCUMENT_ROOT"]."/carlosjoseperezrodrigues/Proyecto/admin/Fotos/fotosperfiles/" . $nom;
            if (!move_uploaded_file($origen,$destino)){
                echo "<br /> No se ha seleccionado foto";
            } else {
                echo "<br /> Fichero subido";
            }
        }
        try{
            $consulta="INSERT INTO " . $config['tabla1'] . " values('".$nombre."','".$password."','".$edad."','".$email."','".$direccion."','".$localidad."','".$telefono."','".$nom."','".$empresa."')";
            $resultado=mysqli_query($link,$consulta);
            if($resultado){
                echo "<br />Registro completado";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        } 
    }

    function consultar_alumno($link,$name,$config){
        $msg="SELECT * FROM ".$config['tabla1']." where alumno = '".$name."'";
        consulta($link,$msg);
    }     

    function consultar_login($link,$alumno,$pasw,$config){
        $consulta="SELECT * FROM ".$config['tabla1']." where alumno = '".$alumno."' and pasw = '".$pasw."'";
        $resultado=mysqli_query($link,$consulta);
        if (mysqli_num_rows($resultado) == 0){
            return false;
        } else {
            return true;
        }
    }   

    function insertar_fotoperfil ($link,$alumno,$config){
        $consulta="SELECT fotoperfil FROM ".$config['tabla1']." where alumno = '".$alumno."'";
        $resultado=mysqli_query($link,$consulta);
        $fila=mysqli_fetch_assoc($resultado);
        if ($fila["fotoperfil"] == ""){
            echo "sinfoto.png";
        } else {
            echo $fila["fotoperfil"];
        }
    }

    function insertar_datos ($link,$alumno,$dato,$config){
        $consulta="SELECT $dato FROM ".$config['tabla1']." where alumno = '".$alumno."'";
        $resultado=mysqli_query($link,$consulta);
        $fila=mysqli_fetch_assoc($resultado);
        if (($fila[$dato]) != ""){
            echo $fila[$dato];
        } else {
            echo "No_asignada";
        }
        
    }

    function select_alumnos($link,$config){
        $consulta="SELECT * FROM ".$config['tabla1'] ." where alumno != 'admin'";
        $resultado=mysqli_query($link,$consulta);
        $fila=mysqli_fetch_assoc($resultado);
        if ($fila > 0){
            echo "<select name='opciones'>";
            echo "<option value=''></option>";
            while($fila){
                echo "<option>".$fila['alumno']."</option>";
                $fila=mysqli_fetch_assoc($resultado);
            }
            echo "</select>";
        } else {
            echo "<option value=''>Base de datos vacia</option>";
        }
    }
    
    function modificar_dato($link,$dato,$modificacion,$name,$config){
        try{
            $modificacion="UPDATE ".$config['tabla1']." set $dato = '".$modificacion."' where alumno = '".$name."'";
            $resultado=mysqli_query($link,$modificacion);
            if($resultado){
                echo "<br />Modificacion correcta";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        } 
    }

    function borrar_alumno ($link,$config){
        $consulta = "SELECT * FROM ".$config['tabla1'] ." where alumno != 'admin'";
        $resultado=mysqli_query($link,$consulta);
        $fila=mysqli_fetch_assoc($resultado);
        if ($fila > 0){
            echo "<div class='contenedor__tabla'><table class='tabla'><tr><th>Alumno</th><th>Contraseña</th><th>Edad</th><th>Email</th><th>Dirección</th><th>Localidad</th><th>Telefono</th><th>Foto_Perfil</th><th>Empresa</th><th>Borrar</th><th>Modificar</th></tr>";
            for($i=0; $i< $fila; $i++){
                if (isset($_POST["borrar"])){
                    $nombre=$_POST["borrar"];
                }
                if (isset($_POST["modificar"])){
                    header("Location:index.php?accion=modificar&nombre=".$_POST["modificar"]."");
                }
                echo "<tr><td>". $fila["alumno"] ."</td><td> ". $fila["pasw"] . "</td><td> ". $fila["edad"] . "</td><td> ". $fila["email"] . "</td><td> ". $fila["direccion"] . "</td><td> ". $fila["localidad"] . "</td><td> ". $fila["telefono"] . "</td>";
                if (empty($fila["fotoperfil"])){
                    echo "<td><img src='Fotos/fotosperfiles/sinfoto.png' width='30px'/></td>"; 
                } else {
                    echo "<td><img src='Fotos/fotosperfiles/".$fila["fotoperfil"]."' width='30px'/></td>"; 
                }
                echo "<td> ". $fila["empresa"] . "</td>";
                echo "<td><form action='index.php?accion=borrar' method='post'><div class='miperfil__caja2'><button type='submit' name='borrar' value='".$fila["alumno"]."' >Borrar</button></div></td>";
                echo "<td><div class='miperfil__caja2'><button type='submit' name='modificar' value='".$fila["alumno"]."' >Modificar</button></div></form</td></tr>";
                $fila=mysqli_fetch_assoc($resultado);
            }
            echo "</table></div>";
            if (isset($_POST["borrar"])){
                $consulta1 = "DELETE FROM ".$config['tabla1']." where alumno='".$nombre."'";
                $resultado=mysqli_query($link,$consulta1);
                header("location: index.php?accion=borrar");
            }
        } else {
            echo "No hay nada en la BBDD";
        }
    }

    function Close ($conn){
        mysqli_close($conn);
        unset($conn);
    }

    function boton_volver(){
        ?>
            <div class="miperfil__caja3">
                <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/carlosjoseperezrodrigues/proyecto/admin/index.php" >Volver</a>
            </div>
        <?php
    }
?>
