<?php


echo $_POST["nombre"]."<br>";
echo $_POST["apellido"]."<br>";
echo $_POST["telefono"]."<br>";
echo $_POST["cedula"]."<br>";
echo sha1(md5($_POST["password1"]))."<br>";


echo $_POST["username"]."<br>";

$persona=new PersonaData();

$persona->nombre=$_POST["nombre"];
$persona->apellido=$_POST["apellido"];
$persona->telefono=$_POST["telefono"];
$persona->cedula=$_POST["cedula"];

$aux=$persona->add();


$user=new UserData();

$user->user=$_POST["username"];
$user->pass=sha1(md5($_POST["password1"]));
$user->idpersona=$aux[1];

$user->add();





?>