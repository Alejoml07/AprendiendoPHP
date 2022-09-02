<?php
    include('conect.php');
    if (isset($_POST['Registrar'])) {
        $nombre = mysqli_real_escape_string($con,$_POST['Nombre']);
        $correo = mysqli_real_escape_string($con,$_POST['Correo']);
        $usuario = mysqli_real_escape_string($con,$_POST['Usuario']);
        $clave = mysqli_real_escape_string($con,$_POST['Clave']);
        $claveEncriptada = sha1($clave);
        //hacer consulta para mirar si el usuario ya existe
        $consultaUsuario = "SELECT id_usuario FROM usuarios WHERE usuario = '$usuario'";
        $continuar = $con->query($consultaUsuario);
        //recorrido por las filas 
        $filas = $continuar -> num_rows;
        if ($filas > 0) {
            echo
                "<script>
                    alert('el usuario ya existe')
                    window.location='../views/register.html'
                </script>";
        }else{
            //insertar el usuario
            $nuevoUsuario = "INSERT INTO usuarios(nombre,correo,usuario,clave) VALUES ('$nombre','$correo','$usuario','$claveEncriptada' )";
            $continuarUsuario = $con->query($nuevoUsuario);
            if ($continuarUsuario > 0) {
                echo
                    "<script>
                        alert('el usuario registrado con exito..')
                        window.location='../views/login.html'
                    </script>";
            }else{
                echo
                    "<script>
                        alert('no se pudo registrar el usuario')
                        window.location='../views/register.html'
                    </script>";


            }
                

                
        }
    }
    

?>