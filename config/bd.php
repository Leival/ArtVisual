<?php
$host="localhost";
$db="art";
$usuario="root";
$contraseña="";

try {
    $conexion=new PDO("mysql:host=$host;dbname=$db",$usuario,$contraseña);


} catch (exception $ex) {

    echo $ex->getMessage();
}
?>