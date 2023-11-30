<?php
$host="localhost";
$user="root";
$pass="";
$bd="owo";

$usuario =$_POST['nombre'];
$clave=$_POST['contrasena'];
$connection = mysqli_connect($host,$user,$pass,$bd);
$consulta="SELECT*FROM persona WHERE nombre='$usuario'and contrasena='$clave'";
$resultado=mysqli_query($connection,$consulta);
$filas=mysqli_num_rows($resultado);
if($filas>0)
{
	 header("location:pizzachi2.html");
}
else
{
	
    header("location:index1.html");

}
?> //cierre de PHP
