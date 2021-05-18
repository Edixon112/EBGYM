<?php

$gym=new GymData();

$gym->nombre= $_POST["nombre"];
$gym->idadmin=$_POST["admin"];
$gym->add();

?>