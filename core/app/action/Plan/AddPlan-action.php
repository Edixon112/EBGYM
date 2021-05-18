<?php

$plan= new PlanData();

$plan->idcliente=$_POST["cliente"];
$plan->idprecio=$_POST["precio"];

$plan->add();


?>