<?php session_start(); 
//datos para establecer la conexion con la base de mysql.
require "cfg/conexion.php";

// verificamos si se han enviado ya las variables necesarias.
if (isset($_GET["nom"])) {
    $name = $_GET["nom"];
    $responsable = $_GET["res"];
    $telefono = $_GET["tel"];
    $email = $_GET["mail"];
    $ip = $_GET["ip"];
    $servicios = $_GET["servicios"];

    
    
    
    // Hay campos en blanco
    if($name==NULL|$responsable==NULL|$telefono==NULL|$email==NULL|$ip==NULL|$servicios==NULL) {
        echo "un campo est&aacute; vacio.";
        formRegistro();
    }else{

                $query = 'INSERT INTO SALA_REMOTA (nombre,responsable, telefono, email_responsable, ip, servicios) VALUES ("'.$name.'","'.$responsable.'","'.$telefono.'","'.$email.'","'.$ip.'","'.$servicios.'")';
                mysqli_query($conexion,$query) or die("Problemas al insertar".mysqli_error($conexion));
                echo 'La sala '.$name.' ha sido registrada de manera satisfactoria.<br/>';
   header('Location: index.php');
            }
        }

?>