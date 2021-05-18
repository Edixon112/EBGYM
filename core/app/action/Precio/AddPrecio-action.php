<?php

$precio=new PrecioData();

$precio->precio=$_POST["precio"];
$precio->nombre=$_POST["nombre"];
$precio->add();

?>